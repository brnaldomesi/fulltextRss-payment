@extends('layouts.softio')

@section('description')
    <meta name="description" content="{{ config('seoinfo.description.contact')}}">
@endsection

@section('title')
    <title>{{ config('seoinfo.title.contact') }}</title>
@endsection

@section('content')
  <section class="contact">
    @include('components.contact')
  </section>
@endsection

@section('extraJs')
  <!-- google map -->
  <script>
    function initMap() {
      // The location of Santa Monica
      var santa_monica = {lat: 34.0195, lng: -118.4912};
      // The map, centered at Santa Monica
      var map = new google.maps.Map(
          $('.map')[0], {zoom: 4, center: santa_monica});
      // The marker, positioned at Santa Monica
      var marker = new google.maps.Marker({position: santa_monica, map: map});
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDzfh3T2Ihm5MBWIKHHoSnLG2XzDK0_TY&callback=initMap">
  </script>
@endsection