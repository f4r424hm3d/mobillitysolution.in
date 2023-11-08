@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Start Bredcrumb Area -->
  <section class="breadcumb-area pt-70 pb-70"
    style="background-image: url('{{ url('web/') }}/assets/img/breadcrumb.png')">
    <div class="container">
      <h2>Thank You</h2>
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Thank You</li>
      </ul>
    </div>
  </section>
  <!-- End Bredcrumb Area -->

  <!-- Start Area -->
  <section class="otherspage-area pt-60">
    <div class="container">
      <div class="contact-toparea pb-75">
        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-12">
            <center>
              <h1 class="text-success">Thank You for contacting us. We will contact you soon.</h1>
            </center>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- End Otherpage Area -->
@endsection
