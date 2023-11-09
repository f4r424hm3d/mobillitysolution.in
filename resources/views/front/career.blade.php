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
        <li>Career</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Career area start -->
  <section class="career__top pt-100 pb-100 bg-light">
    <div class="career__top-title">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="sec-title-wrapper">
              <h2 class="sec-title">Join our team & let’s work together</h2>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="btn_wrapper"><a href="#job_list" class="wc-btn-secondary btn-hover btn-item"><span></span>
                Explore job<br>vacancies <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="career__gallery">
    <div class="container g-0 pt-100 pb-100">
      <div class="row">
        <div class="col-xxl-12">
          <ul>
            <li>Future</li>
            <li>Community</li>
            <li>Honor</li>
          </ul>
          <p>What sets us apart is what brings us together – a shared passion for solving business challenges
            through strategy, design, and engineering. We are the sum total of our team, their unique perspectives,
            capabilities, and our ability to collaborate from ideation to deployment.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
          <div class="story__img-wrapper"><img src="{{ url('web/') }}/assets/imgs/about/1.jpg" alt="Story Thumbnail"
              class="w-100">
          </div>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
          <div class="story__img-wrapper img-anim"><img src="{{ url('web/') }}/assets/imgs/about/2.jpg"
              alt="Story Thumbnail" data-speed="auto"></div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="story__img-wrapper">
            <img src="{{ url('web/') }}/assets/imgs/about/3.jpg" alt="Story Thumbnail">
            <img src="{{ url('web/') }}/assets/imgs/about/4.jpg" alt="Story Thumbnail">
          </div>
        </div>
      </div>

    </div>
  </section>

  @if ($jobs->count() > 0)
    <section class="job__area pt-100 pb-100" id="job_list">
      <div class="container">
        <div class="row">
          <div class="col-xxl-12">
            <div class="sec-title-wrapper">
              <h2 class="sec-title">We’re Currently <br>hiring</h2>
            </div>
          </div>
          <div class="col-xxl-12">
            <div class="job__list">
              @php
                $i = 1;
              @endphp
              @foreach ($jobs as $row)
                <a href="{{ url($row->slug) }}">
                  <div class="job__item">
                    <p class="job__no">{{ $i }}</p>
                    <h3 class="job__title">{{ $row->designation }}</h3>
                    <h4 class="job__open">({{ $row->no_of_position }} Open Roles)</h4>
                    <div class="job__link"><span><i class="fa-solid fa-arrow-right"></i></span></div>
                  </div>
                </a>
                @php
                  $i++;
                @endphp
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

  <section class="career__benefits">
    <div class="container g-0 pt-100">

      <div class="row">
        <div class="col-lg-7">
          <ul class="career__benefits-list">
            <li>Vacation & Paid <br>Time Off</li>
            <li>Work-life <br> Integration</li>
            <li>Maternity/Paternity <br>Benefits</li>
            <li>Personal <br> Career Growth</li>
            <li>Learning & <br>Development</li>
            <li>Healthy <br> Food & Snacks</li>
          </ul>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-5">
          <div class="sec-title-wrapper">
            <h2 class="sec-title">Global Perks & Benefits</h2>
            <p>We want you to love working here as much as we do. To inspire our team to be creative, productive,
              and most importantly – feel valued as employees, we offer endless perks and de-stressors. How fun it
              is to unwind while at work!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Career area end -->
@endsection
