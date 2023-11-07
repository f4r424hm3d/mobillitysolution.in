<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  @stack('seo_meta_tag')
  @stack('head_schemas')
</head>

<body>

  <!-- Cursor Animation -->
  <div class="cursor1"></div>
  <div class="cursor2"></div>

  <!-- Preloader -->
  <div class="preloader">
    <div class="loading">
      <div class="bar bar1"></div>
      <div class="bar bar2"></div>
      <div class="bar bar3"></div>
      <div class="bar bar4"></div>
      <div class="bar bar5"></div>
      <div class="bar bar6"></div>
      <div class="bar bar7"></div>
      <div class="bar bar8"></div>
    </div>
  </div>

  <!-- Scroll Smoother -->
  <div class="has-smooth" id="has_smooth"></div>

  <!-- Go Top Button -->
  <button id="scroll_top" class="scroll-top"><i class="fa-solid fa-arrow-up"></i></button>

  <!-- Header area start -->
  <header class="header__area-3">
    <div class="header__inner-3">
      <div class="header__logo-2">
        <a href="{{ url('/') }}" class="logo-dark"><img src="{{ url('web/') }}/assets/imgs/logo/logo-black.png"
            alt="Site Logo"></a>
        <a href="{{ url('/') }}" class="logo-light"><img src="{{ url('web/') }}/assets/imgs/logo/logo-black.png"
            alt="Site Logo"></a>
      </div>
      <div class="header__nav-2"></div>
      <div class="header__nav-icon-3">
        <button id="open_offcanvas"><span class="menu-text-pp">Menu</span><img
            src="{{ url('web/') }}/assets/imgs/logo/menu_bar.png" alt="Menubar Icon"></button>
      </div>
    </div>
  </header>
  <!-- Header area end -->

  <!-- Menu area start -->
  <div class="offcanvas__area">
    <div class="offcanvas__body">
      <div class="offcanvas__left">
        <div class="offcanvas__logo">
          <a href="{{ url('/') }}"><img src="{{ url('web/') }}/assets/imgs/logo/logo-black.png"
              alt="Logo"></a>
        </div>
        <div class="offcanvas__social">
          <h3 class="social-title">Follow Us</h3>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">YouTube</a></li>
            <li><a href="#">Dribbble</a></li>
            <li><a href="#">Behance</a></li>
          </ul>
        </div>
      </div>
      <div class="offcanvas__mid">
        <div class="offcanvas__menu-wrapper">
          <nav class="offcanvas__menu">
            <ul class="menu-anim">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="#">About Mobility</a>
                <ul>
                  <li><a href="{{ url('about-us') }}">About us</a></li>
                  <li><a href="{{ url('what-make-us-different') }}">What make us different</a></li>
                </ul>
              </li>
              <li><a href="{{ url('solutions') }}">Solutions</a>
                <ul>
                  <li><a href="prosthetics.html">Prosthetics</a>
                    <ul>
                      <li><a href="prosthetic-lower-limb.html">Lower limb</a></li>
                      <li><a href="#">Upper limb</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Orthetics</a>
                    <ul>
                      <li><a href="prosthetic-lower-limb.html">Lower limb</a></li>
                      <li><a href="#">Upper limb</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Rehab Products</a>
                    <ul>
                      <li><a href="#">Silicon products</a></li>
                      <li><a href="#">Silicon products</a></li>
                      <li><a href="#">Silicon products</a></li>
                      <li><a href="#">Silicon products</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="{{ url('career') }}">Career</a></li>
              <li><a href="{{ url('news') }}">Blog</a></li>
              <li><a href="{{ url('enquiry') }}">Enquiry</a></li>
              <li><a href="{{ url('contact-us') }}">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="offcanvas__right">
        <div class="offcanvas__search">
        </div>
        <div class="offcanvas__contact">
          <h3>Get in touch</h3>
          <ul>
            <li><a href="tel:+919910344331">+(91) 9910344331</a></li>
            <li><a href="mailto:info@mobillitysolution.in">info@mobillitysolution.in</a></li>
            <li>Mayfield Garden, B-16 Ground Floor, Sector – 50, Gurgaon, Haryana, India</li>
          </ul>
        </div>
        <img src="{{ url('web/') }}/assets/imgs/shape/11.png" alt="shape" class="shape-1">
        <img src="{{ url('web/') }}/assets/imgs/shape/12.png" alt="shape" class="shape-2">
      </div>
      <div class="offcanvas__close">
        <button type="button" id="close_offcanvas"><i class="fa-solid fa-xmark"></i></button>
      </div>
    </div>
  </div>
  <!-- Menu area end -->

  <div id="smooth-wrapper">
    <div id="smooth-content">
