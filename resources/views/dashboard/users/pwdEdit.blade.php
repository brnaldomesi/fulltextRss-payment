@extends('layouts.dashboard')

@section('content')
  @if (session('userStatus'))
  <script>
    var success = '{{session()->get('userStatus')}}'
    toastr.success(success);
  </script>
  @endif
  <div class="col-md-10">
    {!! Form::open(['route' => 'users.pwdUpdate', 'method' => 'put']) !!}
      <div class="kt-portlet kt-portlet--mobile w-75">
        <div class="kt-portlet__head kt-portlet__head--lg justify-content-center">
          <div class="kt-portlet__head-label">
            <h2>{{ __('Change password') }}</h2>
          </div>
        </div>
      
        <div class="kt-portlet__body">
          <div class="form-group row">
            {!! Form::label('current_password', 'Current password', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
            <div class="col-md-9 @error('current_password') is-invalid @enderror">
              {!! Form::password(
                    'current_password', 
                    [
                      'class' => "form-control",
                      'autocomplete' => 'new-password',
                      'autofocus'
                    ]
                  )
              !!}
              {!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('new_password', 'New Password', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
            <div class="col-md-9 @error('new_password') is-invalid @enderror">
              {!! Form::password(
                    'new_password', 
                    [
                      'class' => "form-control",
                      'autocomplete' => 'new-password'
                    ]
                  )
              !!}
              {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('new_confirm_password', 'Confirm password', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
            <div class="col-md-9 @error('new_confirm_password') is-invalid @enderror">
              {!! Form::password(
                    'new_confirm_password', 
                    [
                      'class' => "form-control",
                      'autocomplete' => 'new-password'
                    ]
                  )
              !!}
              {!! $errors->first('new_confirm_password', '<p class="help-block">:message</p>') !!}
            </div>
          </div>

          <div class="form-group text-center">
            {!! Form::submit('Change', ['class' => 'btn btn-primary mr-2']) !!}
            <button onclick="event.preventDefault(); history.back();" class="btn btn-custom-secondary">{{ __('Back') }}</button>
          </div>

        </div>
      </div>
    {!! Form::close() !!}
  </div>
@endsection