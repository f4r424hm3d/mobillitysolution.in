@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
  <!-- breadcrumb schema Code -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "BreadcrumbList",
      "name": "{{ ucwords($meta_title) }}",
      "description": "{{ $meta_description }}",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}"
      }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Solutions",
        "item": "{{ url('solutions') }}"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $pageDetail->category->category_name }}",
        "item": "{{ url($pageDetail->category->category_slug) }}"
      }, {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ $pageDetail->subCategory->sub_category_name }}",
        "item": "{{ url($pageDetail->subCategory->sub_category_slug) }}"
      }, {
        "@type": "ListItem",
        "position": 5,
        "name": "{{ $pageDetail->product_name }}",
        "item": "{{ url($pageDetail->product_slug) }}"
      }]
    }
  </script>
  <!-- breadcrumb schema Code End -->
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "webpage",
      "url": "{{ url()->current() }}",
      "name": "{{ $pageDetail->product_name }}",
      "description": "{{ $meta_description }}",
      "inLanguage": "en-US",
      "keywords": ["{{ $meta_keyword }}"]
    }
  </script>
@endpush
@section('main-section')
  <!-- Breadcrumb -->
  <!-- Breadcrumb -->
  <div class="ed_detail_head lg" data-overlay="8">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1"><a href="{{ url('solutions') }}">Solutions</a></li>
              <li class="facts-1"><a
                  href="{{ url($pageDetail->category->category_slug) }}">{{ $pageDetail->category->category_name }}</a>
              </li>
              <li class="facts-1"><a
                  href="{{ url($pageDetail->category->category_slug . '/' . $pageDetail->subCategory->sub_category_slug) }}">{{ $pageDetail->subCategory->sub_category_name }}</a>
              </li>
              <li class="facts-1">{{ $pageDetail->product_name }}</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">{{ $pageDetail->product_name }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->

  <!-- Content -->
  <section class="bg-light pt-5 pb-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-8">
          <div class="new-exam-page">

            <div class="sec-heading">
              <h2>{{ $pageDetail->product_name }}</h2>
            </div>

            {{-- <div class="row align-items-center mb-3">
              @if ($pageDetail->author_id != null)
                <div class="col-8">
                  <div class="new-author">
                    <div class="img-div">
                      <img data-src="{{ userIcon($pageDetail->getUser->profile_picture ?? null) }}"
                        alt="{{ $pageDetail->getUser->name }}"><i class="fa fa-check-circle"></i>
                    </div>
                    <div class="cont-div">
                      <a href="{{ url('author/' . $pageDetail->getUser->id . '-' . $pageDetail->getUser->slug) }}">{{ $pageDetail->getUser->name }}
                      </a><span>
                        Updated on -
                        {{ getFormattedDate($pageDetail->updated_at, 'M d, Y') }}</span>
                    </div>
                  </div>
                </div>
              @endif
              <div class="col-4">
                <div class="share-button">
                  <div class="share-button__back">
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-facebook share__icon"></i></a>
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-twitter share__icon"></i></a>
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-instagram share__icon"></i></a>
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-linkedin share__icon"></i></a>
                  </div>
                  <div class="share-button__front">
                    <p class="share-button__text">Share <i class="fa fa-share-alt"></i></p>
                  </div>
                </div>
              </div>
            </div> --}}

            @if ($pageDetail->thumbnail_path != null)
              <img data-src="{{ asset($pageDetail->thumbnail_path) }}" alt="{{ $pageDetail->product_name }}">
            @endif

            <div class="edu_wraper">

              {!! $pageDetail->description !!}

              <a href="{{ url('enquiry') }}" class="big-center-btn btn-theme text-white rounded">
                Enquiry Now</a>

              @if ($pageDetail->contents->count() > 0)
                <div id="accordionExample" class="accordion circullum">
                  <div class="card mt-4 mb-4 shadow-0">
                    <div id="headingOne" class="card-header border-0 pl-4 pr-4 bg-light">
                      <h3 class="mb-0"><a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                          role="button" aria-controls="collapseOne"
                          class="d-block position-relative text-dark collapsible-link">Table of
                          Content</a></h3>
                    </div>
                    <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                      <div class="card-body pl-4 pr-4 bg-light">
                        <div class="table-of-content">
                          <ul>
                            @foreach ($pageDetail->contents as $row)
                              <li><a href="#content{{ slugify($row->title) }}">{{ $row->title }}</a></li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                @foreach ($pageDetail->contents as $row)
                  <div id="content{{ slugify($row->title) }}">
                    <h2>{{ $row->title }}</h2>
                    {!! $row->description !!}
                  </div>
                @endforeach
              @endif

              @if ($pageDetail->faqs->count() > 0)
                <div id="Frequently-Asked-Questions" class="mt-3 card shadow-0 bg-light pt-4 pb-4 pr-4 pl-4">
                  <h3>Frequently Asked Questions</h3>
                  <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                      <div class="container">
                        <div id="accordionExample" class="accordion circullum">
                          @foreach ($pageDetail->faqs as $row)
                            <div class="card mb-0 shadow-0">
                              <div id="faqheadingOne{{ $row->id }}" class="card-header bg-white border-0 b-b pr-4">
                                <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                    data-target="#faqcollapseOne{{ $row->id }}" aria-expanded="false"
                                    aria-controls="faqcollapseOne{{ $row->id }}"
                                    class="d-block position-relative collapsible-link py-1"><strong>Q:</strong>
                                    {{ $row->question }}</a></div>
                              </div>
                              <div id="faqcollapseOne{{ $row->id }}"
                                aria-labelledby="faqheadingOne{{ $row->id }}" data-parent="#accordionExample"
                                class="collapse">
                                <div class="card-body pt-3"><strong>Ans:</strong>
                                  {{ $row->answer }}
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @push('breadcrumb_schema')
                  <!-- FAQ SCHEMA START -->
                  <script type="application/ld+json">
                    {
                    "@context": "https:\/\/schema.org",
                    "@type": "FAQPage",
                    "mainEntity": [
                      <?php
                    $i = 1;
                    $tfaq = count($pageDetail->faqs);
                    foreach ($pageDetail->faqs as $faq) {
                    ?> {
                          "@type": "Question",
                          "name": "{{ $faq->question }}",
                          "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "{{ str_replace('/', '\/', str_replace('"', '\"', $faq->answer)) }}"
                          }
                        }
                        <?php if ($i < $tfaq) { ?>, <?php } ?>
                      <?php $i++;
                    } ?>
                    ]
                    }
                  </script>
                  <!-- FAQ SCHEMA END -->
                @endpush
              @endif

              @if ($relatedProducts->count() > 0)
                <hr>
                <div id="Popular-Study-Abroad-Destinations" class="mt-5">
                  <h3>Other Products</h3>

                  <div class="row mt-3 three_slide">
                    @foreach ($relatedProducts as $row)
                      <div class="singles_items">
                        <div class="card shadow-0 mb-0">
                          <img data-src="{{ asset($row->thumbnail_path) }}" class="img-fluid"
                            alt="{{ $row->product_name }}">
                          <div class="card-header bg-light border-0 pl-4 pr-4">
                            <h4 class="text-center" style="font-size:18px; font-weight:600;">
                              {{ $row->product_name }}</h4>
                            <a href="{{ url($row->category->category_slug . '/' . $row->subCategory->sub_category_slug . '/' . $row->product_slug) }}"
                              class="btn btn_apply w-100">View Details</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4">

          @if ($relatedProducts->count() > 0)
            <div class="single_widgets widget_category">
              <h5 class="title">Other Products</h5>
              <ul>
                @foreach ($relatedProducts as $row)
                  <li>
                    <a
                      href="{{ url($row->category->category_slug . '/' . $row->subCategory->sub_category_slug . '/' . $row->product_slug) }}">
                      {{ $row->product_name }}<span><i class="ti-arrow-right"></i></span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (session()->has('smsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span id="smsg">{{ session()->get('smsg') }}</span>
            </div>
          @endif
          @if (session()->has('emsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span id="emsg">{{ session()->get('emsg') }}</span>
            </div>
          @endif

          {{-- @include('front.forms.sidebar-form') --}}
        </div>

      </div>

    </div>
  </section>
  <!-- Content -->
  <script>
    $('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
          location.hostname == this.hostname
        ) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top - 80
            }, 500, function() {});
          }
        }
      });
  </script>
@endsection
