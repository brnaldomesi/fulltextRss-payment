<?php

namespace App\Http\Controllers\ClientAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class SubscriptionController extends Controller
{
    //
    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));
        
        $request->user()
            ->newSubscription('main', $plan->stripe_plan)
            ->create($request->stripeToken);

        return redirect()->route('clientAdmin.home')->with('success', 'Your plan subscribed successfully');
    }
}