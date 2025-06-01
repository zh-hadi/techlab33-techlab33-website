@extends('frontend.layouts.main')

@section('content')


   <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Services</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

            @foreach ($service_categories as $item)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                    <div class="icon">
                    <i class="{{ $item->icon }}"></i>
                    </div>
                    <a href="{{  route('servicespage.show', ['slug' => $item->slug ]) }}" class="stretched-link">
                    <h3>{{ $item->name }}</h3>
                    </a>
                    <p>{{ $item->description }}</p>
                </div>
                </div><!-- End Service Item -->
            @endforeach


        

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            @foreach ($services as $index =>  $service)
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="{{ $index + 2}}00">
                    <div class="service-item position-relative">
                        <div class="img">
                        <img src="{{  image($service->image ) }}" class="img-fluid" alt="">
                        </div>
                        <div class="details">
                        <a href="{{  route('servicespage.show', ['slug' => $service->slug ]) }}" class="stretched-link">
                            <h3>{{ $service->name }}</h3>
                        </a>
                        <p>
                        {{  $service->description }}
                        </p>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endforeach

          {{-- <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="img">
                <img src="assets/img/services-2.jpg" class="img-fluid" alt="">
              </div>
              <div class="details">
                <a href="service-details.html" class="stretched-link">
                  <h3>Eosle Commodi</h3>
                </a>
                <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="img">
                <img src="{{ asset('assets/frontend/img/services-3.jpg') }}" class="img-fluid" alt="">
              </div>
              <div class="details">
                <a href="service-details.html" class="stretched-link">
                  <h3>Ledo Markt</h3>
                </a>
                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="img">
                <img src="assets/img/services-4.jpg" class="img-fluid" alt="">
              </div>
              <div class="details">
                <a href="service-details.html" class="stretched-link">
                  <h3>Asperiores Commodit</h3>
                </a>
                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                <a href="service-details.html" class="stretched-link"></a>
              </div>
            </div>
          </div><!-- End Service Item --> --}}

        </div>

      </div>

    </section><!-- /Services Section -->

    {{-- <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-4 g-lg-0">

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Free Plan</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4 featured" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-item">
              <h3>Business Plan</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section --> --}}

@endsection