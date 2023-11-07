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
        <li>Prosthetic</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Prosthetic area start -->
  <section class="solution__area pb-100">
    <div class="container hero-line"></div>
    <div class="solution__wrapper">
      <div class="solution__left">
        <div class="solution__img-1"><img src="{{ url('web/') }}/assets/imgs/products/prosthetics/b1.png"
            alt="Image"></div>
      </div>

      <div class="solution__mid">
        <h1 class="solution__title">Prosthetic Solutions</h1>
        <p class="text-justify">The motto of Mobility Solution is to embrace a special approach for our patients
          and seeking “solicitous” for our partnering clinics and hospitals. We make you embark on our journey for a
          better rehabilitation experience.</p>
      </div>

      <div class="solution__right">
        <div class="solution__img-3"><img src="{{ url('web/') }}/assets/imgs/products/prosthetics/b3.png"
            alt="Solution Image">
        </div>
      </div>
    </div>

    <div class="solution__shape">
      <img src="{{ url('web/') }}/assets/imgs/icon/1.png" alt="Shape Image" class="shape-1">
      <img src="{{ url('web/') }}/assets/imgs/icon/2.png" alt="Shape Image" class="shape-2">
      <img src="{{ url('web/') }}/assets/imgs/icon/3.png" alt="Shape Image" class="shape-3">
      <img src="{{ url('web/') }}/assets/imgs/icon/4.png" alt="Shape Image" class="shape-4">
      <img src="{{ url('web/') }}/assets/imgs/icon/5.png" alt="Shape Image" class="shape-5">
    </div>
  </section>
  <!-- Prosthetic area end -->

  <!-- Products area start -->
  <section class="bg-light">
    <div class="container g-0 pt-100 pb-100">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="faq__img"><img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image"
              data-speed="auto">
          </div>
        </div>

        <div class="col-lg-7">
          <h2 class="faq__title mt-3">Lorem Ipsum is simply dummy text</h2>
          <p class="mb-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
            took a galley of type and scrambled it to make a type specimen book. It has survived not only five
            centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
            recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in
            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
            desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="blog__area-6 blog__animation">
    <div class="container g-0 pt-100 pb-100">

      <div class="row pb-5">
        <div class="col-lg-6 col-md-6">
          <div class="sec-title-wrapper text-start">
            <h2 class="sec-title">Types of Prosthetics</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feature__text text-justify">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
              industry's standard dummy text.</p>
          </div>
        </div>
      </div>

      <div class="row reset-grid">

        <div class="col-lg-6">
          <article class="blog__item">
            <div class="blog__img-wrapper">
              <div class="img-box">
                <img class="image-box__item" src="{{ url('web/') }}/assets/imgs/products/prosthetics/lower.jpg"
                  alt="image">
                <img class="image-box__item" src="{{ url('web/') }}/assets/imgs/products/prosthetics/lower.jpg"
                  alt="image">
              </div>
            </div>
            <h5>
              <div class="blog__title">Lower Limb Prosthetics</div>
            </h5>
            <p class="mb-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text.</p>
            <a href="prosthetic-lower-limb.html" class="blog__btn">Explore Now <span><i
                  class="fa-solid fa-arrow-right"></i></span></a>
          </article>
        </div>

        <div class="col-lg-6">
          <article class="blog__item">
            <div class="blog__img-wrapper">
              <div class="img-box">
                <img class="image-box__item" src="{{ url('web/') }}/assets/imgs/products/prosthetics/upper.jpg"
                  alt="image">
                <img class="image-box__item" src="{{ url('web/') }}/assets/imgs/products/prosthetics/upper.jpg"
                  alt="image">
              </div>
            </div>
            <h5>
              <div class="blog__title">Upper Limb Prosthetics</div>
            </h5>
            <p class="mb-3 text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text.</p>
            <a href="prosthetic-lower-limb.html" class="blog__btn">Explore Now <span><i
                  class="fa-solid fa-arrow-right"></i></span></a>
          </article>
        </div>

      </div>
    </div>
  </section>

  <section class="faq__area bg-light">
    <div class="container g-0 pt-100 pb-100">
      <div class="row">

        <div class="col-lg-12">
          <div>
            <h2 class="faq__title">Faqs</h2>

            <div class="faq__list">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
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
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Human
                      centred design to challenges
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
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
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Design
                      should enrich our day</button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
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
                  <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Developing
                      core web applications
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body text-justify">
                      <p>This is the second item's accordion body. It is hidden by default, until the collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control
                        the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Products area end -->
@endsection
