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
        <li>Enquiry Now</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Career detail area start -->
  <section class="job__detail-top"><img src="{{ url('web/') }}/assets/imgs/enquiry.jpg" alt="Image" data-speed="auto">
  </section>

  <section class="bg-light pt-100 pb-100" id="apply-position">
    <div class="container">
      <div class="mb-4">
        <h2 class="sec-title">Enquiry Now</h2>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Your Name</label>
            <input name="name" type="text" class="form-control" placeholder="Enter your name" value=""
              required="">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Company Name</label>
            <input name="mobile" type="number" class="form-control" placeholder="Enter your compmany name"
              value="" required="">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Your Email</label>
            <input name="email" type="email" class="form-control" placeholder="Enter Email Address" value=""
              required="">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Your Mobile No.</label>
            <input name="mobile" type="number" class="form-control" placeholder="Phone No." value=""
              required="">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Solutions</label>
            <select name="experience" class="form-control form-select">
              <option value="">Select</option>
              <option value="1-2 year">Prosthetic</option>
              <option value="2-3 year">Orthetics</option>
              <option value="3-4 year">Rehab</option>
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Solution Sub Category</label>
            <select name="experience" class="form-control form-select">
              <option value="">Select</option>
              <option value="1-2 year">Sub Category 1</option>
              <option value="2-3 year">Sub Category 2</option>
              <option value="3-4 year">Sub Category 3</option>
            </select>
          </div>
        </div>

        <div class="col-12 col-md-12">
          <div class="form-group">
            <label class="pb-1">Your Message</label>
            <textarea name="msg" type="text" class="form-control" placeholder="Enter your message here"></textarea>
          </div>
        </div>

        <div class="job__apply btn_wrapper">
          <button class="wc-btn-primary btn-hover btn-item"><span></span> Submit <br>Now <i
              class="fa-solid fa-arrow-right"></i></button>
        </div>

      </div>

    </div>
  </section>
@endsection
