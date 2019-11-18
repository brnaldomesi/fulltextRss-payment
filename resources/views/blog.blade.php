@extends('layouts.app')

@section('description')
    <meta name="description" content="{{ config('seoinfo.description.blog')}}">
@endsection

@section('title')
    <title>{{ config('seoinfo.title.blog') }}</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog</div>
            </div>
        </div>
    </div>
</div>
@endsection