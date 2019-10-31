@extends('layouts.clientAdmin')

@section('content')
  @if(Auth::user() && Auth::user()->status == 'Pending')
    <div class="col-md-4 mt-5">
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
    <div>
      Welcome!
    </div>
  @endif
@endsection