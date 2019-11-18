@extends('layouts.app')

@section('description')
    <meta name="description" content="{{ config('seoinfo.description.contact')}}">
@endsection

@section('title')
    <title>{{ config('seoinfo.title.contact') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>
            </div>
        </div>
    </div>
</div>
@endsection