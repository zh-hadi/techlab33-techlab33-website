@extends('frontend.layouts.main')

@section('title', $project->name ?? '' . ' | Projects | TechLab33 Ltd')

@section('content')


<!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Project Details</h1>
        <p>Delivering excellence through innovative solutions, Techlab33 Ltd’s projects showcase our commitment to quality, precision, and impactful results. Each project reflects our dedication to driving technological advancement and creating lasting value for our clients.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{  route('projectspage.index') }}">Projects</a></li>
            <li class="current">{{ $project->name }}</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                @foreach ($project->images as $image)
                    <div class="swiper-slide">
                        <img src="{{  image($image->image_path) }}" alt="">
                    </div>
                @endforeach

              {{-- 
                <div class="swiper-slide">
                  <img src="assets/img/portfolio/product-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/branding-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/books-1.jpg" alt="">
                </div> --}}

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>:{{ $project->category->name }}</li>
                <li><strong>Client</strong>: {{ $project->client }}</li>
                <li><strong>Project date</strong>: {{ $project->publish_date }}</li>
                <li><strong>Project URL</strong>: <a target="_blank" href="{{  $project->url }}">{{ $project->url }}</a></li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>{{ $project->name }}</h2>
              <p>
                {{  $project->description }}
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->


@endsection