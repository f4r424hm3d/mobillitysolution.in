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
      <form action="{{ url('inquiry/enquiry/') }}/" method="post">
        @csrf
        <input type="hidden" name="source" value="enquiry">
        <input type="hidden" name="source_path" value="{{ URL::full() }}">
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="pb-1">Your Name</label>
              <input type="text" class="form-control" placeholder="Write your name" name="name" id="name"
                value="{{ old('name') }}">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
              <label class="pb-1">Your Email</label>
              <input type="email" class="form-control" placeholder="example@gmail.com" name="email" id="email"
                value="{{ old('email') }}">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-4">
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
              <label class="pb-1">Solutions</label>
              <select name="category" id="category_id" class="form-control form-select">
                <option value="">Select</option>
                @foreach ($categories as $row)
                  <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                @endforeach
              </select>
              @error('category')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="pb-1">Solution Sub Category</label>
              <select name="sub_category" id="sub_category_id" class="form-control form-select">
                <option value="">Select</option>
              </select>
              @error('sub_category')
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
            <button class="wc-btn-primary btn-hover btn-item" type="submit">
              <span></span> Submit <br>Now <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>

        </div>
      </form>

    </div>
  </section>
  <script>
    $(document).ready(function() {
      $('#category_id').on('change', function(event) {
        var category_id = $('#category_id').val();
        //alert(category_id);
        $.ajax({
          url: "{{ url('common/get-sub-category-by-category') }}",
          method: "GET",
          data: {
            category_id: category_id
          },
          success: function(result) {
            //alert(result);
            $('#sub_category_id').html(result);
          }
        })
      });
    });
  </script>
@endsection
