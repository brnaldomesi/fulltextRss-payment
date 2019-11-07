@extends('layouts.dashboard')

@section('content')
  <div class="col-md-10">
    <h1>{{ __('Edit an existing user profile') }}</h1>
    <hr>
    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
      @include('dashboard.users._form')
    {!! Form::close() !!}
  </div>
@endsection