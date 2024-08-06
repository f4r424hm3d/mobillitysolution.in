@extends('old.layouts.main')
@push('seo_meta_tag')
  @include('old.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Start Bredcrumb Area -->
  <section class="breadcumb-area pt-70 pb-70"
    style="background-image: url('{{ url('web/') }}/assets/img/breadcrumb.png')">
    <div class="container">
      <h2>Team</h2>
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Team</li>
      </ul>
    </div>
  </section>
  <!-- End Bredcrumb Area -->

  Your code place here
@endsection
