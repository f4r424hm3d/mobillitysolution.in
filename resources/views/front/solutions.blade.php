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

      <div class="row align-items-center pb-100">
        <div class="col-lg-7">
          <h2 class="faq__title">Prosthetics</h2>
          <p class="mb-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            took a galley of type and scrambled it to make a type specimen book. It has survived not only five
            centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
            desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

          <div class="btn-common-wrap">
            <a href="prosthetics.html" class="blog__btn mt-4">Explore Now <span><i
                  class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="faq__img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image"
              data-speed="auto">
          </div>
        </div>
      </div>

      <div class="row align-items-center pb-100">
        <div class="col-lg-5">
          <div class="faq__img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image"
              data-speed="auto">
          </div>
        </div>
        <div class="col-lg-7">
          <h2 class="faq__title">Orthetics</h2>
          <p class="mb-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            took a galley of type and scrambled it to make a type specimen book. It has survived not only five
            centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
            desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

          <div class="btn-common-wrap">
            <a href="prosthetics.html" class="blog__btn mt-4">Explore Now <span><i
                  class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>

      <div class="row align-items-center pb-100">
        <div class="col-lg-7">
          <h2 class="faq__title">Rehab Products</h2>
          <p class="mb-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            took a galley of type and scrambled it to make a type specimen book. It has survived not only five
            centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
            desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

          <div class="btn-common-wrap">
            <a href="prosthetics.html" class="blog__btn mt-4">Explore Now <span><i
                  class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="faq__img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image"
              data-speed="auto">
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
