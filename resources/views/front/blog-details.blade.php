@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb area start -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('/') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="{{ url('news') }}">Blogs <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>{{ $blog->title }}</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Blog detail area start -->
  <section class="blog__detail pt-100 pb-100 bg-light">
    <div class="container g-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog__detail-top">
            <h2 class="blog__detail-date animation__word_come">{{ $blog->getCategory->category_name }}
              <span>{{ getFormattedDate($blog->created_at, 'd M, Y') }}</span>
            </h2>
            <h3 class="blog__detail-title animation__word_come">{{ $blog->title }}</h3>
            <div class="blog__detail-metalist">
              <div class="blog__detail-meta">
                <img src="{{ url('web/') }}/assets/imgs/blog/author.png" alt="{{ $blog->getAuthor->name }}">
                <p>Writen by <span>{{ $blog->getAuthor->name }}</span></p>
              </div>
              {{-- <div class="blog__detail-meta">
                <p>Viewed <span>48k</span></p>
              </div> --}}
            </div>
          </div>
        </div>

        @if ($blog->image_path != null)
          <div class="col-xxl-12">
            <div class="blog__detail-thumb"><img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}"
                data-speed="0.5">
            </div>
          </div>
        @endif
        <div class="col-xxl-8 col-xl-10 offset-xxl-2 offset-xl-1">
          <div class="blog__detail-content">
            {!! $blog->description !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog detail area end -->
@endsection
