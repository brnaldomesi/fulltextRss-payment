@extends('layouts.softio')

@section('description')
    <meta name="description" content="{{ config('seoinfo.description.usecases')}}">
@endsection

@section('title')
    <title>{{ config('seoinfo.title.usecases') }}</title>
@endsection

@section('content')

<section class="counter-area text-center pb-0 bg-white">
  <h1 class="mb-3 mt-4">Content Aggregator's Popular Use Cases</h1>
  <h5>How Our Clients Are Using ContentAggregator.com</h5>
</section>

<section class="features pt-0">
  <div class="container">
    <div class="row py-6">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0 transform">
        <img 
          alt="Woman on Computer" 
          data-type="image" 
          itemprop="image" 
          src="https://static.wixstatic.com/media/0c52b294084246fb845d9d8c097fd3e4.jpg/v1/fill/w_220,h_120,al_c,q_80,usm_0.66_1.00_0.01/Woman%20on%20Computer.webp" 
        >
      </div>
      <div class="col-md-8 col-lg-9 px-3">
        <h3 class="mb-4">Blogging</h2>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Blogging requires quickly generated content that is topical to your industry, and demonstrates up-to-date expertise. Content Aggregator allows individual bloggers to stay on top of their fields and deliver quickly on trending news and events.</span>
        </div>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Users save hours from their research and can perform quick and insightful analyses on their news feeds.</span>
        </div>
      </div>
    </div>
    
    <div class="row py-6">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0 transform">
        <img 
          alt="Business Morning" 
          data-type="image" 
          itemprop="image" 
          src="https://static.wixstatic.com/media/e071d6ecfcfbcf2b0eba57543959d12b.jpg/v1/fill/w_220,h_147,al_c,q_80,usm_0.66_1.00_0.01/Business%20Morning%20.webp" 
        >
      </div>
      <div class="col-md-8 col-lg-9 px-3">
        <h3 class="mb-4">Journalism</h2>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Purchasing an enterprise or professional plan allows a newsroom collaborative usage of Content Aggregator’s software. Different streams of news can be brought under one roof, and journalists can collaborate easily on the construction of different feeds.</span>
        </div>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Content Aggregator also makes it possible for editors to get a broad sense of what their different journalists are monitoring in their newsfeeds. The management tools built into ContentAggregator.com make it possible for a team to run much more tightly.</span>
        </div>
      </div>
    </div>
    
    <div class="row py-6">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0 transform">
        <img 
          alt="UX" 
          data-type="image" 
          itemprop="image" 
          src="https://static.wixstatic.com/media/807240af22ef44d99e493a41635e37d4.jpg/v1/fill/w_220,h_134,al_c,q_80,usm_0.66_1.00_0.01/UX.webp"
        >
      </div>
      <div class="col-md-8 col-lg-9 px-3">
        <h3 class="mb-4">App Development</h2>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Content Aggregator's simple code and highly versatile API allows for its rock-solid functionality to be easily tied into an existing app.</span>
        </div>

        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Reach out via our Contact page for a custom plan. We also provide technical documentation to help your team implement our complete RSS-to-Full Text API.</span>
        </div>
      </div>
    </div>
    
    <div class="row py-6">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0 transform">
        <img 
          alt="Lecture Room" 
          data-type="image" 
          itemprop="image" 
          src="https://static.wixstatic.com/media/2e25c415ea614536aa6eedda8e5d9b51.jpg/v1/fill/w_220,h_124,al_c,q_80,usm_0.66_1.00_0.01/Lecture%20Room.webp"
        >
      </div>
      <div class="col-md-8 col-lg-9 px-3">
        <h3 class="mb-4">Internal Training</h2>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Content Aggregator has also been used to keep up-to-date on the latest industry events and best practices for fast-moving industries. This information lets you keep your employees fully trained on the latest tools and methodologies in your industry.</span>
        </div>
        <div class="d-flex pb-2">
          <span>&#8226;&nbsp;&nbsp;</span>
          <span>Our professional plan has been used for the purpose in industries such as tech, medical, finance, and others.</span>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection