@extends('layouts.dashboard')

@section('content')
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">My Plan</div>
          <div class="card-body">
              <ul class="list-group">
                  <li class="list-group-item clearfix">
                      <div class="pull-left">
                          <h5>{{ $plan->name }}</h5>
                          <h5>${{ number_format($plan->cost, 2) }} {{ $plan->payment_plan }}</h5>
                          <h5>{{ $plan->description }}</h5>
                          <a href="#"
                              class="btn btn-outline-primary">Edit</a>
                          <a href="@if(!Auth::user()->stripe_id) {{ route('paypal.cancel')}} @else {{ route('subscription.cancel')}} @endif"
                              class="btn btn-outline-danger">Cancel</a>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </div>
@endsection