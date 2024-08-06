@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <style type="text/css">
    .thanks_content {
      max-width: 100%;
      background-color: #f8fff9;
      padding: 20px;
      box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
      border-radius: 10px;
    }

    .thanks_col img {
      max-width: 100px;
      box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
      border-radius: 100%;
    }

    .btn.btn-modern {
      transition: 0.4s;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      margin: 0 auto;
    }
  </style>
  <section class="p-0">
    <div class="log-space">
      <div>
        <div class="row no-gutters position-relative log_rads">
          <div class="col-lg-4 col-md-4 position-static p-2"></div>
          <div class="col-lg-4 col-md-4 position-static p-2">
            <div class="log_wraps booking">
              <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                  <div class="thanks_col">
                    <div class="thanks_content">
                      <img src="https://lvoverseas.com/front/assets/img/thnks.png">
                      <h4 class="mt-3 mb-1 text-success">
                        Your inquiry has been submitted successfully.
                      </h4>
                      <div class="mcod">Thank You for reaching out us. We will contact you shortly.</div>
                      <div class="form-group mt-4 text-center">
                        <a href="{{ url('/') }}" class="btn btn-modern float-none">
                          Back to Home Page
                          <span><i class="ti-arrow-right"></i></span>
                        </a>
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
@endsection
