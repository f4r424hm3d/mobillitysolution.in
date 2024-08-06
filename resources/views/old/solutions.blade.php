@extends('old.layouts.main')
@push('seo_meta_tag')
  @include('old.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb area start -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('old') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>Solutions</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Prosthetic Solution area start -->
  <section class="solution__area pb-100">
    <div class="container hero-line"></div>
    <div class="solution__wrapper">
      <div class="solution__left">
        <div class="solution__img-1"><img src="{{ url('web/') }}/assets/imgs/products/prosthetics/b1.png" alt="Image">
        </div>
      </div>

      <div class="solution__mid">
        <h1 class="solution__title">Solutions</h1>
        <p class="text-justify">The motto of Mobility Solution is to embrace a special approach for our patients
          and seeking “solicitous” for our partnering clinics and hospitals. We make you embark on our journey for a
          better rehabilitation experience.</p>
      </div>

      <div class="solution__right">
        <div class="solution__img-3"><img src="{{ url('web/') }}/assets/imgs/products/prosthetics/b3.png"
            alt="Solution Image">
        </div>
      </div>
    </div>

    <div class="solution__shape">
      <img src="{{ url('web/') }}/assets/imgs/icon/1.png" alt="Shape Image" class="shape-1">
      <img src="{{ url('web/') }}/assets/imgs/icon/2.png" alt="Shape Image" class="shape-2">
      <img src="{{ url('web/') }}/assets/imgs/icon/3.png" alt="Shape Image" class="shape-3">
      <img src="{{ url('web/') }}/assets/imgs/icon/4.png" alt="Shape Image" class="shape-4">
      <img src="{{ url('web/') }}/assets/imgs/icon/5.png" alt="Shape Image" class="shape-5">
    </div>
  </section>
  <!-- Prosthetic Solution area end -->

  <section class="bg-light">
    <div class="container g-0 pt-100 pb-100">
      <div class="row">
        <div class="col-lg-12 pb-100">
          <div class="sec-title-wrapper">
            <h3 class="sec-title mb-4">Closed loop for optimum treatment</h3>
          </div>
          <p class="font-20 text-justify">We take a holistic approach to treatment so people can enjoy the best
            possible quality of life.</p>
          <p class="font-20 text-justify">From the initial consultation through to taking measurements, fitting the
            device and rehabilitation – we offer guidance and support, and develop custom solutions.</p>
        </div>
      </div>

      @php
        $i = 1;
      @endphp
      @foreach ($productCategories as $row)
        @php
          $num = checkOddOrEven($i);
        @endphp
        <div class="row align-items-center pb-100">
          @if ($num == 'even')
            <div class="col-lg-5">
              <div class="faq__img"><img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->category_name }}"
                  data-speed="auto">
              </div>
            </div>
          @endif
          <div class="col-lg-7">
            <h2 class="faq__title">{{ $row->category_name }}</h2>
            {!! $row->description !!}
            <div class="btn-common-wrap">
              <a href="{{ url('old/' . $row->category_slug) }}" class="blog__btn mt-4">Explore Now <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
          </div>
          @if ($num == 'odd')
            <div class="col-lg-5">
              <div class="faq__img"><img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->category_name }}"
                  data-speed="auto">
              </div>
            </div>
          @endif
        </div>
        @php
          $i++;
        @endphp
      @endforeach

    </div>
  </section>
@endsection
