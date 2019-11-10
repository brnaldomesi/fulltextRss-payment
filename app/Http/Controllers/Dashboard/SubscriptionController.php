<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class SubscriptionController extends Controller
{
    //
    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));
        
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user
            ->newSubscription('main', $plan->stripe_plan)
            // ->trialDays(7)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

        $user->status = 'active';
        $user->payment_method = 'stripe';
        $user->plan_id = $plan->id;
        $user->save();
        
        return redirect()->route('home')->with(['code' => 'success', 'message' => 'Your plan subscribed successfully!']);
    }

    public function cancel(Request $request)
    {
        auth()->user()->subscription('main')->cancelNow();
        auth()->user()->status = 'pending';
        auth()->user()->save();
        return view('dashboard.home');
    }
}