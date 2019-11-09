<?php

namespace App\Http\Controllers\Dashboard;

use App\Transaction;
use App\Subscription;
use App\User;

use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeController extends CashierController
{
    public function notify(Request $request)
    {
        error_log($request['type']);
        if ($request['type'] == 'invoice.payment_succeeded') {
            $transaction = new Transaction();
            $transaction->price = $request['data']['object']['amount_due'] / 100;
            $transaction->payment_status = 'Completed';
            $transaction->user_id = Subscription::where('stripe_id', $request['data']['object']['subscription'])->first()->user_id;
            $transaction->save();

            $user = User::find($transaction->user_id);
            $user->status = 'active';
            $user->save();
        };

        if ($request['type'] == 'invoice.payment_failed') {
            $transaction = new Transaction();
            $transaction->price = $request['data']['object']['amount_due'] / 100;
            $transaction->payment_status = 'Failed';
            $transaction->user_id = Subscription::where('stripe_id', $request['data']['object']['subscription'])->first()->user_id;
            $transaction->save();

            $user = User::find($transaction->user_id);
            $user->status = 'pending';
            $user->save();
        };

        if ($request['type'] == 'customer.subscription.deleted') {
            $subscription = Subscription::where('stripe_id', $request['data']['object']['id'])->first();
            $subscription->stripe_status = 'canceled';
            $subscription->save();

            $user = User::find($subscription->user_id);
            $user->status = 'pending';
            $user->save();
        }

        return '';
    }
}