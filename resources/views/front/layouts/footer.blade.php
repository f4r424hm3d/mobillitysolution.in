<!-- Contact box start -->
<section class="cta__area">
  <div class="container pt-100 pb-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="cta__content">
          <p class="cta__sub-title">Contact us</p>
          <h2 class="cta__title mb-3">"Don't focus on the Disability,<br>Focus on the Ability"</h2>
          <p>“While we’re good with signals, there are simpler ways for us to get in touch and answer your
            questions.”</p>
          <div class="btn_wrapper"><a href="{{ url('contact-us') }}"
              class="wc-btn-primary btn-item btn-hover"><span></span>Let’s talk
              us <i class="fa-solid fa-arrow-right"></i></a></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Contact box end -->
<!-- footer-->
<footer class="woocomerce__footer">
  <div class="woocomerce__footer-wrapper">

    <div class="woocomerce__footer-about"><img class="woocomerce__footer-logo"
        src="{{ url('web/') }}/assets/imgs/logo/logo-black.png" alt="logo-img">
      <p class="woocomerce__footer-dis">Mayfield Garden, B-16 Ground Floor, Sector – 50, Gurgaon, Haryana, India
      </p>
      <a class="woocomerce__footer-mail" href="mailto:info@mobillitysolution.in">info@mobillitysolution.in</a>
      <a class="woocomerce__footer-phone" href="tell:+919910344331">+91-9910 344 331</a>
    </div>
    @php
      use App\Models\ProductCategory;
      $categories = ProductCategory::limit(5)->get();
    @endphp
    <div class="woocomerce__footer-category category1">
      <span class="woocomerce__footer-title">Category</span>
      <ul class="woocomerce__footer-list">
        @foreach ($categories as $cat)
          <li><a href="{{ url($cat->category_slug) }}">{{ $cat->category_name }}</a></li>
        @endforeach
      </ul>
    </div>

    <div class="woocomerce__footer-category">
      <span class="woocomerce__footer-title">Information</span>
      <ul class="woocomerce__footer-list">
        <li><a href="#">Company</a></li>
        <li><a href="#">Career</a></li>
        <li><a href="#">Brand Partner</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Newsletter</a></li>
      </ul>
    </div>

    <div class="woocomerce__footer-category">
      <span class="woocomerce__footer-title">Help</span>
      <ul class="woocomerce__footer-list">
        <li><a href="#">Dealer & Agent</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="privacy-policy.html">Privacy Policy</a></li>
        <li><a href="#">Delivery</a></li>
        <li><a href="#">Order Tanking</a></li>
      </ul>
    </div>

  </div>

  <div class="woocomerce__footer-bottom">
    <p class="woocomerce__footer-copytext">© 2023 | Alrights reserved by <a href="#">Mobility Solution</a>
    </p>
    <ul class="woocomerce__footer-social">
      <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
      <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
      <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
    </ul>
  </div>
</footer>
<!-- /footer-->

</div>
</div>

<!-- All JS files -->
<script src="{{ url('web/') }}/assets/js/jquery-3.6.0.min.js"></script>
<script src="{{ url('web/') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('web/') }}/assets/js/swiper-bundle.min.js"></script>
<script src="{{ url('web/') }}/assets/js/counter.js"></script>
<script src="{{ url('web/') }}/assets/js/gsap.min.js"></script>
<script src="{{ url('web/') }}/assets/js/ScrollTrigger.min.js"></script>
<script src="{{ url('web/') }}/assets/js/ScrollToPlugin.min.js"></script>
<script src="{{ url('web/') }}/assets/js/ScrollSmoother.min.js"></script>
<script src="{{ url('web/') }}/assets/js/SplitText.min.js"></script>
<script src="{{ url('web/') }}/assets/js/chroma.min.js"></script>
<script src="{{ url('web/') }}/assets/js/mixitup.min.js"></script>
<script src="{{ url('web/') }}/assets/js/vanilla-tilt.js"></script>
<script src="{{ url('web/') }}/assets/js/jquery.meanmenu.min.js"></script>
<script src="{{ url('web/') }}/assets/js/jquery-ui.min.js"></script>
<script src="{{ url('web/') }}/assets/js/main.js"></script>
<script>
  $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - 60
          }, 500, function() {});
        }
      }
    });
</script>
<script>
  $(".show-more").click(function() {
    if ($(".text").hasClass("show-more-height")) {
      $(this).text("Show Less");
    } else {
      $(this).text("Show More");
    }
    $(".text").toggleClass("show-more-height");
  });
</script>
</body>

</html>
