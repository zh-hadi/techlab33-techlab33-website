@extends('frontend.layouts.main')

@section('title', $post->title . ' | Blog | TechLab33 Ltd')

@section('content')


 <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Blog Details</h1>
        <p style="font-size: 18px;">Stay updated with the latest trends, insights, and innovations in technology, business, and digital solutions. At Techlab33 Ltd, our blog is a hub of knowledge where we share industry news, expert opinions, technical tutorials, and success stories that inspire and inform.

Whether you're a tech enthusiast, business leader, or curious learner — our content is designed to add value and spark new ideas. Explore how smart technology and ethical innovation drive progress in today’s digital world.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
            <li class="current">Blog Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{ $post->title }}</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $post->user->name }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $post->created_at->format('M j, Y')}}</time></a></li>
                    {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li> --}}
                  </ul>
                </div><!-- End meta top -->

                  <div class="content">
                    {!! $post->content !!}
                  </div>
          

                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="{{  route('blogs.index', ['category' => $post->categories[0]->name ]) }}">{{ $post->categories[0]->name }}</a></li>
                  </ul>

                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    @foreach ($post->tags as $tag)
                      <li><a href="{{  route('blogs.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                    {{-- <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li> --}}
                  </ul>
                </div><!-- End meta bottom -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->


   

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Blog Author Widget -->
            <div class="blog-author-widget widget-item">

              <div class="d-flex flex-column align-items-center">
                <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
                <h4>{{ $post->user->name }}</h4>
                <div class="social-links">
                  <a href="{{ $settings->x_link }}"><i class="bi bi-twitter-x"></i></a>
                  <a href="{{ $settings->facebook_link }}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $settings->instagram_link }}"><i class="biu bi-instagram"></i></a>
                  <a href="{{ $settings->linkedin_link }}"><i class="biu bi-linkedin"></i></a>
                </div>

                <p>
                  Explore fresh ideas, tech trends, and practical insights. Our blog shares useful tips, updates, and stories to help you stay informed and inspired in the ever-evolving digital world.
                </p>

              </div>
            </div><!--/Blog Author Widget -->

            {{-- <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget --> --}}

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                @foreach ($categories as $category)
                  <li><a href="{{  route('blogs.index', ['category' => $category->slug ]) }}">{{  $category->name }} <span>({{ $category->posts_count }})</span></a></li>
                @endforeach
                {{-- <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li> --}}
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              @foreach ($recent_posts as $post)

                 <div class="post-item">
                    <img src="{{  image($post->image) }}" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="{{ route('blogs.show', $post) }}">{{ $post->title }}</a></h4>
                      <time datetime="2020-01-01">{{ $post->created_at->format('M d, Y') }}</time>
                    </div>
                  </div>
                
              @endforeach

              {{-- <div class="post-item">
                <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item--> --}}

             

            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                @foreach ($tags as $tag)
                  <li><a href="{{  route('blogs.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                @endforeach
                {{-- <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li> --}}
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>



@endsection