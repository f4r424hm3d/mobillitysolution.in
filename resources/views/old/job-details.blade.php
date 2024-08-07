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
        <li><a href="{{ url('old/career') }}">Career <i class="fa-solid fa-chevron-right"></i></a></li>
        <li>{{ $row->designation }}</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb area end -->

  <!-- Career detail area start -->
  <section class="job__detail-top"><img src="{{ url('web/') }}/assets/imgs/career.jpg" alt="Image" data-speed="auto">
  </section>

  <section class="job__detail">
    <div class="container g-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="job__detail-wrapper">
            <h2 class="sec-title">{{ $row->designation }}</h2>
            <ul class="job__detail-meta">
              <li><span>Location</span> {{ $row->location }}</li>
              <li><span>Last Date</span> {{ getFormattedDate($row->last_date, 'd M, Y') }}</li>
              <li><span>Job Type</span> {{ $row->job_type }}</li>
              <li><span>No. of Position</span> {{ $row->no_of_position }}</li>
              <li><span>Experience</span> {{ $row->experience }}</li>
            </ul>
            <div class="job__detail-content">
              {!! $row->description !!}
            </div>
            <div class="job__apply btn_wrapper">
              <a class="wc-btn-primary btn-hover btn-item" href="#apply-position"><span></span> Apply this
                <br>Position <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light pt-100 pb-100" id="apply-position">
    <div class="container">
      <div class="mb-4">
        <h2 class="sec-title">Join our team & let’s work together</h2>
      </div>
      <form action="{{ url('apply-job') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Your Name</label>
              <input type="text" class="form-control" placeholder="Write your name" name="name" id="name"
                value="{{ old('name') }}">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Your Email</label>
              <input type="email" class="form-control" placeholder="example@gmail.com" name="email" id="email"
                value="{{ old('email') }}">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Your Mobile No.</label>
              <input type="text" class="form-control" placeholder="+66 555 666 888 22" name="mobile" id="mobile"
                value="{{ old('mobile') }}">
              @error('mobile')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Experience</label>
              <select name="experience" class="form-control form-select">
                <option value="">Select your experience</option>
                <option value="Less than 1 year">Less than 1 year</option>
                <option value="1-2 year">1-2 year</option>
                <option value="2-3 year">2-3 year</option>
                <option value="3-4 year">3-4 year</option>
                <option value="More than 5">More than 5</option>
              </select>
              @error('experience')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Select Position</label>
              <select name="position" id="position" class="form-control form-select">
                <option value="">Select</option>
                @foreach ($jobs as $row)
                  <option value="{{ $row->id }}">{{ $row->designation }}</option>
                @endforeach
              </select>
              @error('position')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Upload your CV/Resume</label>
              <input name="resume" type="file" class="form-control" placeholder="Upload you file max 1MB">
              @error('resume')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-12 col-md-12">
            <div class="form-group">
              <label class="pb-1">Your Message</label>
              <textarea name="message" id="message" type="text" class="form-control" placeholder="Enter your message here"></textarea>
              @error('message')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="job__apply btn_wrapper">
            <button class="wc-btn-primary btn-hover btn-item" type="submit"><span></span> Send <br>Now <i
                class="fa-solid fa-arrow-right"></i></button>
          </div>

        </div>
      </form>
    </div>
  </section>
  <!-- Career detail area end -->
@endsection
