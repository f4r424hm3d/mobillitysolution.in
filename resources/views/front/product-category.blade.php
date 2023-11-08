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
        <li><a href="{{ url('solutions') }}">Solutions <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>{{ $row->category_name }}</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Prosthetic area start -->
  <section class="solution__area pb-100">
    <div class="container hero-line"></div>
    <div class="solution__wrapper">
      <div class="solution__left">
        <div class="solution__img-1"><img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->category_name }}"></div>
      </div>

      <div class="solution__mid">
        <h1 class="solution__title">{{ $row->category_name }}</h1>
        <p class="text-justify">{{ $row->shortnote }}</p>
      </div>

      <div class="solution__right">
        <div class="solution__img-3"><img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->category_name }}">
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
  <!-- Prosthetic area end -->

  <!-- Products area start -->
  <section class="bg-light">
    <div class="container g-0 pt-100 pb-100">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="faq__img"><img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->category_name }}"
              data-speed="auto">
          </div>
        </div>

        <div class="col-lg-7">
          {!! $row->description !!}
        </div>
      </div>
    </div>
  </section>

  <section class="blog__area-6 blog__animation">
    <div class="container g-0 pt-100 pb-100">

      <div class="row pb-5">
        <div class="col-lg-6 col-md-6">
          <div class="sec-title-wrapper text-start">
            <h2 class="sec-title">Types of {{ $row->category_name }}</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feature__text text-justify">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text.</p>
          </div>
        </div>
      </div>

      <div class="row reset-grid">

        @foreach ($row->getAllSubCategory as $sc)
          <div class="col-lg-6">
            <article class="blog__item">
              <div class="blog__img-wrapper">
                <div class="img-box">
                  <img class="image-box__item" src="{{ asset($sc->thumbnail_path) }}"
                    alt="{{ $sc->sub_category_name }}">
                  <img class="image-box__item" src="{{ asset($sc->thumbnail_path) }}"
                    alt="{{ $sc->sub_category_name }}">
                </div>
              </div>
              <h5>
                <div class="blog__title">{{ $sc->sub_category_name }}</div>
              </h5>
              <p class="mb-3 text-justify">{{ $sc->shortnote }}</p>
              <a href="{{ url($sc->sub_category_slug) }}" class="blog__btn">Explore Now <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </article>
          </div>
        @endforeach

      </div>
    </div>
  </section>

  @if ($row->getFaqs->count() > 0)
    <section class="faq__area bg-light">
      <div class="container g-0 pt-100 pb-100">
        <div class="row">

          <div class="col-lg-12">
            <div>
              <h2 class="faq__title">Faqs</h2>

              <div class="faq__list">
                <div class="accordion" id="accordionExample">
                  @foreach ($row->getFaqs as $faq)
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo{{ $faq->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo{{ $faq->id }}" aria-expanded="false"
                          aria-controls="collapseTwo{{ $faq->id }}">{{ $faq->question }}</button>
                      </h2>
                      <div id="collapseTwo{{ $faq->id }}" class="accordion-collapse collapse"
                        aria-labelledby="headingTwo{{ $faq->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-justify">
                          {{ $faq->answer }}
                        </div>
                      </div>
                    </div>
                  @endforeach
                  {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Design
                        should enrich our day</button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body text-justify">
                        <p>This is the second item's accordion body. It is hidden by default, until the collapse
                          plugin adds the appropriate classes that we use to style each element. These classes control
                          the overall appearance, as well as the showing and hiding via CSS transitions. You can
                          modify any of this with custom CSS or overriding our default variables.</p>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Bring their
                        individual experience and creative</button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body text-justify">
                        <p>This is the second item's accordion body. It is hidden by default, until the collapse
                          plugin adds the appropriate classes that we use to style each element. These classes control
                          the overall appearance, as well as the showing and hiding via CSS transitions. You can
                          modify any of this with custom CSS or overriding our default variables.</p>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
  <!-- Products area end -->
@endsection
