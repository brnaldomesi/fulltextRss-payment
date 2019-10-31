@extends('layouts.clientAdmin')

@section('content')
  <h1>Setup a new RSS to Email Channel</h1>
  <hr>
  <div class="kt-portlet kt-portlet--mobile w-75">
    <div class="kt-portlet__head kt-portlet__head--lg justify-content-center">
      <div class="kt-portlet__head-label">
        <span class="kt-portlet__head-icon">
          <i class="kt-font-brand flaticon2-plus"></i>
        </span>
        <h3 class="kt-portlet__head-title">
            Setup a new RSS to Email Channel
        </h3>
      </div>
    </div>

    <div class="kt-portlet__body">
      {{!! Form::open(['route' => 'feeds.store']) !!}}
        @include('clientAdmin.feeds._form')
      {{!! Form::close() !!}}
    </div>
  </div>
@endsection