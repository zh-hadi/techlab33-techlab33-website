  <footer id="footer" class="footer dark-background">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="{{  route('subscribe.store') }}" method="post" class="php-email-form">
              @csrf
              
              <div class="newsletter-form"><input type="email" name="email" placeholder="E-mail Address"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="/" class="d-flex align-items-center">
            {{-- <span class="sitename">{{ $settings->website_name }}</span> --}}
             <img style="height: 80px !important;" src="{{ image($settings->website_logo) }}" alt="">
          </a>
          <div class="footer-contact pt-3">
            
            <p class="col-lg-5">{{ $settings->address }}</p>
            {{-- <p>New York, NY 535022</p> --}}
            <p class="mt-3"><strong>Telephone:</strong> <span>{{ $settings->telephone }}</span></p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{ $settings->phone }}</span></p>
            <p><strong>Email:</strong> <span>{{ $settings->website_email }}</span></p>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          {{-- <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home.page') }}">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about.page') }}">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('servicespage.index') }}">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('projectspage.index') }}">Projects</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('blogs.index') }}">Blogs</a></li>
          </ul> --}}
          <h4>Memeber of Basis</h4>
          <div style="">
           <img class="logo-image" src="{{ asset('assets/frontend/img/basis-logo.svg') }}" alt="Basis Logo">
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            @foreach ($c_services as $item)
              <li><i class="bi bi-chevron-right"></i> <a href="{{  route('servicespage.show', ['slug' => $item->slug ]) }}">{{ $item->name }}</a></li>
            @endforeach
            {{-- <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li> --}}
          </ul>
        </div>

        <div class="col-lg-3 col-md-12">
          <h4>Follow Us</h4>
          <p>Stay connected with Techlab33 Ltd for updates, insights, and innovation in action. Join our community online and see how we’re shaping the future—one solution at a time.</p>
          <div class="social-links d-flex">
            <a target="_blank" href="{{ $settings->x_link }}"><i class="bi bi-twitter-x"></i></a>
            <a target="_blank" href="{{ $settings->facebook_link }}"><i class="bi bi-facebook"></i></a>
            <a target="_blank" href="{{ $settings->instagram_link }}"><i class="bi bi-instagram"></i></a>
            <a target="_blank" href="{{ $settings->linkedin_link }}"><i class="bi bi-linkedin"></i></a>
            <a target="_blank" href="{{ $settings->youtube_link }}"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $settings->website_name }}</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>

  </footer>