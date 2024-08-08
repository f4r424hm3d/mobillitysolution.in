@extends('old.layouts.main')
@push('seo_meta_tag')
  @include('old.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb area start -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('old') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>Privacy Policy</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Privacy Policy area start -->
  <section class="job__detail-top"><img src="{{ url('web/') }}/assets/imgs/privacy-policy.jpg" alt="Image"
      data-speed="auto">
  </section>

  <section class="bg-light pt-100 pb-100" id="apply-position">
    <div class="container">
      <div class="mb-4">
        <h2 class="sec-title">Privacy Policy</h2>
      </div>
      <div class="job__detail-content">
        <h2>What information do we collect?</h2>
        <p>We collect information such as your name, organization name, email address, telephone numbers, mobile
          number, fax number, physical address, postal address, IP address and other contact or project related
          information for internal use only.</p>

        <h2>How information is collected?</h2>
        <p>The information may be collected via our website by any technology used on our website for example the
          contact us form or a Quote request form. We may also collect personal information via telephone, letter,
          promotional materials or at any function or event when meeting with a Mobility Solution Bots Intelligence
          representative.</p>

        <h2>Why collect information?</h2>
        <p>Our primary goal in collecting your personal information is to provide you with a professional,
          efficient and personalized service.</p>

        <h2>Using personal information:</h2>
        <p>We may use your personal information to communicate with you via emails, telephone, newsletters, and
          direct mails. We may also use it to provide important updates, for invitations or for any other
          administrative purpose.</p>

        <h2>Sharing your information:</h2>
        <p>We may share your personal information on a need-to-know basis within our company. We may also share
          your information with our sub-contractors or our suppliers with whom we have signed a confidentiality
          agreement. We will not sell, lease or distribute your personal information to any third-party
          organization without prior consent. We reserve the right to reveal your information in extreme or
          out-of-ordinary circumstances or for health or safety reasons or as required by the legal authorities.
        </p>

        <h2>Some Points Show Here</h2>
        <ul>
          <li>Support Growth team in expanding customer base within legal</li>
          <li>Find prospective customer leads via LinkedIn Sales Navigator, industry directories network and other
          </li>
          <li>Qualify prospective customer leads via email, phone, and Linkedin messaging</li>
          <li>Track and analyze prospective customer pipeline, presenting stats and progress to Growth team</li>
        </ul>

      </div>
    </div>
  </section>
@endsection
