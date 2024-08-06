@extends('old.layouts.main')
@push('seo_meta_tag')
  @include('old.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb area start -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('/') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="#">About Mobility <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>What make us different</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- What make different area start -->
  <section class="story__area bg-light pt-100 pb-100">
    <div class="container g-0">
      <div class="sec-title-wrapper">

        <div class="row">
          <div class="col-lg-4 col-md-4">
            <h2 class="sec-sub-title">Lorem Ipsum</h2>
            <h3 class="sec-title">What make us different</h3>
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="story__text">
              <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                PageMaker including versions of Lorem Ipsum.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="story__img-wrapper">
            <img src="{{ url('web/') }}/assets/imgs/about/1.jpg" alt="Story Thumbnail" class="w-100">
          </div>
        </div>
        <div class="col-lg-5 col-md-5">
          <div class="story__img-wrapper img-anim">
            <img src="{{ url('web/') }}/assets/imgs/about/2.jpg" alt="Story Thumbnail" data-speed="auto">
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="story__img-wrapper">
            <img src="{{ url('web/') }}/assets/imgs/about/3.jpg" alt="Story Thumbnail">
            <img src="{{ url('web/') }}/assets/imgs/about/4.jpg" alt="Story Thumbnail">
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-12">
          <div class="story__text">
            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining
              essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
              Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
              including versions of Lorem Ipsum.</p>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
