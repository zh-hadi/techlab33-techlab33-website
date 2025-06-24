@extends('frontend.layouts.main')

@section('title', $title ?? null)

@section('content')


  <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Contact</h1>
        <p style="font-size: 18px;">Your success is our priority. Whether you’re a client, partner, or curious visitor, feel free to reach out. Our dedicated team is ready to assist you with innovative solutions, insightful support, and timely responses.</p>
        <div>
          {{-- <p>Have a question, idea, or project in mind? We'd love to hear from you. At Techlab33 Ltd, we’re here to support your vision with smart solutions and expert advice. Whether you're looking for technical consultation or simply want to say hello, our team is just a message away. We take pride in our commitment to smart working principles—leveraging modern tools, agile practices, and thoughtful planning to deliver the best outcomes. Guided by strong professional ethics, transparency, and respect, Techlab33 Ltd ensures every client experience is built on trust and lasting value.</p> --}}
        </div>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{  route('home.page') }}">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>{{ $settings->address }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>{{ $settings->phone }}</p>
                  <p>{{ $settings->telephone }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{ $settings->website_email }}</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">
            <form action="{{  route('contacts.store') }}"  method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              @csrf
              <div class="row gy-4 pb-5">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12">
                  <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

      <div class="mt-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 370px;" src="{{  $settings->google_map_location }}" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

    </section><!-- /Contact Section -->



@endsection