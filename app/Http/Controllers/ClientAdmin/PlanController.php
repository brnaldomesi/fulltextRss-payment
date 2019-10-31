<?php

namespace App\Http\Controllers\ClientAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class PlanController extends Controller
{
    //
    public function index()
    {
        $plans = Plan::all();
        return view('clientAdmin.plans.index', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {
        // $paymentMethods = $request->user()->paymentMethods();
        $intent = $request->user()->createSetupIntent();
        return view('clientAdmin.plans.show', compact('plan', 'intent'));
    }
}