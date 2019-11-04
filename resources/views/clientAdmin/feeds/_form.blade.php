<div class="kt-portlet kt-portlet--mobile w-75">
  <div class="kt-portlet__head kt-portlet__head--lg justify-content-center">
    <div class="kt-portlet__head-label">
      <h2>{{ __('RSS info') }}</h2>
    </div>
  </div>

  <div class="kt-portlet__body">
    <div class="form-group row">
      {!! Form::label('feed_title', 'Name Your Source', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col-md-9">
        {!! Form::text(
              'feed_title', 
              null, 
              [
                'class' => "form-control",
                'autocomplete' => 'feed_title',
                'autofocus'
              ]
            )
        !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('feed_url', 'RSS feed URL here', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col-md-9 @error('feed_url') is-invalid @enderror">
        {!! Form::text(
              'feed_url', 
              null, 
              [
                'class' => "form-control",
                'required',
                'autocomplete' => 'feed_url'
              ]
            )
        !!}
        {!! $errors->first('feed_url', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('audience', 'Choose audience', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
      <div class="col-md-9">
        {!! Form::select(
              'audience', 
              [
                'admin' => 'Admin',
                'users' => 'Users'
              ],
              null,
              ['class' => "form-control"]
            )
        !!}
        {!! $errors->first('feed_url', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('filter_keywords', 'Keywords Filterse', ['class' => 'col-md-3 col-form-label text-md-right']) !!}
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

    <div class="form-group text-center">
      {!! Form::submit('Save', ['class' => 'btn btn-primary mr-2']) !!}
      <a href="{{ route('feeds') }}" class="btn btn-custom-secondary">{{ __('Back') }}</a>
    </div>
  </div>
</div>