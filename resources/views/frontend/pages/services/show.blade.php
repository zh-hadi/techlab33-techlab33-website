@extends('frontend.layouts.main')


@section('content')

 <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Service Details</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">{{ $service->name }}</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Serices List</h4>
              <div class="services-list">
                @foreach ($services as $item)
                    <a href="{{ route('servicespage.show', ['slug' => $item->slug]) }}"
                        class="{{ request()->routeIs('servicespage.show') && request()->slug == $item->slug ? 'active' : '' }}">
                            <i class="bi bi-arrow-right-circle"></i>
                            <span>{{ $item->name }}</span>
                    </a>

                @endforeach
                  {{-- <a href="#" class="active"><i class="bi bi-arrow-right-circle"></i><span>Web Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Product Management</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Graphic Design</span></a>
                <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Marketing</span></a> --}}
              </div>
            </div><!-- End Services List -->

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Have a Question?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>{{ $settings->phone }}</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:{{ $settings->website_email }}">{{ $settings->website_email }}</a></p>
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <img src="{{  image($service->image	) }}" alt="" class="img-fluid services-img">
            <h3>{{ $service->title }}</h3>
            <div>
                {!! $service->content !!}
            </div>
            {{-- <p>
              Blanditiis voluptate odit ex error ea sed officiis deserunt. Cupiditate non consequatur et doloremque consequuntur. Accusantium labore reprehenderit error temporibus saepe perferendis fuga doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos deleniti officia qui.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
            </ul>
            <p>
              Est reprehenderit voluptatem necessitatibus asperiores neque sed ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut pariatur itaque nesciunt fuga.
            </p>
            <p>
              Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam aut consequuntur recusandae mollitia doloremque est architecto cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex repellendus eveniet velit sint quia sapiente cumque. Et ipsa perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum. Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae ipsum at consequatur vero. Architecto ut pariatur autem ad non cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias explicabo ea.
            </p> --}}
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

@endsection