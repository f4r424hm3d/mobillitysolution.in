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
  <section class="about__area-7 pt-50 pb-50">
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
            <p class="text-justify">Welcome to Mobility Solutions Gurugram, the top destination for mobility solutions in Gurugram. Our team of orthotists and prosthetic specialists is dedicated to improving mobility, comfort, and quality of life for those with musculoskeletal challenges. We offer customized orthotic solutions, prosthetic limbs, braces, and support devices to meet various needs. We also provide silicone gel-based products for skin and wound care. Our focus is on personalized care, innovative technology, and compassionate support to help individuals regain independence and confidence. Reach out to us today to see how we can enhance your mobility and quality of life.</p>
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
  </section>
  <!-- About area end -->

  <!-- Service area start -->
  <section class="workflow__area-4 pt-50 pb-50">
    <div class="container">

      <div class="row animation_workflow_6">
        <div class="col-xxl-6">
          <div class="title-wrapper-6">
            <h2 class="sec-subtile-6">Our Services</h2>
            <h3 class="sec-title-6">Welcome to Orthotics & Prosthetics Mobility Solution</h3>
            <p>Most Advanced Treatment options for Artificial Limbs Prosthetics and Orthotic from World Class
              Hospitals in India</p>
          </div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
          <div class="workflow__item-4">
            <img src="{{ url('web/') }}/assets/imgs/m.png" alt="Work Image">
            <h4 class="workflow__title-4">Personalized Mobility Solution</h4>
            <p class="text-justify">Welcome to Orthotics & Prosthetics Mobility Solution, where we offer comprehensive care for orthotic and prosthetic needs. Our services go beyond just providing devices - we prioritize holistic care for our clients. From the initial assessment to fitting, adjustments, rehabilitation, and follow-up care, we are with you every step of the way on your orthotic and prosthetic journey.</p>
          </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
          <div class="workflow__item-4">
            <img src="{{ url('web/') }}/assets/imgs/d.png" alt="Work Image">
            <h4 class="workflow__title-4">Dedicated Professionals</h4>
            <p class="text-justify">We are committed to staying at the forefront of orthotic and prosthetic technology. Our team is constantly seeking innovative solutions to improve outcomes and enhance the quality of life for our clients. Through ongoing education and training, we ensure that we deliver the latest advancements and best practices in the field. You can trust us to provide cutting-edge solutions tailored to your specific needs.</p>
          </div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
          <div class="workflow__item-4">
            <img src="{{ url('web/') }}/assets/imgs/c.png" alt="Work Image">
            <h4 class="workflow__title-4">Comfortable Clinic</h4>
            <p class="text-justify">Our ultimate goal is to empower individuals to live life to the fullest. Whether you are recovering from an injury or adapting to life with a prosthetic limb, we are here to support you. We offer the guidance, resources, and support needed for you to achieve your goals and maintain your independence. At Orthotics & Prosthetics Mobility Solution, we are dedicated to helping you live life fully.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Service area end -->

  <!-- Products area start -->
  <section class="portfolio__area-2">
    <div class="container g-0 pt-50 pb-5">
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
              <h2 class="sec-title"><span>Orthotic Service</span></h2>
              <p class="text-justify">We aim to improve movement, comfort, and overall well-being for people dealing with musculoskeletal issues. We recognize the significance of personalized orthotic solutions in assisting individuals with different conditions, injuries, or disabilities. Our team of orthotics specialists is devoted to delivering top-notch care, individualized support, and cutting-edge orthotic devices designed to address the specific requirements of every client.</p>
              <div class="btn-common-wrap"><a href="https://www.mobilitysolution.in/orthetics" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title"><span>Prosthetic Service</span></h2>
              <p class="text-justify">We assist individuals with missing limbs to regain independence, improve mobility, and restore confidence. Our prosthetic experts offer personalized care, utilize cutting-edge technology, and provide a supportive environment. Our goal is to deliver prosthetic limbs tailored to each individual's specific requirements and aspirations.</p>
              <div class="btn-common-wrap"><a href="https://www.mobilitysolution.in/prosthetics" class="blog__btn">View Details <span><i
                      class="fa-solid fa-arrow-right"></i></span></a></div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="portfolio__slide-2">
            <div class="slide-img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Product Image">
            </div>
            <div class="slide-content">
              <h2 class="sec-title"><span>Bracing and Support Service</span></h2>
              <p class="text-justify"> We focus on creating personalized braces and support devices for different musculoskeletal issues, injuries, and mobility problems. Our team is dedicated to giving individualized care, practical solutions, and caring assistance to improve your quality of life.</p>
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
              <h2 class="sec-title"><span>Wheelchair Services</span></h2>
              <p class="text-justify">We help people with mobility issues live their best lives by giving them access to dependable, cozy, and personalized wheelchairs. Our goal is to provide caring support, individualized assistance, and creative answers to fulfill the various requirements of our customers. Our expertise lies in providing a variety of wheelchair services designed to cater to the distinct needs and choices of every person.</p>
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
              <h2 class="sec-title"><span>Silicone Gel product Service</span></h2>
              <p class="text-justify">We are committed to offering creative and efficient solutions for your skincare and wound care requirements. With a focus on silicone gel-based products, we provide a variety of top-notch items that aim to enhance healing, safeguard delicate skin, and enhance overall skin well-being. Our goal is to enable individuals to attain the best possible skincare results by utilizing advanced silicone gel technology and personalized attention.</p>
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
  <section class="feature__area-2 pt-50 pb-50">
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
                <h3 class="feature__title">Personalized Care for Every Individual</h3>
                <p class="text-justify">At our orthotic center, we strongly believe in providing tailored solutions that cater to the unique needs and lifestyle of each person. Instead of using generic approaches, we take great care in creating orthotic solutions that are specifically designed to fit and function seamlessly with our clients' bodies. This ensures that they experience optimal comfort and effectiveness.</p>
              </div>

              <div class="feature__item">
                <img src="{{ url('web/') }}/assets/imgs/icon/feature-icon/2.png" alt="Feature Icon">
                <h3 class="feature__title">Cutting-Edge Customization and Design</h3>
                <p class="text-justify">What sets us apart is our commitment to using innovative technology and design techniques to create orthotic devices that not only meet functional requirements but also seamlessly blend into our clients' lives. We utilize advanced methods such as 3D scanning and printing, as well as high-quality materials, to push the boundaries of orthotic customization. This results in superior performance and aesthetics.</p>
              </div>

              <div class="feature__item">
                <img class="" src="{{ url('web/') }}/assets/imgs/icon/feature-icon/3.png" alt="Feature Icon">
                <h3 class="feature__title">Comprehensive Support for Overall Well-being</h3>
                <p class="text-justify">Our dedication goes beyond simply providing orthotic devices. We prioritize holistic support for our clients' overall well-being. With a team of experts from various disciplines, we offer comprehensive services that include rehabilitation, lifestyle adjustments, and ongoing care. Our goal is to empower individuals on their journey towards improved mobility and a better quality of life.</p>
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
    <section class="blog__area-3 pt-50 pb-50 blog__animation">
      <div class="container">
        <div class="row pb-5">
          <div class="col-lg-7 col-md-6">
            <div class="sec-title-wrapper">
              <p>Recent Blog</p>
              <h2 class="sec-title">Read Updated News & Articles</h2>
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
