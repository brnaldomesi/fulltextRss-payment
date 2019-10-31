<?php

namespace App\Http\Controllers\ClientAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class PlanController extends Controller
{
    //
    public function index(Request $request)
    {
        $billing_method = $request->get('billing-method');
        $payment_plan = $request->get('payment-plan');

        $plans = Plan::all();
        return view('clientAdmin.plans.index', compact('plans', 'billing_method'));
    }

    public function show(Plan $plan, $billing_method, Request $request)
    {
        // $paymentMethods = $request->user()->paymentMethods();
        
        $intent = $request->user()->createSetupIntent();
        return view('clientAdmin.plans.show', compact('plan', 'intent', 'billing_method'));
    }
}