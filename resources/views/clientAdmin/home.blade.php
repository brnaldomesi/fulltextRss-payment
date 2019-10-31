@extends('layouts.clientAdmin')

@section('content')
  @if(Auth::user() && Auth::user()->status == 'Pending' && Auth::user()->stripe_id == NULL)
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
    @if(session()->get('success'))
      
      <!-- <div class="alert alert-success">
          {{ session()->get('success') }}
      </div> -->
      <script>
        var success = {{json_encode(session()->get('success'))}}
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-center",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        toastr.success(success);
      </script>
    @else
        <div>
          welcome!
        </div>
    @endif
  @endif
@endsection