@if (session('userStatus'))
  <script>
    var success = '{{session()->get('userStatus')}}'
    toastr.success(success);
  </script>
@endif
<div class="kt-portlet kt-portlet--mobile w-75">
  <div class="kt-portlet__head kt-portlet__head--lg justify-content-center">
    <div class="kt-portlet__head-label">
      <h2>{{ __('Basic Info') }}</h2>
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
      {!! Form::label('email', 'E-mail', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col-md-9 @error('email') is-invalid @enderror">
        {!! Form::email(
              'email', 
              null, 
              [
                'class' => "form-control",
                'required',
                'autocomplete' => 'email'
              ]
            )
        !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('filter_keywords', 'Keywords Filters', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col-md-9">
        {!! Form::text(
              'filter_keywords', 
              null, 
              [
                'class' => "form-control",
                'autocomplete' => 'filter_keywords'
              ]
            )
        !!}
      </div>
    </div>
        
    <div class="form-group row">
      {!! Form::label('regx_curations', 'Regx Curations', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col-md-9">
        {!! Form::text(
              'regx_curations', 
              null, 
              [
                'class' => "form-control",
                'autocomplete' => 'regx_curations'
              ]
            )
        !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('password', 'Password', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col">
        {!! Form::password(
            'password', 
            [
              'class' => "form-control",
              'autocomplete' => 'new-password'
            ]
          )
        !!}
      </div>
  </div>

    <div class="form-group text-center">
      {!! Form::submit('Save', ['class' => 'btn btn-primary mr-2']) !!}
      <a href="{{ route('users') }}" class="btn btn-custom-secondary">{{ __('Back') }}</a>
    </div>
  </div>
</div>