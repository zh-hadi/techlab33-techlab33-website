<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img style="max-height: 80px !important;" src="{{ image($settings->website_logo) }}" alt="">
        {{-- <h1 class="sitename">Moderna</h1> --}}
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{  route('home.page') }}" class="{{  request()->routeIs('home.page') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{  route('about.page') }}" class="{{  request()->routeIs('about.page') ? 'active' : '' }}">About</a></li>
          <li><a href="{{  route('servicespage.index') }}" class="{{  request()->routeIs('servicespage.*') ? 'active' : '' }}">Services</a></li>
          <li><a href="{{  route('projectspage.index') }}" class="{{  request()->routeIs('projectspage.*') ? 'active' : '' }}">Projects</a></li>
          {{-- <li><a href="team.html">Team</a></li> --}}
          <li><a href="{{  route('blogs.index') }}" class="{{  request()->routeIs('blogs.*') ? 'active' : '' }}">Blog</a></li>
          {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> --}}
          <li><a href="{{  route('contact.page') }}" class="{{ request()->routeIs('contact.page') ? 'active' : '' }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>