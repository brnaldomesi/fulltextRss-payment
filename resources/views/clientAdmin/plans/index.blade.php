@extends('layouts.clientAdmin')

@section('content')
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">Plans</div>
          <div class="card-body">
              <ul class="list-group">
                  @foreach($plans as $plan)
                  <li class="list-group-item clearfix">
                      <div class="pull-left">
                          <h5>{{ $plan->name }}</h5>
                          <h5>${{ number_format($plan->cost, 2) }} {{ $payment_plan }}</h5>
                          <h5>{{ $plan->description }}</h5>
                          <a href="{{ route('plans.show', ['plan' => $plan->slug, 'billing_method' => $billing_method, 'payment_plan' => $payment_plan]) }}"
                              class="btn btn-outline-dark">Choose</a>
                      </div>
                  </li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
@endsection