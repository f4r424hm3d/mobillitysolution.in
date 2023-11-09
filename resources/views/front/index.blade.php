@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main class="woocomerce__main">

    <!-- Slider -->
    <div class="woocomerce__hero"> <img class="woocomerce__hero-circle"
        src="{{ url('web/') }}/assets/imgs/icon/circle-1.png" alt="">
      <span class="woocomerce__hero-line line1"></span><span class="woocomerce__hero-line line2"></span> <span
        class="woocomerce__hero-line line3"></span> <span class="woocomerce__hero-line line4"></span>
      <div class="swiper woocomerce-active">
        <div class="swiper-wrapper">

          @foreach ($banners as $row)
            <div class="swiper-slide">
              <div class="woocomerce__hero-item" style="background-image: url({{ asset($row->banner_path) }});"> <span
                  class="woocomerce__hero-rectangle"></span>
                <div class="woocomerce__hero-content">
                  <h1 class="woocomerce__hero-htitle">{{ $row->heading }}</h1>
                  <span class="woocomerce__hero-subtitle">{{ $row->shortnote }}</span>
                </div>
              </div>
            </div>
          @endforeach

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="woocomerce__hero-prev"><img src="{{ url('web/') }}/assets/imgs/icon/hero-prev.png" alt="">
        </div>
        <div class="woocomerce__hero-next"><img src="{{ url('web/') }}/assets/imgs/icon/hero-right.png" alt="">
        </div>
      </div>
    </div>
    <!-- /Slider -->

  </main>

  <!-- About area start -->
  <section class="about__area-7 pt-100 pb-100">
    <div class="container">

      <div class="row">
        <div class="col-xxl-12">
          <div class="sec-title-wrapper">
            <h2 class="sec-title">About Mobility Solution<br>Artificial Limbs Center Gurgaon</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="about__left-7"><img src="{{ url('web/') }}/assets/imgs/home-7/a1.jpg" alt="Image"
              data-speed="auto">
          </div>
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
          <div class="about__mid-7 ">
            <p class="text-justify">The motto of <strong>Mobility Solution</strong> is to embrace a special
              approach for our patients and seeking “solicitous” for our partnering clinics and hospitals. We make
              you embark on our journey for a better rehabilitation experience.</p>
            <p class="text-justify">We keep on discovering different and better ways for the innovative services to
              all the patients, partnering clinics, and hospitals.</p>
            <p class="text-justify">Most probably, we give more importance to our patient’s care rather than
              anything else and this is why we keep on exploring new products and technologies.</p>
            <img src="{{ url('web/') }}/assets/imgs/home-7/a2.jpg" alt="Image" class="image-1">
          </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
          <div class="about__right-7"><img src="{{ url('web/') }}/assets/imgs/home-7/a3.jpg" alt="Image"
              data-speed="0.7">
          </div>
        </div>
      </div>
    </div>
    <img src="{{ url('web/') }}/assets/imgs/home-7/shape-4.png" alt="Shape" class="shape-1">
  </section>
  <!-- About area end -->

  <!-- Service area start -->
  <section class="workflow__area-4 pt-100 pb-100">
    <div class="container">

      <div class="row animation_workflow_6">
        <div class="col-xxl-12">
          <div class="title-wrapper-6">
            <h2 class="sec-subtile-6">Our Services</h2>
            <h3 class="sec-title-6">Welcome to Orthotics & Prosthetics Mobility Solution</h3>
            <p>Most Advanced Treatment options for Artificial Limbs Prosthetics and Orthotic from World Class
              Hospitals in India</p>
          </div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="workflow__item-4">
            <img src="{{ url('web/') }}/assets/imgs/m.png" alt="Work Image">
            <h4 class="workflow__title-4">Personalized Mobility Solution</h4>
            <p class="text-justify">Our personalized prosthetics creates trust and prosperity by enhancing the
              quality of life with improved function and appearance of our patients. It is high-quality prosthetic
              care designed specially to comfort every patient’s need and it is long-lived. We built a healthy
              relationship with our patients and update them with the latest advancement technics.</p>
          </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="workflow__item-4">
            <img src="{{ url('web/') }}/assets/imgs/d.png" alt="Work Image">
            <h4 class="workflow__title-4">Dedicated Professionals</h4>
            <p class="text-justify">Our dedicated Anaplastology professionals work for the restoration of the
              malformed parts of the body including somatic prosthetics through artificial or prosthetics. We also
              have specialists like plastic surgeons, ENT, oral maxillofacial surgeons, prosthodontists,
              audiologists, and speech therapists. They dedicated professionals work to ensure the restoration of
              routine life activities for our patients. Our prosthetics focus on the somatic prosthesis along with
              facial prosthesis.</p>
          </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="workflow__item-4">
            <img src="{{ url('web/') }}/assets/imgs/c.png" alt="Work Image">
            <h4 class="workflow__title-4">Comfortable Clinic</h4>
            <p class="text-justify">We give the utmost care to our patients in the clinic. We have separate teams
              to ensure each process like taking the measurement, casting, counseling the patients, etc., done in a
              well-organized way. We also offer affordable prosthetics and orthotics as per the economic need of the
              patients. We have many training centers and trained professionals to look after the patients at each
              procedure right from taking measurements until they made comfortable with the orthotics or prosthetic
              device. We benefit them through an individualized approach.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Service area end -->

  <!-- Products area start -->
  <section class="portfolio__area-2">
    <div class="container g-0 pt-100 pb-5">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="sec-title-wrapper text-start">
            <p>HIGH QUALITY, HIGH-PERFORMANCE PRODUCTS… FOR A LIFE WITHOUT LIMITATIONS.</p>
            <h2 class="sec-title">Explore Our Products</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feature__text text-justify">
            <p>Recommended by most of the private hospitals in India. We are specialized in fabricating high-quality
              artificial Limbs.</p>
          </div>
        </div>
      </div>

    </div>

    <div class="swiper portfolio__slider-2">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title"><span>Orthotic</span></h2>
              <p class="text-justify">Orthotics enhances the functions of the affected legs or arms with more
                comfort, excitement, and convenience to lead a normal life as of others.</p>
              <div class="btn-common-wrap"><a href="#" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title"><span>Prosthetic</span></h2>
              <p class="text-justify">Prosthetics comforts the amputees to perform their ambulation like walking,
                running, writing, cooking, etc, and upgrade the patient's standard of living.</p>
              <div class="btn-common-wrap"><a href="#" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title">Foot care &amp; <span>Diabetic Solution</span></h2>
              <p class="text-justify">Foot care solution is given to our patients having deformities in
                toe/feet/ankle and also to the patients who suffer from a developed blister due to diabetes.</p>
              <div class="btn-common-wrap"><a href="#" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title">Orthotic <span>Innovation</span></h2>
              <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
              <div class="btn-common-wrap"><a href="#" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title">Prosthetic <span>Innovation</span></h2>
              <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
              <div class="btn-common-wrap"><a href="#" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title">Pedtiaritic <span>Solution</span></h2>
              <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
              <div class="btn-common-wrap"><a href="#" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

      </div>

      <div class="portfolio__slider-2-pagination--">
        <div class="swiper-pagination circle-pagination right"></div>
      </div>
    </div>
  </section>
  <!-- Products area end -->

  <!-- What Makes Us Different area start -->
  <section class="feature__area-2 pt-100 pb-100">
    <div class="feature__top">
      <div class="container">
        <div class="row pb-5">
          <div class="col-lg-7 col-md-6">
            <div class="sec-title-wrapper">
              <p>Passional, Professional, Qualified</p>
              <h2 class="sec-title">What Makes Us Different</h2>
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <div class="feature__text text-justify">
              <p>We provide more effective products to the patients designed with custom-based technology. We
                maintain a healthy relationship with our customers by-</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="feature__btm">
      <div class="container">
        <div class="row">
          <div class="col-xxl-12">
            <div class="feature__list animation__feature2">
              <div class="feature__item">
                <img src="{{ url('web/') }}/assets/imgs/icon/feature-icon/1.png" alt="Feature Icon">
                <h3 class="feature__title">Patient Education and Orientation</h3>
                <p class="text-justify">Our dedicated professionals guide our patients with a crystalline
                  explanation of their rehabilitation process. We counsel our patients to uplift their confidence
                  and have a positive changeover in their own life. Our Anthropology specialist passionates in
                  dealing with patients' requirements at a high standard. This helps our patients to overcome their
                  disability so quickly with our proper guidance.</p>
              </div>

              <div class="feature__item">
                <img src="{{ url('web/') }}/assets/imgs/icon/feature-icon/2.png" alt="Feature Icon">
                <h3 class="feature__title">Positive Model Rectification</h3>
                <p class="text-justify">We ensure the absolute relief given by our high-quality products. We
                  maintain a two-way relationship with the patients and we help them with advanced technologies. We
                  extend our service for the upliftment of the patients with long-lasting stability of orthotics and
                  prosthetics.</p>
              </div>

              <div class="feature__item">
                <img class="" src="{{ url('web/') }}/assets/imgs/icon/feature-icon/3.png" alt="Feature Icon">
                <h3 class="feature__title">Assurance service/ A well-Guaranteed Products</h3>
                <p class="text-justify">Mobility Solution serves the patients' needs in all aspects of their life.
                  We stand as a helping hand to make them benefitted with their guaranteed products. They maintain
                  their products with warranty and preserve it in a well-organised way. We always ensure our
                  products are high-quality and high-standard along with assurance service.</p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- What Makes Us Different area end -->

  @if ($blogs->count() > 0)
    <!-- Blog area start -->
    <section class="blog__area-3 pt-100 pb-100 blog__animation">
      <div class="container">
        <div class="row pb-5">
          <div class="col-lg-7 col-md-6">
            <div class="sec-title-wrapper">
              <p>Recent Blog</p>
              <h2 class="sec-title">Read Updated Journal</h2>
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <div class="feature__text text-justify">
              <p>Read our blog and try to see everything from every perspective. Our passion lies in making everything
                accessible and aesthetic for everyone.</p>
            </div>
          </div>
        </div>

        <div class="row">
          @foreach ($blogs as $row)
            <div class="col-xxl-6 col-xl-6 col-lg-6">
              <article class="blog__item-3">
                <div class="blog__img-wrapper-3">
                  <div class="img-box">
                    <img class="image-box__item" src="{{ asset($row->thumbnail_path) }}" alt="Blog Thumbnail">
                    <img class="image-box__item" src="{{ asset($row->thumbnail_path) }}" alt="BLog Thumbnail">
                  </div>
                </div>
                <div class="blog__info-3">
                  <h4 class="blog__meta">{{ $row->getCategory->category_name }} .
                    {{ getFormattedDate($row->created_at, 'd M, Y') }}</h4>
                  <h5>
                    <div class="blog__title-3">{{ $row->title }}</div>
                  </h5>
                  <a href="{{ url($row->slug) }}" class="blog__btn">Expolore Now <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
                </div>
              </article>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Blog area end -->
  @endif
@endsection
