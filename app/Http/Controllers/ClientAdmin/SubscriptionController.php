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
        
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user
            ->newSubscription('main', $plan->stripe_plan)
            ->trialDays(7)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

        session()->put(['code' => 'success', 'message' => "Your plan subscribed successfully!"]);
        $user->status = 'active';
        $user->save();
        
        return redirect()->route('home');
    }
}