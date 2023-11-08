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
        <li><a href="{{ url($row->getCategory->category_slug) }}">{{ $row->getCategory->category_name }} <i
              class="fa-solid fa-chevron-right"></i></a></li>
        <li>{{ $row->sub_category_name }}</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Products area start -->
  <section class="blog__area-6 pt-5 pb-5 bg-light">
    <div class="container g-0">

      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="sec-title-wrapper text-start">
            <h2 class="sec-title">{{ $row->sub_category_name }}</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feature__text text-justify">
            {{ $row->shortnote }}
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="faq__area">
    <div class="container g-0 pt-100 pb-100">
      <div class="row align-items-center">
        <div class="col-lg-7">
          {!! $row->description !!}
        </div>
        <div class="col-lg-5">
          <div class="faq__img"><img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->sub_category_name }}"
              data-speed="auto">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Product area start -->
  <section class="portfolio__area-5 bg-light">
    <div class="container-fluid pt-100">
      <div class="row pb-5">
        <div class="col-lg-12">
          <div class="sec-title-wrapper">
            <h3 class="sec-title">Types of {{ $row->sub_category_name }} - 1</h3>
          </div>
          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
            has been the industry's standard dummy text.</p>
        </div>
      </div>

      <div class="row">
        <div class="portfolio__inner-5">

          @foreach ($row->getAllProduct as $pd)
            <div class="portfolio__item-5">
              <img src="{{ asset($pd->thumbnail_path) }}" alt="{{ $pd->product_name }}">
              <div class="portfolio__content-5">
                {{-- <h2 class="portfolio__name-5">Hand prosthetics</h2> --}}
                <h3 class="portfolio__title-5 mb-2">{{ $pd->product_name }}</h3>
                <a href="{{ url($pd->product_slug) }}" class="blog__btn">View Product Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>
  <!-- Product area end -->

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
