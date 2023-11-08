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
        <li><a href="{{ url('solutions') }}">Solutions <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="{{ url($row->getCategory->category_slug) }}">{{ $row->getCategory->category_name }} <i
              class="fa-solid fa-chevron-right"></i></a>
        </li>
        <li><a href="{{ url($row->getSubCategory->sub_category_slug) }}">{{ $row->getSubCategory->sub_category_name }} <i
              class="fa-solid fa-chevron-right"></i></a>
        </li>
        <li>{{ $row->product_name }}</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Products area start -->
  <section class="woocomerce__single sec-plr-50 bg-light pb-100">

    <div class="container g-0">
      <div class="row">

        <div class="col-lg-6">
          <div class="woocomerce__single-left">
            <img src="{{ asset($row->thumbnail_path) }}" alt="single-1" class="img-fluid">
          </div>
        </div>

        <div class="col-lg-6 pl-50 product-details">
          <div class="woocomerce__single-right wc_slide_btm">
            <div class="woocomerce__single-content">
              <h2 class="woocomerce__single-title">{{ $row->product_name }}</h2>

              <div class="show-more-box">
                <div class="text show-more-height">
                  {!! $row->description !!}
                </div>
                <div class="show-more">Show Less</div>
              </div>

              <a href="{{ url('enquiry') }}" class="blog__btn">Enquiry Now <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>

              <div class="woocomerce__single-varitions">
                <div class="accordion" id="accordionExample">
                  @foreach ($row->getContents as $pc)
                    <div class="accordion-item">
                      <div class="accordion-header" id="headingOne{{ $pc->id }}">
                        <div class="accordion-button collapsed bg-light" role="contentinfo" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne{{ $pc->id }}" aria-expanded="false"
                          aria-controls="collapseOne{{ $pc->id }}">
                          <div class="woocomerce__single-stitle">{{ $pc->title }}</div>
                        </div>
                      </div>
                      <div id="collapseOne{{ $pc->id }}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne{{ $pc->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          {!! $pc->description !!}
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
    </div>
  </section>

  @if ($relatedProducts->count() > 0)
    <!-- Related Product start -->
    <section class="portfolio__area-5">
      <div class="container-fluid pt-100 pb-100">
        <div class="row pb-5">
          <div class="col-lg-12">
            <div class="sec-title-wrapper">
              <h3 class="sec-title">Related Products</h3>
            </div>
            {{-- <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
              has been the industry's standard dummy text.</p> --}}
          </div>
        </div>

        <div class="row">
          <div class="portfolio__inner-5">

            @foreach ($relatedProducts as $row)
              <div class="portfolio__item-5">
                <img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->product_name }}">
                <div class="portfolio__content-5">
                  {{-- <h2 class="portfolio__name-5">Hand prosthetics</h2> --}}
                  <h3 class="portfolio__title-5 mb-2">{{ $row->product_name }}</h3>
                  <a href="{{ url($row->product_slug) }}" class="blog__btn">View Product Details <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
                </div>
                </a>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product end -->
  @endif
  <!-- Products area end -->
@endsection
