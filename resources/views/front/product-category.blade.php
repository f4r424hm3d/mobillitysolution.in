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
        "name": "{{ $categoryDetail->category_name }}",
        "item": "{{ url($categoryDetail->category_slug) }}"
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
      "name": "{{ $categoryDetail->category_name }}",
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
                  href="{{ url($categoryDetail->category_slug) }}">{{ $categoryDetail->category_name }}</a>
              </li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">{{ $categoryDetail->category_name }}</h1>
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
              <h2>{{ $categoryDetail->category_name }}</h2>
            </div>

            {{-- <div class="row align-items-center mb-3">
              @if ($categoryDetail->author_id != null)
                <div class="col-8">
                  <div class="new-author">
                    <div class="img-div">
                      <img data-src="{{ userIcon($categoryDetail->getUser->profile_picture ?? null) }}"
                        alt="{{ $categoryDetail->getUser->name }}"><i class="fa fa-check-circle"></i>
                    </div>
                    <div class="cont-div">
                      <a href="{{ url('author/' . $categoryDetail->getUser->id . '-' . $categoryDetail->getUser->slug) }}">{{ $categoryDetail->getUser->name }}
                      </a><span>
                        Updated on -
                        {{ getFormattedDate($categoryDetail->updated_at, 'M d, Y') }}</span>
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

            @if ($categoryDetail->thumbnail_path != null)
              <img data-src="{{ asset($categoryDetail->thumbnail_path) }}" alt="{{ $categoryDetail->category_name }}">
            @endif

            <div class="edu_wraper">

              {!! $categoryDetail->description !!}

              <a href="{{ url('enquiry') }}" class="big-center-btn btn-theme text-white rounded">
                Enquiry Now</a>

              @if ($categoryDetail->faqs->count() > 0)
                <div id="Frequently-Asked-Questions" class="mt-3 card shadow-0 bg-light pt-4 pb-4 pr-4 pl-4">
                  <h3>Frequently Asked Questions</h3>
                  <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                      <div class="container">
                        <div id="accordionExample" class="accordion circullum">
                          @foreach ($categoryDetail->faqs as $row)
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
                    $tfaq = count($categoryDetail->faqs);
                    foreach ($categoryDetail->faqs as $faq) {
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

              @if ($categoryDetail->getAllSubCategory->count() > 0)
                <hr>
                <div id="Popular-Study-Abroad-Destinations" class="mt-5">
                  <h3>Sub Categories</h3>

                  <div class="row mt-3 three_slide">
                    @foreach ($categoryDetail->getAllSubCategory as $row)
                      <div class="singles_items">
                        <div class="card shadow-0 mb-0">
                          <img data-src="{{ asset($row->thumbnail_path) }}" class="img-fluid"
                            alt="{{ $row->sub_category_name }}">
                          <div class="card-header bg-light border-0 pl-4 pr-4">
                            <h4 class="text-center" style="font-size:18px; font-weight:600;">
                              {{ $row->sub_category_name }}</h4>
                            <a href="{{ url($categoryDetail->category_slug . '/' . $row->sub_category_slug) }}"
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

          @if ($categoryDetail->getAllSubCategory->count() > 0)
            <div class="single_widgets widget_category">
              <h5 class="title">Sub Categories</h5>
              <ul>
                @foreach ($categoryDetail->getAllSubCategory as $row)
                  <li>
                    <a href="{{ url($categoryDetail->category_slug . '/' . $row->sub_category_slug) }}">
                      {{ $row->sub_category_name }}<span><i class="ti-arrow-right"></i></span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif

          @if ($otherCategories->count() > 0)
            <div class="single_widgets widget_category">
              <h5 class="title">Other Categories</h5>
              <ul>
                @foreach ($otherCategories as $row)
                  <li id="contact">
                    <a href="{{ url($row->category_slug) }}">
                      {{ $row->category_name }}<span><i class="ti-arrow-right"></i></span>
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
