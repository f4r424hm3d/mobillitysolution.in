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
        <li>Career</li>
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
            <h2 class="sec-title">UI/UX Designer</h2>
            <ul class="job__detail-meta">
              <li><span>No. of Position</span> Gurgaon</li>
              <li><span>Last Date</span> 15, November 2023</li>
              <li><span>Job Type</span> Full time (Remote)</li>
              <li><span>No. of Position</span> 2</li>
              <li><span>Experience</span> 2+ Year</li>
            </ul>
            <div class="job__detail-content">
              <h2>Roles & Responsibilities:</h2>
              <p>Mandatory Skills: Expertise in Photoshop, Illustrator, or other visual design, HTML, CSS,
                JavaScript, and wire-framing tools.</p>

              <h2>Job Description:</h2>
              <p>Perform all visual design phases from idea to finishing hand-off to engineering Present and
                protect designs & core deliverables to peers and administrative level stakeholders Conceptualize
                original site design concepts that bring ease and user friendliness to difficult roadblocks Make
                user flows, wireframes, process flows, site maps, and storyboards to converse communication and
                design notions</p>
              <p>Set up and endorse design guidelines, standards, and best practices.</p>

              <h2>Some Points Show Here</h2>
              <ul>
                <li>Support Growth team in expanding customer base within legal</li>
                <li>Find prospective customer leads via LinkedIn Sales Navigator, industry directories network and
                  other</li>
                <li>Qualify prospective customer leads via email, phone, and Linkedin messaging</li>
                <li>Track and analyze prospective customer pipeline, presenting stats and progress to Growth team
                </li>
              </ul>

              <h2>Educational Qualification</h2>
              <ul>
                <li>It doesn’t matter where you went to college or what your CGPA was as long as you are smart,
                  passionate, ready to work hard and have fun.</li>
              </ul>

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
            <label class="pb-1">Experience</label>
            <select name="experience" class="form-control form-select">
              <option value="">Select your experience</option>
              <option value="Less than 1 year">Less than 1 year</option>
              <option value="1-2 year">1-2 year</option>
              <option value="2-3 year">2-3 year</option>
              <option value="3-4 year">3-4 year</option>
              <option value="More than 5">More than 5</option>
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Apply for position</label>
            <select name="position" class="form-control form-select">
              <option value="">Select position</option>
              <option value="2">Website Designer</option>
              <option value="3">UI/UX Designer</option>
            </select>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label class="pb-1">Upload your CV/Resume</label>
            <input name="resume" type="file" class="form-control" placeholder="Upload you file max 2MB"
              required="">
          </div>
        </div>

        <div class="col-12 col-md-12">
          <div class="form-group">
            <label class="pb-1">Your Message</label>
            <textarea name="msg" type="text" class="form-control" placeholder="Enter your message here"></textarea>
          </div>
        </div>

        <div class="job__apply btn_wrapper">
          <button class="wc-btn-primary btn-hover btn-item"><span></span> Send <br>Now <i
              class="fa-solid fa-arrow-right"></i></button>
        </div>

      </div>

    </div>
  </section>
  <!-- Career detail area end -->
@endsection
