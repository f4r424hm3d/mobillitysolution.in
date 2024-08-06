@extends('old.layouts.main')
@push('seo_meta_tag')
  @include('old.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb area start -->
  <style type="text/css">
    .portfolio__image-wrapper {
      overflow: hidden;
      height: 200px;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .portfolio__image {
      height: 100%;
      width: auto;
    }

    .title_bottom {
      background-color: #decf00;
      padding: 10px;
      text-align: center;
    }

    .portfolio__item-5:hover .portfolio__content-5 {
      opacity: 1;
      right: 0px;
      width: 100%;
    }

    .portfolio__title-5 {
      font-size: 17px;
      font-weight: 500;
      color: var(--white);
      text-transform: uppercase;
    }

    .blog__btn {
      display: inline-block;
      font-weight: 400;
      font-size: 14px;
    }

    .portfolio__content-5 {
      top: 55% !important;
    }

    .title_bottom h3 {
      color: white;
      margin: 0;
      font-size: 16px;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
      .portfolio__inner-5 {
        gap: 20px !important;
      }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
      .portfolio__item-5 {
        width: 23% !important;
      }
    }

    @media only screen and (min-width: 320px) and (max-width: 420px) {
      .popup-image {
        width: 55%;
        height: auto;
        max-height: 70%;
      }

      .gallery {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 10px;
      }
  </style>

  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('old') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="{{ url('old/solutions') }}">Solutions <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="{{ url('old/' . $row->getCategory->category_slug) }}">{{ $row->getCategory->category_name }} <i
              class="fa-solid fa-chevron-right"></i></a></li>
        <li>{{ $row->sub_category_name }}</li>
      </ul>
    </div>
  </div>

  <!-- Products area -->
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
              data-speed="auto"></div>
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
          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
            been the industry's standard dummy text.</p>
        </div>
      </div>

      <div class="row">
        <div class="portfolio__inner-5 row">
          @foreach ($row->getAllProduct as $pd)
            <div class="portfolio__item-5 col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="portfolio__image-wrapper">
                <img src="{{ asset($pd->thumbnail_path) }}" alt="{{ $pd->product_name }}" class="portfolio__image">
              </div>
              <div class="title_bottom">
                <h3 class="portfolio__title-5 mb-2">{{ $pd->product_name }}</h3>
              </div>
              <div class="portfolio__content-5">
                <h3 class="portfolio__title-5 mb-2">{{ $pd->product_name }}</h3>
                <a href="{{ url('old/' . $pd->product_slug) }}" class="blog__btn">View Product Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
          @endforeach
        </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
@endsection
