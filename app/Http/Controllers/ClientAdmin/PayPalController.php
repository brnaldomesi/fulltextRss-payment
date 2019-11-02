<?php
namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\IPNStatus;
use App\Item;
use App\Plan;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    /**
     * @var ExpressCheckout
     */
    protected $provider;
    
    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }
    public function getIndex(Request $request)
    {
        $response = [];
        if (session()->has('code')) {
            $response['code'] = session()->get('code');
            session()->forget('code');
        }
        if (session()->has('message')) {
            $response['message'] = session()->get('message');
            session()->forget('message');
        }
        return view('welcome', compact('response'));
    }
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getExpressCheckout(Plan $plan, Request $request)
    {
        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $cart = $this->getCheckoutData($recurring, $plan);
        try {
            $response = $this->provider->setExpressCheckout($cart, $recurring);
            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
            $invoice = $this->createInvoice($cart, 'Invalid');
            session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
        }
    }
    /**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getExpressCheckoutSuccess(Plan $plan, Request $request)
    {
        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $token = $request->get('token');
        $PayerID = $request->get('PayerID');
        $cart = $this->getCheckoutData($recurring, $plan);
        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            if ($recurring === true) {
                if ($plan->payment_plan == 'monthly') {
                  $response = $this->provider->createMonthlySubscription($response['TOKEN'], $cart['total'], $cart['subscription_desc']);
                } else {
                  $response = $this->provider->createYearlySubscription($response['TOKEN'], $cart['total'], $cart['subscription_desc']);
                }
                if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                    $status = 'Processed';
                } else {
                    $status = 'Invalid';
                }
            } else {
                // Perform transaction on PayPal
                $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
                $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            }
            $invoice = $this->createInvoice($cart, $status);
            if ($invoice->paid) {
                session()->put(['code' => 'success', 'message' => "Order $invoice->id has been paid successfully!"]);
                $user = auth()->user();
                $user->status = 'Active';
                $user->save();
            } else {
                session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
            }
            return redirect()->route('home');
        }
    }
    public function getAdaptivePay()
    {
        $this->provider = new AdaptivePayments();
        $data = [
            'receivers'  => [
                [
                    'email'   => 'johndoe@example.com',
                    'amount'  => 10,
                    'primary' => true,
                ],
                [
                    'email'   => 'janedoe@example.com',
                    'amount'  => 5,
                    'primary' => false,
                ],
            ],
            'payer'      => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url('payment/success'),
            'cancel_url' => url('payment/cancel'),
        ];
        $response = $this->provider->createPayRequest($data);
        dd($response);
    }
    /**
     * Parse PayPal IPN.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function notify(Request $request)
    {
        if (!($this->provider instanceof ExpressCheckout)) {
            $this->provider = new ExpressCheckout();
        }
        $post = [
            'cmd' => '_notify-validate',
        ];
        $data = $request->all();
        foreach ($data as $key => $value) {
            $post[$key] = $value;
        }
        $response = (string) $this->provider->verifyIPN($post);
        $ipn = new IPNStatus();
        $ipn->payload = json_encode($post);
        $ipn->status = $response;
        $ipn->save();
    }
    /**
     * Set cart data for processing payment on PayPal.
     *
     * @param bool $recurring
     *
     * @return array
     */
    protected function getCheckoutData($recurring = false, Plan $plan)
    {
        $data = [];
        $order_id = Invoice::all()->count() + 1;
        if ($recurring === true) {
            $payment_plan = '';

            if ($plan->payment_plan == 'monthly') {
              $payment_plan = 'Monthly';
            } else {
              $payment_plan = 'Yearly';
            }

            $data['items'] = [
                [
                    'name'  => $payment_plan.' Subscription '.config('paypal.invoice_prefix').' #'.$order_id,
                    'price' => $plan->cost,
                    'qty'   => 1,
                ],
            ];
            $data['return_url'] = url('/clientAdmin/paypal/ec-checkout-success/'.$plan->slug.'?mode=recurring');
            $data['subscription_desc'] = $payment_plan.' Subscription '.config('paypal.invoice_prefix').' #'.$order_id;
        } else {
            $data['items'] = [
                [
                    'name'  => 'Product 1',
                    'price' => 10,
                    'qty'   => 1,
                ],
            ];
            $data['return_url'] = url('/clientAdmin/paypal/ec-checkout-success/'.$plan->slug);
        }
        $data['invoice_id'] = config('paypal.invoice_prefix').'_'.$order_id;
        $data['invoice_description'] = "Order #$order_id Invoice";
        $data['cancel_url'] = url('/');
        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;
        return $data;
    }
    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice($cart, $status)
    {
        $invoice = new Invoice();
        $invoice->title = $cart['invoice_description'];
        $invoice->price = $cart['total'];
        if (!strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed')) {
            $invoice->paid = 1;
        } else {
            $invoice->paid = 0;
        }
        $invoice->save();
        collect($cart['items'])->each(function ($product) use ($invoice) {
            $item = new Item();
            $item->invoice_id = $invoice->id;
            $item->item_name = $product['name'];
            $item->item_price = $product['price'];
            $item->item_qty = $product['qty'];
            $item->save();
        });
        return $invoice;
    }
}