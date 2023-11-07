@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb area start -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('/') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>Blogs</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Blog area start -->
  <section class="story__area bg-light pt-100">
    <div class="container g-0">
      <div class="sec-title-wrapper">

        <div class="row pb-5">
          <div class="col-lg-7 col-md-6">
            <div class="sec-title-wrapper">
              <p>Recent Blog</p>
              <h2 class="sec-title">Read Updated Journal</h2>
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <div class="feature__text text-justify">
              <p>Read our blog and try to see everything from every perspective. Our passion lies in making
                everything
                accessible and aesthetic for everyone.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if ($blogs->count() > 0)
    <section class="blog__area-3 pb-140 blog__animation bg-light">
      <div class="container">

        <div class="row">

          @foreach ($blogs as $row)
            <div class="col-lg-6">
              <article class="blog__item-3 mb-5">
                <div class="blog__img-wrapper-3">
                  <div class="img-box">
                    <img class="image-box__item" src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->title }}">
                    <img class="image-box__item" src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->title }}">
                  </div>
                </div>
                <div class="blog__info-3">
                  <h4 class="blog__meta">{{ $row->getCategory->category_name }} .
                    {{ getFormattedDate($row->created_at, 'd M, Y') }}</h4>
                  <h5>
                    <div class="blog__title-3">{{ $row->title }}</div>
                  </h5>
                  <a href="{{ url($row->slug) }}" class="blog__btn">Expolore Now <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
                </div>
              </article>
            </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- Blog area end -->
  @endif
@endsection
