@extends('layouts.dashboard')

@section('content')
  <div class="col-md-10">
    <h1>{{ __('Setup a new RSS to Email Channel') }}</h1>
    <hr>
    {!! Form::open(['route' => 'feeds.store']) !!}
      @include('dashboard.feeds._form')
    {!! Form::close() !!}
  </div>
@endsection