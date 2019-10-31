@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- 
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        --}}

                        <div class="form-group row">
                            {{--
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            --}}
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                  placeholder="Enter your email here"
                                >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{--
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            --}}
                            <div class="col">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                  placeholder="Your Access Key - It's like a password"
                                >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        --}}

                        <!-- <div class="form-group row">
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
                              <option value='paypal'>{{ __('Secure PayPal Setup') }}</option>
                              <option value='credit-card'>{{ __('Secure Credit Card') }}</option>
                            </select>
                          </div>
                        </div> -->

                        <div class="form-group row mb-0 text-center">
                            <div class="col">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Create your free account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
