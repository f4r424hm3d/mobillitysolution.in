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
        <li><a href="#">About Mobility <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>About Us</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- About area start -->
  <section class="hero__about">
    <div class="container g-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="hero__about-content">
            <h1 class="hero-title">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
            <div class="hero__about-info">
              <div class="hero__about-btn">
                <div class="btn_wrapper">
                  <a href="{{ url('contact-us') }}" class="wc-btn-primary btn-hover btn-item"><span></span> Let's Talk
                    Us<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
              <div class="hero__about-text">
                <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                  only five centuries, but also the leap into electronic typesetting, remaining essentially
                  unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                  Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
                  versions of Lorem Ipsum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row hero__about-row">
        <div class="col-lg-12">
          <div class="hero__about-video"><img src="{{ url('web/') }}/assets/imgs/slider/2.jpg" class="img-fluid"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- About area end -->

  <!-- Story area start -->
  <section class="story__area">
    <div class="container g-0 pt-100">
      <div class="sec-title-wrapper">

        <div class="row">
          <div class="col-lg-3 col-md-3">
            <h2 class="sec-sub-title">Lorem Ipsum</h2>
            <h3 class="sec-title">Our story</h3>
          </div>
          <div class="col-lg-9 col-md-9">
            <div class="story__text">
              <p class="text-justify">Your brand is the most important asset in your company let our team of
                professionals help you
                with a good strategy took the runway next with an edgy collection featuring dyed denim pieces. The
                collection included patchwork denim, a trend that has recently exploded in younger generations.
                Playing on aspects of sustainability, the pieces appeared to be upcycled to establish dimension
                and flair. This take on grunge and streetwear took sustainable fashion to an entirely new level.
              </p>
              <p class="text-justify">ur specialized team of researchers, strategists, designers, developers, and
                project managers work
                with streamlined processes to break through organizational roadblocks. We translate research into
                solutions, crafting thoughtful and unified brands.</p>
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
    </div>
  </section>
  <!-- Story area end -->

  <!-- Counter area start -->
  <section class="counter__area">
    <div class="container g-0 pb-100 pt-100">

      <div class="row">
        <div class="col-lg-12">
          <div class="counter__wrapper-2 counter_animation">
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">25k</h2>
              <p>Project <br>completed</p>
              <span class="counter__border"></span>
            </div>
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">8k</h2>
              <p>Happy <br>customers</p>
              <span class="counter__border"></span>
            </div>
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">15</h2>
              <p>Years <br>experiences</p>
              <span class="counter__border"></span>
            </div>
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">98</h2>
              <p>Awards <br>achievement</p>
              <span class="counter__border"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Counter area end -->

  @if ($team->count() > 0)
    <!-- Team area start -->
    <section class="team__area pt-100 pb-100">
      <div class="sec-title-wrapper">
        <h2 class="sec-sub-title">Our Team</h2>
        <h3 class="sec-title">How we work</h3>
      </div>

      <div class="swiper team__slider">
        <div class="swiper-wrapper">
          @foreach ($team as $row)
            <div class="swiper-slide team__slide">
              <img src="{{ asset($row->photo_path) }}" alt="{{ $row->name }}">
              <div class="team__info">
                <h4 class="team__member-name">{{ $row->name }}</h4>
                <h5 class="team__member-role">{{ $row->designation }}</h5>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Team area end -->
  @endif
@endsection
