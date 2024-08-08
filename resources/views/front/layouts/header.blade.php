@php
  use App\Models\ProductCategory;

  $menuProductCategories = ProductCategory::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Meta Tag Seo-->
  @stack('seo_meta_tag')
  @stack('pagination_tag')
  <!-- CSS -->
  <link href="{{ url('front/') }}/assets/css/styles.css" rel="stylesheet">
  <link rel="preload" href="{{ url('front/') }}/assets/css/colors.css" as="style"
    onload="this.onload=null;this.rel='stylesheet'">
  <meta name="google-adsense-account" content="ca-pub-7656139191073608">
  <style>
    .hide-this {
      display: none;
    }
  </style>
  <!-- organization schema code -->
  <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"Organization","@id":"https://www.britannicaoverseas.com/#organization","name":"Mobility Solution","url":"https://www.britannicaoverseas.com/","logo":"https://www.britannicaoverseas.com/front/assets/img/logo.png","address":{"@type":"PostalAddress","streetAddress":"B-16 Ground Floor, Mayfield Garden, Sector 50","addressLocality":"Gurugram","addressRegion":"Haryana","postalCode":"122002","addressCountry":"India"},"contactPoint":{"@type":"ContactPoint","contactType":"contact","telephone":"+919818560331","email":"info.britannicaoverseas.com"},"sameAs":["https://www.facebook.com/britannicaoverseasedu","https://twitter.com/BritannicaOEdu","https://www.youtube.com/channel/UCK2eeC1CkS3YkYrGnnzBUEQ","https://in.pinterest.com/Britannicaoverseas/","https://www.linkedin.com/company/britannicaoverseas/","https://www.instagram.com/britannicaoverseas/","https://www.tumblr.com/britannicaoverseas/"]}
  </script>

  <!-- Favicons-->
  @stack('breadcrumb_schema')
  <style>
    .hide-this {
      display: none;
    }
  </style>
  <style>
    .sItems ul li a,
    .sItems ul li.active {
      padding: 8px 15px;
      display: block
    }

    .sItems {
      width: 100%;
      height: 118px;
      overflow: auto;
      top: 0
    }

    .sItems ul li {
      border-bottom: 1px solid #eee
    }

    .sItems ul li.active {
      font-size: 15px;
      text-align: left;
      background: #ff57221c;
      color: #da0b4e;
      text-transform: uppercase;
      font-weight: 600
    }

    .sItems ul li a:hover {
      background: #da0b4e;
      color: #fff
    }
  </style>
</head>

<body class="red-skin">
  <div id="main-wrapper">
    <!-- Top header-->
    <div class="header header-light head-shadow">
      <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
          <div class="nav-header">
            <a class="nav-brand" href="{{ url('/') }}"><img src="{{ url('front/') }}/assets/img/logo.webp"
                class="logo" alt="Mobility Solution Logo" /></a>
            <div class="nav-toggle"></div>
          </div>
          <div class="nav-menus-wrapper" style="transition-property: none;">
            <ul class="nav-menu nav-menu-social align-to-right">
              @if (session()->has('studentLoggedIn'))
                <li class="login_click light"><a href="{{ url('/student/profile/') }}">Profile</a></li>
              @else
                <li class="login_click light"><a href="{{ url('/') }}/sign-in">Login</a></li>
              @endif
            </ul>
            <ul class="nav-menu align-to-right">
              @foreach ($menuProductCategories as $row)
                <li class="mega-dropdown">
                  <a href="{{ url($row->category_slug) }}">{{ $row->category_name }}<span
                      class="submenu-indicator"></span></a>
                  <ul class="nav-dropdown nav-submenu mega-dropdown-menu">
                    <div class="row">
                      <div class="col-md-4">
                        <ul>
                          @foreach ($row->getAllSubCategory as $sc)
                            <li><a href="{{ url($row->category_slug . '/' . $sc->sub_category_slug) }}"><i
                                  class="ti-arrow-right"></i>
                                {{ $sc->sub_category_name }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </ul>
                </li>
              @endforeach
              <li><a href="{{ url('career') }}">Career</a></li>
              <li><a href="{{ url('articles') }}">Blog</a></li>
              <li><a href="{{ url('enquiry') }}">Enquiry</a></li>
              <li><a href="{{ url('contact-us') }}">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <div class="clearfix"></div>
    <!-- Top header-->
