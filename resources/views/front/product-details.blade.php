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
        <li><a href="prosthetics.html">Prosthetic <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="prosthetic-lower-limb.html">Lower Limb Prosthetics <i class="fa-solid fa-chevron-right"></i></a>
        </li>
        <li>Product Detail Page</li>
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
            <img src="{{ url('web/') }}/assets/imgs/products/prosthetics/lower-limb-rosthetics/1.webp" alt="single-1"
              class="img-fluid">
          </div>
        </div>

        <div class="col-lg-6 pl-50 product-details">
          <div class="woocomerce__single-right wc_slide_btm">
            <div class="woocomerce__single-content">
              <h2 class="woocomerce__single-title">Bebionic Hand</h2>

              <div class="show-more-box">
                <div class="text show-more-height">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining essentially unchanged. It was
                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of
                    Lorem Ipsum.</p>

                  <ul>
                    <li>Cruelty free</li>
                    <li>Adjustable drawstrings at the hood</li>
                    <li>Eyelet embroidery</li>
                    <li>Cruelty free</li>
                    <li>Welt pockets at waist</li>
                  </ul>

                  <table>
                    <tbody>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>simply dummy text</td>
                      </tr>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>simply dummy text</td>
                      </tr>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>simply dummy text</td>
                      </tr>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>simply dummy text</td>
                      </tr>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>simply dummy text</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="show-more">Show Less</div>
              </div>

              <ul>
                <li>Cruelty free</li>
                <li>Adjustable drawstrings at the hood</li>
                <li>Eyelet embroidery</li>
                <li>Cruelty free</li>
                <li>Welt pockets at waist</li>
              </ul>

              <a href="{{ url('enquiry') }}" class="blog__btn">Enquiry Now <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>

              <div class="woocomerce__single-varitions">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                      <div class="accordion-button collapsed bg-light" role="contentinfo" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <div class="woocomerce__single-stitle">Accordian - 1</div>
                      </div>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                          has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                          took a galley of type and scrambled it to make a type specimen book. It has survived not
                          only five centuries, but also the leap into electronic typesetting, remaining essentially
                          unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                          Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                          PageMaker including versions of Lorem Ipsum.</p>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <div class="accordion-header" id="headingTwo">
                      <div class="accordion-button collapsed bg-light" role="contentinfo" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="woocomerce__single-stitle">Accordian - 2</div>
                      </div>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <table>
                          <tbody>
                            <tr>
                              <td>Lorem Ipsum</td>
                              <td>simply dummy text</td>
                            </tr>
                            <tr>
                              <td>Lorem Ipsum</td>
                              <td>simply dummy text</td>
                            </tr>
                            <tr>
                              <td>Lorem Ipsum</td>
                              <td>simply dummy text</td>
                            </tr>
                            <tr>
                              <td>Lorem Ipsum</td>
                              <td>simply dummy text</td>
                            </tr>
                            <tr>
                              <td>Lorem Ipsum</td>
                              <td>simply dummy text</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
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

  <!-- Related Product start -->
  <section class="portfolio__area-5">
    <div class="container-fluid pt-100 pb-100">
      <div class="row pb-5">
        <div class="col-lg-12">
          <div class="sec-title-wrapper">
            <h3 class="sec-title">Related Products - 1</h3>
          </div>
          <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
            has been the industry's standard dummy text.</p>
        </div>
      </div>

      <div class="row">
        <div class="portfolio__inner-5">

          <div class="portfolio__item-5">
            <img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image">
            <div class="portfolio__content-5">
              <h2 class="portfolio__name-5">Hand prosthetics</h2>
              <h3 class="portfolio__title-5 mb-2">Bebionic Hand</h3>
              <a href="product-details.html" class="blog__btn">View Product Details <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
            </a>
          </div>

          <div class="portfolio__item-5">
            <img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Image">
            <div class="portfolio__content-5">
              <h2 class="portfolio__name-5">Hand prosthetics</h2>
              <h3 class="portfolio__title-5 mb-2">Bebionic Hand</h3>
              <a href="product-details.html" class="blog__btn">View Product Details <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
            </a>
          </div>

          <div class="portfolio__item-5">
            <img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image">
            <div class="portfolio__content-5">
              <h2 class="portfolio__name-5">Hand prosthetics</h2>
              <h3 class="portfolio__title-5 mb-2">Bebionic Hand</h3>
              <a href="product-details.html" class="blog__btn">View Product Details <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
            </a>
          </div>

          <div class="portfolio__item-5">
            <img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Image">
            <div class="portfolio__content-5">
              <h2 class="portfolio__name-5">Hand prosthetics</h2>
              <h3 class="portfolio__title-5 mb-2">Bebionic Hand</h3>
              <a href="product-details.html" class="blog__btn">View Product Details <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
            </a>
          </div>

          <div class="portfolio__item-5">
            <img src="{{ url('web/') }}/assets/imgs/products/home/1.jpg" alt="Image">
            <div class="portfolio__content-5">
              <h2 class="portfolio__name-5">Hand prosthetics</h2>
              <h3 class="portfolio__title-5 mb-2">Bebionic Hand</h3>
              <a href="product-details.html" class="blog__btn">View Product Details <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
            </a>
          </div>

          <div class="portfolio__item-5">
            <img src="{{ url('web/') }}/assets/imgs/products/home/2.jpg" alt="Image">
            <div class="portfolio__content-5">
              <h2 class="portfolio__name-5">Hand prosthetics</h2>
              <h3 class="portfolio__title-5 mb-2">Bebionic Hand</h3>
              <a href="product-details.html" class="blog__btn">View Product Details <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>
            </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Related Product end -->

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
                    <div class="accordion-body">
                      <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                    <div class="accordion-body">
                      <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                    <div class="accordion-body">
                      <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                    <div class="accordion-body">
                      <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
                    <div class="accordion-body">
                      <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
