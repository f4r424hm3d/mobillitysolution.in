@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <section class="p-0">
    <div class="log-space">
      <div>
        <div class="row no-gutters position-relative log_rads">
          <div class="d-none d-md-block col-lg-6 col-md-5 bg-cover"
            style="background:#1f2431 url({{ url('front') }}/assets/img/log.png)no-repeat;">
            <div class="lui_9okt6">
              <div class="_loh_revu97">
                <div id="reviews-login">

                  <!-- Single Reviews -->
                  <div class="_loh_r96">
                    <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                    <div class="_loh_r92">
                      <h4>Good Services</h4>
                    </div>
                    <div class="_loh_r93">
                      <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut-->
                      <!--  labore et dolore magna aliqua.</p>-->
                    </div>
                    <div class="_loh_foot_r93">
                      <h4>Mobility Solution</h4>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-7 position-static p-2">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="log_wraps booking">
              <form action="{{ url('enquiry') }}" method="post">
                @csrf
                <input type="hidden" name="source_path" value="{{ url()->previous() }}">
                <input type="hidden" name="source" value="enquiry-form">
                <div class="row align-items-center">

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Category</label>
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-book"></span></div>
                        <select name="product_category" id="product_category" class="form-control b-0 pl-0 bg-white"
                          required>
                          <option value="">Select Category</option>
                          @foreach ($categories as $row)
                            <option value="{{ $row->id }}"
                              {{ $row->id == old('product_category') ? 'selected' : '' }}>
                              {{ $row->category_name }}
                            </option>
                          @endforeach
                        </select>
                        @error('product_category')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Sub Category</label>
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-book"></span></div>
                        <select name="product_sub_category" id="product_sub_category"
                          class="form-control b-0 pl-0 bg-white" required>
                          <option value="">Select Sub Category</option>
                        </select>
                        @error('product_sub_category')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Product</label>
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-book"></span></div>
                        <select name="product" id="product" class="form-control b-0 pl-0 bg-white" required>
                          <option value="">Select Product</option>
                        </select>
                        @error('product')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Name</label>
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-user"></span></div>
                        <input name="name" type="text" class="form-control b-0 pl-0" placeholder="Enter Name"
                          value="{{ old('name') }}" required="">
                      </div>
                      @error('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Email ID</label>
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-email"></span></div>
                        <input name="email" type="email" class="form-control b-0 pl-0"
                          placeholder="eg: example@gmail.com" value="{{ old('email') }}" required="">
                      </div>
                      @error('email')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <div class="mini">You will recieve a verification code on this Email id</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label>Enter your mobile number</label>
                    <div class="row">
                      <div class="col-3 pr-0">
                        <select name="country_code" class="form-control bg-white p-2" required>
                          @foreach ($phonecodes as $row)
                            <option value="{{ $row->phonecode }}"
                              {{ $row->phonecode == 91 || old('country_code') == $row->phonecode ? 'Selected' : '' }}>
                              +({{ $row->phonecode }}) {{ $row->iso3 }} </option>
                          @endforeach
                        </select>
                        @error('country_code')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="col-9 pl-1">
                        <div class="form-group mb-0">
                          <div class="input-group">
                            <div class="input-icon"><span class="ti-mobile"></span></div>
                            <input name="mobile" type="text" class="form-control b-0 bg-white pl-0"
                              placeholder="eg. 12345 78901" value="{{ old('mobile') }}" required="">
                          </div>
                          @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="mini">You will recieve a verification code on this number</div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="captcha_question">{{ $question['text'] }}</label>
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-captcha_answer"></span></div>
                        <input type="number" name="captcha_answer" class="form-control b-0 pl-0"
                          placeholder="Enter Captcha Value" required="">
                      </div>
                      @error('captcha_answer')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group"><button class="slot-btn" type="submit">Book Your Slot</button></div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#product_category').on('change', function(event) {
        var category_id = $('#product_category').val();
        $.ajax({
          url: "{{ url('get/subcategories') }}",
          method: "GET",
          data: {
            category_id: category_id
          },
          success: function(result) {
            $('#product_sub_category').html(result);
          }
        })
      });
      $('#product_sub_category').on('change', function(event) {
        var sub_category_id = $('#product_sub_category').val();
        $.ajax({
          url: "{{ url('get/products') }}",
          method: "GET",
          data: {
            sub_category_id: sub_category_id
          },
          success: function(result) {
            $('#product').html(result);
          }
        })
      });
    });
  </script>
@endsection
