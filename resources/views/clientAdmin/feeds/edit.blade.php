@extends('layouts.clientAdmin')

@section('content')
  <div class="col-md-10">
    <h1>{{ __('Edit a RSS to Email Channel') }}</h1>
    <hr>
    {!! Form::model($feed, ['route' => ['feeds.update', $feed], 'method' => 'put']) !!}
      @include('clientAdmin.feeds._form')
    {!! Form::close() !!}
  </div>
@endsection