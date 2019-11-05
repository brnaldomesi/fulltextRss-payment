@extends('layouts.clientAdmin')

@section('content')
  <div class="col-md-10">
    <h1>{{ __('Create an additional new profile') }}</h1>
    <hr>
    {!! Form::open(['route' => 'users.store']) !!}
      @include('clientAdmin.users._form')
    {!! Form::close() !!}
  </div>
@endsection