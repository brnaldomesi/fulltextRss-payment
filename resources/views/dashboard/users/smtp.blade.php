@extends('layouts.dashboard')

@section('content')
  <div class="col-md-10">
    <div class="kt-portlet kt-portlet--mobile w-75">
        <div class="kt-portlet__head kt-portlet__head--lg justify-content-center">
          <div class="kt-portlet__head-label">
            <h2>{{ __('Email sender credentials') }}</h2>
          </div>
        </div>
      
        <div class="kt-portlet__body">
          <div class="form-group row">
            {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
            <div class="col-md-9">
              {!! Form::text(
                    'name', 
                    null, 
                    [
                      'class' => "form-control",
                      'autocomplete' => 'name',
                      'autofocus'
                    ]
                  )
              !!}
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('email', 'Email', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
            <div class="col-md-9">
              {!! Form::email(
                    'email', 
                    null, 
                    [
                      'class' => "form-control",
                      'autocomplete' => 'email'
                    ]
                  )
              !!}
            </div>
          </div>

          <div class="form-group text-center">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
          </div>
        </div>
    </div>
  </div>
@endsection