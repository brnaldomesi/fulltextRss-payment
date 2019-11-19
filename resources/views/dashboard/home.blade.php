@extends('layouts.dashboard')

@section('content')
  @if(Auth::user() && Auth::user()->status == 'pending')
  <div class="col-md-4 mt-5">
      @if(session()->get('code') == 'danger')
          <script>
            var error = '{{session()->get('message')}}'
            toastr.error(error);
          </script>
      @endif
      <div class="card">
        <div class="card-header">{{ __('Purchase Your Premium Subscription') }}</div>
        <div class="card-body">
          <form method="GET" action="{{ route('plans.index') }}">
            <div class="form-group row">
              <div class="col">
                <select class="form-control" name="payment-plan">
                  <option value='monthly'>{{ __('Monthly payment') }}</option>
                  <option value='yearly' selected>{{ __('Yearly payment') }}</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col">
                <select class="form-control" name="billing-method">
                  <option value='paypal' selected>{{ __('Secure PayPal Setup') }}</option>
                  <option value='credit-card'>{{ __('Secure Credit Card') }}</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-0 text-center">
              <div class="col">
                <button type="submit" class="btn btn-danger">
                  {{ __('Purchase Your Premium Subscription') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
  @else
  <div class="col-md-12">
      @if(session()->get('code') == 'success')
        <script>
          var success = '{{session()->get('message')}}'
          toastr.success(success);
        </script>
      @endif
      <div>
          <h1>Welcome, {{ Auth::user()->email }}</h1>
          <h2>Hi there {{ Auth::user()->email }}, here's the admin section for your account , you can manage your subscriptions and sub-users here....please feel free to get in touch with us anytime if there's anything we can help with or if you have any questions... </h2>                 
      </div>
  @endif
@endsection
