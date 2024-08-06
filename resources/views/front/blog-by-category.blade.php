@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
  <!-- Top header-->
  <!-- Breadcrumb -->
  <div class="image-cover ed_detail_head lg" style="background:url({{ url('/front/') }}/assets/img/ub.jpg);"
    data-overlay="8">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1">All Articles</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">All Articles</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->
  <!-- Content -->
  <section>
    <div class="container">
      <div class="row">
        @foreach ($blogs as $row)
          <div class="col-md-4">
            <div class="singles_items p-0">
              <div class="education_block_grid style_2">
                <div class="education_block_thumb n-shadow">
                  <a href="{{ url($row->slug) }}">
                    <img data-src="{{ asset($row->thumbnail_path) }}" class="img-fluid" alt="{{ $row->title }}">
                  </a>
                  <div class="cources_price">{{ $row->getCategory->category_name }}</div>
                </div>
                <div class="education_block_body">
                  <h4 class="bl-title">
                    <a href="{{ url($row->slug) }}">{{ $row->title }}</a>
                  </h4>
                </div>
                <div class="cources_info_style3">
                  <ul>
                    <li><i class="ti-calendar mr-2"></i>24 Aug 22</li>
                    {{-- <li><i class="ti-eye mr-2"></i>55 Views</li>
                <li><i class="ti-star text-warning mr-2"></i>4.7 Rating</li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
      {!! $blogs->links('pagination::bootstrap-4') !!}
    </div>
  </section>
  <!-- Content -->
@endsection
