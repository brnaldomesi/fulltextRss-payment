@extends('layouts.softio')

@section('description')
    <meta name="description" content="{{ config('seoinfo.description.home')}}">
@endsection

@section('title')
    <title>{{ config('seoinfo.title.home') }}</title>
@endsection

@section('content')
  <!-- Hero Area Start -->
  <div class="hero-area" id="hero-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-content">
            <div class="content">
              <h1 class="mb-4">Content Aggregator Media Monitoring & RSS to Full Text API</h1>
              <h5 class="mb-4">
                Content Aggregator is perfect for Businesses, Data Scientist, Content Strategists, Journalistic Professionals and Web Developer with our RSS to Full Text API solution.
              </h5>
              
              <div class="d-flex pb-1">
                <span>&#8226;&nbsp;&nbsp;</span>
                <span>Real Time Media Monitoring</span>
              </div>
              
              <div class="d-flex pb-1">
                <span>&#8226;&nbsp;&nbsp;</span>
                <span>Rss to Full Text API</span>
              </div>
              
              <div class="d-flex pb-1">
                <span>&#8226;&nbsp;&nbsp;</span>
                <span>Full RSS Stories Email Delivery</span>
              </div>
              
              <div class="d-flex pb-5">
                <span>&#8226;&nbsp;&nbsp;</span>
                <span>Compatible with Gmail, Evernote, Feedly, Wordpress, Tumblr, Joomla, Drupal, Blogger and more!</span>
              </div>
              
              <div class="subscribe-area">
                <form action="{{ route('register') }}" class="subscribe-form">
                  <input type="email" placeholder="Enter your email">
                  <button type="submit" class="submit-btn">Get Started Now</button>
                </form>
                <a href="https://www.youtube.com/watch?v=CLuF2GK3Xzw" class="video-play-btn mfp-iframe">
                  <i class="fas fa-play"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="right-content">
            <img src="{{ asset('softio/images/smile.svg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Area End -->

  <section class="features">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 pb-4 pb-lg-0">
          <div class="text-center">
            <h1>RSS to Full Text API</h1>
            <h5 class="py-4 font-weight-normal">
              Content Aggregator is the Simplest Way to Monitor, Syndicate and Curate News and Full Text RSS in Real Time
            </h5>
            <div class="d-flex justify-content-center">
              <div class="right-links">
                <a href="{{ route('pricing') }}" class="base-btn1">
                  Pricing & Plans
                </a>
                <a href="{{ route('register') }}" class="base-btn2 ml-3">
                  Register Now
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 transform">
          <img src="{{ asset('softio/images/rss-full-text.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="features">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <img class="w-100" src="{{ asset('softio/images/rss.jpg') }}" alt="">
                <div class="content mt-5">
                  <h4 class="title">
                    Full Text RSS Feed
                  </h4>
                  <p class="concept-content">
                    Content Aggregator allows you to turn any RSS feed, which typically content the headings and summary of the news story, into the Full Text RSS feed with the full news story.
                  </p>
                  <a href="{{ route('register') }}" class="base-btn1">
                    Get started
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <img class="w-100" src="{{ asset('softio/images/real-time-media-monitoring.jpg') }}" alt="">
                <div class="content mt-5">
                  <h4 class="title">
                    Real Time Media Monitoring
                  </h4>
                  <p class="concept-content">
                    Leverage keyword filters for Real Time Media Monitoring so you can keep up to date with the latest news around your industry and stay ahead of the curve!
                  </p>
                  <a href="{{ route('register') }}" class="base-btn1">
                    Get started
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <img class="w-100" src="{{ asset('softio/images/rss-concept.jpg') }}" alt="">
                <div class="content mt-5">
                  <h4 class="title">
                    What is RSS?
                  </h4>
                  <p class="concept-content">
                    RSS, which stands for Really Simple Syndication, is a web standard built on top of XML (Extensive Markup Language) for delivering content such as news stories, press releases and blog articles.
                  </p>
                  <a href="{{ route('register') }}" class="base-btn1">
                    Get started
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Start -->
  <section class="testimonial">
		<div class="container">
      <div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="section-heading">
						<h2 class="title">
							What People Says
						</h2>
						<p class="text">
							We use the latest technologies and tools in order to create a better code that not only works great, but it is easy easy to work with too.
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial-none-slider row">
						<div class="slider-item col-lg-4 pb-2 pb-lg-0">
							<div class="single-review">
								<div class="stars">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
								</div>
								<div class="content">
									<p class="testimonial-content">
                    We add our competitors' blogs to our local intranet site using Content Aggregator and we're able to query much more data than just the titles and summaries from their blog's RSS feeds. We also scan and analyze the Technology and Business sections of media outlets filtering for just news around our industry
									</p>
								</div>
								<div class="reviewr">
									<div class="img d-none">
										<img src="softio/images/reviewr/p2.png" alt="">
									</div>
									<div class="content">
										<h4 class="name">Inland Rentals, Inc.</h4>
									</div>
								</div>
							</div>
            </div>
            
						<div class="slider-item col-lg-4 pb-2 pb-lg-0">
							<div class="single-review">
								<div class="stars">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
								</div>
								<div class="content">
									<p class="testimonial-content">
                    This is an excellent tool for pulling the full text version of news stories into our team's favorite RSS reader so we can access news stories online and offline.
									</p>
								</div>
								<div class="reviewr">
									<div class="img d-none">
										<img src="softio/images/reviewr/p3.png" alt="">
									</div>
									<div class="content">
										<h4 class="name">PRDistribution.com, Inc.</h4>
									</div>
								</div>
							</div>
            </div>
						
						<div class="slider-item col-lg-4">
							<div class="single-review">
								<div class="stars">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
								</div>
								<div class="content">
									<p class="testimonial-content">
                    Content Aggregator is an amazing tool. It is easy to use. I would recommend this to anyone who is a journalistic professional or just need to research news stories and press releases.
									</p>
								</div>
								<div class="reviewr">
									<div class="img d-none">
										<img src="softio/images/reviewr/p4.png" alt="">
									</div>
									<div class="content">
										<h4 class="name">J.H., UX Designer</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!-- Testimonial End -->

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