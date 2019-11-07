<?php

namespace App\Http\Controllers\Dashboard;

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

        $plans = Plan::where('payment_plan', $payment_plan)->get();
        return view('dashboard.plans.index', compact('plans', 'billing_method', 'payment_plan'));
    }

    public function show(Plan $plan, $billing_method, $payment_plan, Request $request)
    {
        // $paymentMethods = $request->user()->paymentMethods();
        
        $intent = $request->user()->createSetupIntent();
        return view('dashboard.plans.show', compact('plan', 'intent', 'billing_method', 'payment_plan'));
    }
}