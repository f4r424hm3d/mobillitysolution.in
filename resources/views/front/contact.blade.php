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
        <li>Contact Us</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Contact area start -->
  <section class="job__detail-top"><img src="{{ url('web/') }}/assets/imgs/contact.jpg" alt="Image" data-speed="auto"
      data-lag="0">
  </section>
  <section class="contact__area-6 pt-100 pb-100 bg-light">
    <div class="container g-0">

      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="sec-title-wrapper text-start">
            <h2 class="sec-title">Let’s get in touch</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feature__text text-justify">
            <p>Great! We're excited to hear from you and let's start something special togerter. call us for any
              inquery.</p>
          </div>
        </div>
      </div>

      <div class="row contact__btm">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5">
          <div class="contact__info">
            <h3 class="sub-title-anim-top">Don't be afraid man ! <br>say hello</h3>
            <ul>
              <li>Address:<span>Mayfield Garden, B-16 Ground Floor,<br>Sector – 50, Gurgaon, Haryana, India</span>
              </li>
              <li>Contact No: <a href="tel:+919910344331">+(91) 9910344331</a></li>
              <li>Email: <a href="mailto:info@mobillitysolution.in">info@mobillitysolution.in</a></li>
              <li>Website: <a href="http://www:mobillitysolution.in" target="_blank">www.mobillitysolution.in</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7">
          <div class="contact__form">
            <form action="{{ url('inquiry/contact-us') }}" method="post">
              @csrf
              <input type="hidden" name="source" value="contact-us">
              <input type="hidden" name="source_path" value="{{ URL::full() }}">
              <div class="row g-3">
                <div class="col-xxl-6 col-xl-6 col-12">
                  <input type="text" placeholder="Write your name" name="name" id="name"
                    value="{{ old('name') }}">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-xxl-6 col-xl-6 col-12">
                  <input type="email" placeholder="example@gmail.com" name="email" id="email"
                    value="{{ old('email') }}">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row g-3">
                <div class="col-xxl-6 col-xl-6 col-12">
                  <input type="text" placeholder="+66 555 666 888 22" name="mobile" id="mobile"
                    value="{{ old('mobile') }}">
                  @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-xxl-6 col-xl-6 col-12">
                  <input type="text" name="subject" placeholder="Subject *" value="{{ old('subject') }}">
                  @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row g-3">
                <div class="col-12">
                  <textarea name="message" id="message" type="text" placeholder="Enter your message here">{{ old('message') }}</textarea>
                  @error('message')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row g-3">
                <div class="col-12">
                  <div class="btn_wrapper">
                    <button class="wc-btn-primary btn-hover btn-item" type="submit"><span></span> Send <br>Messages <i
                        class="fa-solid fa-arrow-right"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14035.255476763108!2d77.0565469!3d28.4248727!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19c60334460d%3A0x87a3453b04c77050!2sMobility%20Solution%20Artificial%20Limb%20Centre!5e0!3m2!1sen!2sin!4v1698756542242!5m2!1sen!2sin"
        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
  </section>
  <!-- Contact area end -->
@endsection
