<div class="image-cover ed_detail_head lg" style="background:url({{ asset($university->banner_path) }});" data-overlay="8">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-2 col-md-2 col-6">
        <img data-src="{{ asset($university->logo_path) }}" class="w-100 circle" alt="{{ $university->name }}">
      </div>

      <div class="col-lg-10 col-md-10">
        <div class="ed_detail_wrap light">
          <ul class="cources_facts_list">
            <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
            <li class="facts-1"><a
                href="{{ url($university->getDestination->destination_slug) }}">{{ $university->getDestination->destination_name }}</a>
            </li>
            <li class="facts-1"><a href="{{ url($university->slug) }}">{{ $university->name }}</a></li>
            @if (Request::segment(2) == 'course')
              <li class="facts-1"><a href="{{ url($university->slug . '/courses') }}">Courses</a></li>
            @endif
            {!! $breadcrumbCurrent ?? '' !!}
          </ul>
          <div class="ed_header_caption">
            <h1 class="ed_title">
              {{ $university->name }} Rankings, Courses, Fees, Admission {{ date('Y') }} & Scholarships
            </h1>
            <ul>
              <li><i class="ti-location-pin"></i><span>Location:</span> {{ $university->city }},
                {{ $university->state }}</li>
              <li><i class="fa fa-graduation-cap"></i><span>Type:</span> {{ $university->getInstType->type ?? 'N/A' }}
              </li>
              <li><i class="ti-user"></i><span>Courses:</span> 50</li>
              <li><i class="fa fa-building"></i><span>Founded:</span> {{ $university->founded }}</li>
              <li><i class="fa fa-globe"></i><span>University Rank:</span> {{ $university->university_rank }}</li>
            </ul>
          </div>

          <div class="head-btns">
            <a href="{{ url('/sign-up/?return_to=') }}" class="btn btn-white-t-theme btn-50L"><i
                class="ti-download mr-1"></i> Download Brochure</a>
            <a href="{{ url('enquiry') }}" class="btn btn-white-t-theme btn-50R"><i class="ti-user mr-1"></i> Get
              Counselling</a>
            <a href="{{ url($university->slug . '/write-a-review') }}" class="btn btn-white-t-theme"><i
                class="ti-pencil-alt mr-1"></i> Write a review</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
