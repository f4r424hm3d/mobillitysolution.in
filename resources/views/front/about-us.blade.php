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
            <h1 class="hero-title">Mobility Solution - Artificial Limb Centre in Gurgaon India</h1>
            <div class="hero__about-info">
              <div class="hero__about-btn">
                <div class="btn_wrapper">
                  <a href="{{ url('contact-us') }}" class="wc-btn-primary btn-hover btn-item"><span></span> Let's Talk
                    Us<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
              <div class="hero__about-text">
                <p class="text-justify">Mobility Solution is a company that specializes in creating and providing the latest modular systems for artificial limbs, orthopedic appliances, and orthotic braces. As a family-owned business, our main objective is to offer a wide range of reliable and high-quality prosthetic and orthotic services that are both comfortable and affordable for people of all ages with disabilities. Our team consists of highly skilled Prosthetists and Orthotists who have more than 10 years of experience in this field.</p>
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
            <h3 class="sec-title">Our story</h3>
          </div>
          <div class="col-lg-9 col-md-9">
            <div class="story__text">
              <p class="text-justify">Based in Gurugram, a vibrant city in North India, Mobility Solutions is dedicated to providing expert care, personalized attention, and innovative mobility solutions to individuals who face musculoskeletal challenges. We understand the diverse needs of our clients and offer a range of specialized services tailored to meet those needs. Our team of experienced orthotists and prosthetic specialists is committed to enhancing mobility, comfort, and quality of life for every individual we serve.
              </p>
              <p class="text-justify">With a focus on personalized care and the use of cutting-edge technology, we provide customized orthotic solutions to support various conditions, injuries, or disabilities. Our services include braces, support devices, prosthetic limbs, and wheelchairs, all designed to empower individuals to regain their independence and confidence in their daily lives. Additionally, we also offer silicone gel-based products for skincare and wound care needs, crafted to promote healing, protect sensitive skin, and improve overall skin health. At Mobility Solutions Gurugram, we are dedicated to delivering compassionate care, reliable solutions, and personalized service to meet the unique needs of each individual. Contact us today to experience the difference and take the first step towards improved mobility and quality of life.</p>
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
      <div class="sec-title-wrapper">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <h3 class="sec-title">Our Mission</h3>
          </div>
          <div class="col-lg-9 col-md-9">
            <div class="story__text">
              <p class="text-justify">We aim to help people overcome mobility challenges and enjoy life to the fullest. Our focus is on providing top-notch care, tailored support, and creative solutions to assist our clients in enhancing their mobility and independence.
              </p>
            </div>
          </div>

        </div>
      </div>
      <div class="sec-title-wrapper">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <h3 class="sec-title">Our Commitment</h3>
          </div>
          <div class="col-lg-9 col-md-9">
            <div class="story__text">
              <p class="text-justify">At Mobility Solutions Gurugram, our dedication to excellence is evident in all our endeavors. Whether you require orthotic support, prosthetic solutions, bracing and support devices, wheelchair services, or silicone gel products, you can rely on us to provide compassionate care, individualized attention, and creative solutions that improve your mobility and overall well-being.
              </p>
                 <p class="text-justify">Experience the difference at Mobility Solutions Gurugram. Contact us today to schedule a consultation and take the first step towards improved mobility, comfort, and independence
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Story area end -->

  <!-- Counter area start -->
  <section class="counter__area">
    <div class="container g-0 pb-100 pt-42">

      <div class="row">
        <div class="col-lg-12">
          <div class="counter__wrapper-2 counter_animation">
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">5k</h2>
              <p>Project <br>completed</p>
              <span class="counter__border"></span>
            </div>
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">2k</h2>
              <p>Happy <br>customers</p>
              <span class="counter__border"></span>
            </div>
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">10</h2>
              <p>Years <br>experiences</p>
              <span class="counter__border"></span>
            </div>
            <div class="counter__item-2 counter__anim">
              <h2 class="counter__number">2</h2>
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
