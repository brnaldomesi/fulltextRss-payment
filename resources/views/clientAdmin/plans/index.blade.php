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
                          <h5>${{ number_format($plan->cost, 2) }} monthly</h5>
                          <h5>{{ $plan->description }}</h5>
                          <a href="{{ route('plans.show', $plan->slug) }}"
                              class="btn btn-outline-dark pull-right">Choose</a>
                      </div>
                  </li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
@endsection