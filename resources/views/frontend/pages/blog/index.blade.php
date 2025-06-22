@extends('frontend.layouts.main')

@section('title', $title ?? null)

@section('content')


  <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Blog</h1>
        <p style="font-size: 18px;">Stay updated with the latest trends, insights, and innovations in technology, business, and digital solutions. At Techlab33 Ltd, our blog is a hub of knowledge where we share industry news, expert opinions, technical tutorials, and success stories that inspire and inform.

Whether you're a tech enthusiast, business leader, or curious learner — our content is designed to add value and spark new ideas. Explore how smart technology and ethical innovation drive progress in today’s digital world.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{  route('home.page') }}">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="row gy-4">


          @forelse ($blogs as $blog)
            <div class="col-lg-4">
              <article>

                <div class="post-img">
                  <img src="{{  image($blog->image) }}" alt="" class="img-fluid">
                </div>

                {{-- <p class="post-category">{{ $blog?->categories[0]?->name }}</p> --}}

                <h2 class="title">
                  <a href="{{  route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                </h2>

                <div class="d-flex align-items-center">
                  <img src="{{ image( $blog?->user?->image ) }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                  <div class="post-meta">
                    <p class="post-author">{{ $blog?->user?->name }}</p>
                    <p class="post-date">
                      <time datetime="2022-01-01">{{ $blog->created_at->format('M j, Y') }}</time>
                    </p>
                  </div>
                </div>

              </article>
            </div><!-- End post list item -->
          @empty
            <div class="text-center my-5">
                <h2 class="text-muted">No blog posts found.</h2>
                {{-- <p>No blog posts found.</p> --}}
            </div>
          @endforelse



        </div>
      </div>

    </section><!-- /Blog Posts Section -->


    @if($blogs->hasPages())
      <section id="blog-pagination" class="blog-pagination section">
        <div class="container">
          <div class="d-flex justify-content-center">
            <ul class="pagination">
              {{-- Previous Page Link --}}
              @if ($blogs->onFirstPage())
                <li><span><i class="bi bi-chevron-left"></i></span></li>
              @else
                <li><a href="{{ $blogs->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
              @endif

              {{-- Page Numbers --}}
              @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                @if ($i == $blogs->currentPage())
                  <li><a href="#" class="active">{{ $i }}</a></li>
                @elseif ($i == 1 || $i == $blogs->lastPage() || abs($i - $blogs->currentPage()) <= 2)
                  <li><a href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                @elseif ($i == 2 && $blogs->currentPage() > 4)
                  <li>...</li>
                @elseif ($i == $blogs->lastPage() - 1 && $blogs->currentPage() < $blogs->lastPage() - 3)
                  <li>...</li>
                @endif
              @endfor

              {{-- Next Page Link --}}
              @if ($blogs->hasMorePages())
                <li><a href="{{ $blogs->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
              @else
                <li><span><i class="bi bi-chevron-right"></i></span></li>
              @endif
            </ul>
          </div>
        </div>
      </section>
    @endif

    <!-- Blog Pagination Section -->
    {{-- <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section --> --}}

@endsection