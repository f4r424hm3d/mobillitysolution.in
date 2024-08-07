<div class="single_widgets widget_category">
  <h5 class="title mb-3">Get in touch</h5>
  <div class="row align-items-center booking p-0">
    <form action="{{ url('enquiry') }}" method="post">
      @csrf
      <input type="hidden" name="source" value="Category Page">
      <input type="hidden" name="source_path" value="{{ URL::full() }}">
      <div class="col-lg-12">
        <div class="form-group">
          <div class="input-group">
            <input name="name" type="text" class="form-control b-0" placeholder="Full Name*"
              value="{{ old('name') }}" required="">
          </div>
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-4 pr-0">
            <select name="country_code" class="form-control bg-white p-2" style="height:50px" required>
              <option value="">Select</option>
              @foreach ($phonecodes as $row)
                <option value="{{ $row->phonecode }}" {{ $row->phonecode == 91 ? 'selected' : '' }}>
                  {{ $row->iso3 }} +({{ $row->phonecode }})
                </option>
              @endforeach
            </select>
            @error('country_code')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-8 pl-1">
            <div class="form-group">
              <div class="input-group">
                <input name="mobile" type="text" class="form-control b-0 bg-white" placeholder="Mobile/WhatsApp No*"
                  value="{{ old('mobile') }}" required="">
              </div>
              @error('mobile')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <div class="input-group">
            <input name="email" type="email" class="form-control b-0" placeholder="Email ID"
              value="{{ old('email') }}" required="">
          </div>
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-12">
        <div class="social-login mb-3 d-flex align-items-center">
          <ul>
            <li class="b-0 p-0" style="width:auto">
              <input id="reg" class="checkbox-custom m-0" name="reg" type="checkbox" required>
              <label for="reg" class="checkbox-custom-label m-0 float-left">I accept the</label>
              <a href="{{ url('terms-conditions') }}" class="theme-cl font-size-13 m-0">
                <u class="ml-2">Terms & Conditions</u>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <label for="captcha_question">{{ $question['text'] }}</label>
          <div class="input-group">
            <div class="input-icon"><span class="ti-captcha_answer"></span></div>
            <input type="number" name="captcha_answer" class="form-control b-0 pl-0" placeholder="Enter Captcha Value"
              required="">
          </div>
          @error('captcha_answer')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group"><button class="slot-btn" type="submit">Submit</button></div>
      </div>
    </form>
  </div>
</div>
