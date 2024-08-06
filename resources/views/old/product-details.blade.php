@extends('old.layouts.main')
@push('seo_meta_tag')
  @include('old.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <style type="text/css">
    .gallery {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
    }

    .gallery-item {
      width: 100%;
      height: auto;
      cursor: pointer;
      transition: transform 0.2s;
      overflow: hidden;
      height: 300px;
      display: flex;
    }

    .gallery-item:hover {
      transform: scale(1.05);
    }

    .popup-gallery {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .popup-image {
      width: 500px;
      /* Set a fixed width */
      height: auto;
      /* Maintain aspect ratio */
      max-height: 80%;
      /* Ensure it does not overflow the viewport */
    }

    .close {
      position: fixed;
      top: 42%;
      transform: translate(-50%, -50%);
      left: 70%;
      font-size: 28px;
      color: white;
      cursor: pointer;
      z-index: 1001;
      background: #d3c500;
      width: 25px;
      line-height: normal;
      height: 25px;
      display: flex;
      text-align: center;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
    }

    .prev,
    .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgb(255 251 195);
      border: none;
      font-size: 28px;
      cursor: pointer;
      width: 40px;
      line-height: 40px;
      height: 40px;
      border-radius: 10%;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .prev {
      left: 20px;
    }

    .next {
      right: 20px;
    }

    .portfolio__image-wrapper {
      overflow: hidden;
      height: 200px;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .portfolio__image {
      height: 100%;
      width: auto;
    }

    .title_bottom {
      background-color: #decf00;
      padding: 10px;
      text-align: center;
    }

    .portfolio__item-5:hover .portfolio__content-5 {
      opacity: 1;
      right: 0px;
      width: 100%;
    }

    .portfolio__title-5 {
      font-size: 17px;
      font-weight: 500;
      color: var(--white);
      text-transform: uppercase;
    }

    .blog__btn {
      display: inline-block;
      font-weight: 400;
      font-size: 14px;
    }

    .portfolio__content-5 {
      top: 55% !important;
    }

    .title_bottom h3 {
      color: white;
      margin: 0;
      font-size: 16px;
    }

    .portfolio__item-5 img {
      height: 300px;
      width: 300px;
      max-width: 100%;
    }

    .artical_image img {
      height: 500px;
      width: 100%;
      max-width: 100%;
    }

    .container {
      width: 100%;
      max-width: 800px;
      position: relative;
      margin: auto;
      overflow: hidden;
    }

    .main-image {
      max-width: 100%;
      display: block;
      transition: opacity 0.5s ease;
      height: 400px;
      width: 400px;
    }

    .thumbnail-container {
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    .thumbnail {
      width: 70px;
      height: 70px;
      margin: 0 5px;
      cursor: pointer;
      opacity: 0.6;
      transition: opacity 0.3s ease;
    }

    .thumbnail:hover {
      opacity: 1;
    }

    .btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      font-size: 18px;
      z-index: 10;
    }

    .btn-prev {
      left: 10px;
    }

    .btn-next {
      left: 45%;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
      .portfolio__inner-5 {
        gap: 20px !important;
      }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
      .portfolio__item-5 {
        width: 23% !important;
      }
    }

    @media only screen and (min-width: 320px) and (max-width: 420px) {
      .popup-image {
        width: 55%;
        height: auto;
        max-height: 70%;
      }

      .gallery {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 10px;
      }

      .close {
        position: fixed;
        top: 30%;
        transform: translate(-50%, -50%);
        left: 82%;
        font-size: 19px;
        width: 25px;
      }
    }
  </style>
  <!-- Breadcrumb area start -->
  <div class="breadcrumb">
    <div class="container">
      <ul class="woocomerce__single-breadcrumb">
        <li><a href="{{ url('old') }}">Home <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="{{ url('old/solutions') }}">Solutions <i class="fa-solid fa-chevron-right"></i></a></li>
        <li><a href="{{ url('old/' . $row->getCategory->category_slug) }}">{{ $row->getCategory->category_name }} <i
              class="fa-solid fa-chevron-right"></i></a>
        </li>
        <li><a
            href="{{ url('old/' . $row->getSubCategory->sub_category_slug) }}">{{ $row->getSubCategory->sub_category_name }}
            <i class="fa-solid fa-chevron-right"></i></a>
        </li>
        <li>{{ $row->product_name }}</li>
      </ul>
    </div>
  </div>

  <!-- Products area start -->
  <section class="woocomerce__single sec-plr-50 bg-light pb-100">

    <div class="container g-0">
      <div class="row">

        <div class="col-lg-6">
          {{-- <button class="btn btn-prev" onclick="changeImage(-1)">&#10094;</button> --}}
          <img src="{{ asset($row->thumbnail_path) }}" alt="Main Image" class="main-image" id="mainImage">
          {{-- <button class="btn btn-next" onclick="changeImage(1)">&#10095;</button> --}}
          {{-- <div class="thumbnail-container">
            <img src="https://www.mobilitysolution.in/uploads/products/img-20240731-123812_1722506741.jpg"
              alt="Thumbnail 1" class="thumbnail" onclick="selectImage(0)">
            <img src="https://www.mobilitysolution.in/web/assets/imgs/products/home/1.jpg" alt="Thumbnail 2"
              class="thumbnail" onclick="selectImage(1)">
            <img src="https://www.mobilitysolution.in/uploads/products/img-20240731-123812_1722506741.jpg"
              class="thumbnail" onclick="selectImage(2)">
          </div> --}}
        </div>
        <div class="col-lg-6 pl-50 product-details">
          <div class="woocomerce__single-right wc_slide_btm">
            <div class="woocomerce__single-content">
              <h2 class="woocomerce__single-title">{{ $row->product_name }}</h2>

              <div class="show-more-box">
                <div class="text show-more-height">
                  {!! $row->description !!}
                </div>
                <div class="show-more">Show Less</div>
              </div>

              <a href="{{ url('enquiry') }}" class="blog__btn">Enquiry Now <span><i
                    class="fa-solid fa-arrow-right"></i></span></a>

              <div class="woocomerce__single-varitions">
                <div class="accordion" id="accordionExample">
                  @foreach ($row->contents as $pc)
                    <div class="accordion-item">
                      <div class="accordion-header" id="headingOne{{ $pc->id }}">
                        <div class="accordion-button collapsed bg-light" role="contentinfo" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne{{ $pc->id }}" aria-expanded="false"
                          aria-controls="collapseOne{{ $pc->id }}">
                          <div class="woocomerce__single-stitle">{{ $pc->title }}</div>
                        </div>
                      </div>
                      <div id="collapseOne{{ $pc->id }}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne{{ $pc->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          {!! $pc->description !!}
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Gallery -->
  @if ($row->photos->count() > 0)
    <section class="portfolio__area-5  mt-5">
      <div class="container-fluid">
        <div class="row pb-5">
          <div class="col-lg-12">
            <div class="sec-title-wrapper">
              <h3 class="sec-title">Our Gallery</h3>
            </div>
          </div>
        </div>
        <div class="gallery">
          @foreach ($row->photos as $p)
            <div class="gallery-item-wrapper">
              <img class="gallery-item" src="{{ asset($p->file_path) }}" alt="{{ $p->title }}">
            </div>
          @endforeach
        </div>
        <div id="popup-gallery" class="popup-gallery">
          <span class="close">&times;</span>
          <img class="popup-image" id="popup-image" src="">
          <button class="prev" id="prev-button">&lt;</button>
          <button class="next" id="next-button">&gt;</button>
        </div>
      </div>
    </section>
  @endif

  @if ($relatedProducts->count() > 0)
    <!-- Related Product start -->
    <section class="portfolio__area-5">
      <div class="container-fluid pt-100 pb-100">
        <div class="row pb-5">
          <div class="col-lg-12">
            <div class="sec-title-wrapper">
              <h3 class="sec-title">Related Products</h3>
            </div>
            {{-- <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
        has been the industry's standard dummy text.</p> --}}
          </div>
        </div>

        <div class="row">
          <div class="portfolio__inner-5">

            @foreach ($relatedProducts as $row)
              <div class="portfolio__item-5">
                <img src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->product_name }}">
                <div class="title_bottom">
                  <h3 class="portfolio__title-5 mb-2">{{ $row->product_name }}</h3>
                </div>
                <div class="portfolio__content-5">
                  {{-- <h2 class="portfolio__name-5">Hand prosthetics</h2> --}}
                  <h3 class="portfolio__title-5 mb-2">{{ $row->product_name }}</h3>
                  <a href="{{ url('old/' . $row->product_slug) }}" class="blog__btn">View Product Details <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
                </div>
                </a>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product end -->
  @endif
  <!-- Products area end -->
  <script type="text/javascript">
    const galleryItems = document.querySelectorAll('.gallery-item');
    const popupGallery = document.getElementById('popup-gallery');
    const popupImage = document.getElementById('popup-image');
    const closeButton = document.querySelector('.close');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');

    let currentIndex = 0;
    const images = Array.from(galleryItems).map(item => item.src);

    galleryItems.forEach((item, index) => {
      item.addEventListener('click', () => {
        currentIndex = index;
        openPopup(images[currentIndex]);
      });
    });

    closeButton.addEventListener('click', closePopup);
    prevButton.addEventListener('click', showPrevImage);
    nextButton.addEventListener('click', showNextImage);

    function openPopup(src) {
      popupImage.src = src;
      popupGallery.style.display = 'flex';
    }

    function closePopup() {
      popupGallery.style.display = 'none';
    }

    function showPrevImage() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      popupImage.src = images[currentIndex];
    }

    function showNextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      popupImage.src = images[currentIndex];
    }
  </script>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      // Gallery and Popup functionality
      const galleryItems = document.querySelectorAll('.gallery-item');
      const popupGallery = document.getElementById('popup-gallery');
      const popupImage = document.getElementById('popup-image');
      const closeBtn = document.querySelector('.close');
      const prevBtn = document.getElementById('prev-button');
      const nextBtn = document.getElementById('next-button');

      let currentImageIndex = 0;

      function openPopup(index) {
        popupImage.src = galleryItems[index].src;
        popupGallery.style.display = 'flex';
        currentImageIndex = index;
      }

      function closePopup() {
        popupGallery.style.display = 'none';
      }

      function showPrevImage() {
        currentImageIndex = (currentImageIndex - 1 + galleryItems.length) % galleryItems.length;
        openPopup(currentImageIndex);
      }

      function showNextImage() {
        currentImageIndex = (currentImageIndex + 1) % galleryItems.length;
        openPopup(currentImageIndex);
      }

      galleryItems.forEach((item, index) => {
        item.addEventListener('click', () => openPopup(index));
      });

      closeBtn.addEventListener('click', closePopup);
      prevBtn.addEventListener('click', showPrevImage);
      nextBtn.addEventListener('click', showNextImage);

      popupGallery.addEventListener('click', (e) => {
        if (e.target === popupGallery) {
          closePopup();
        }
      });

      // Image Slider functionality
      const images = [
        'https://www.mobilitysolution.in/uploads/products/img-20240731-123812_1722506741.jpg',
        'https://www.mobilitysolution.in/web/assets/imgs/products/home/1.jpg',
        'https://www.mobilitysolution.in/uploads/products/img-20240731-123812_1722506741.jpg',
        'https://www.mobilitysolution.in/web/assets/imgs/products/home/1.jpg'
      ];

      let currentImageIndexSlider = 0;

      function showImage(index) {
        const mainImage = document.getElementById('mainImage');
        mainImage.classList.remove('fade-in');
        void mainImage.offsetWidth; // Trigger reflow
        mainImage.src = images[index];
        mainImage.classList.add('fade-in');
      }

      function changeImage(offset) {
        currentImageIndexSlider = (currentImageIndexSlider + offset + images.length) % images.length;
        showImage(currentImageIndexSlider);
      }

      function selectImage(index) {
        currentImageIndexSlider = index;
        showImage(currentImageIndexSlider);
      }

      document.getElementById('mainImage').addEventListener('load', () => {
        document.getElementById('mainImage').classList.add('fade-in');
      });

      document.querySelector('.btn-prev').addEventListener('click', () => changeImage(-1));
      document.querySelector('.btn-next').addEventListener('click', () => changeImage(1));

      document.querySelectorAll('.thumbnail').forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => selectImage(index));
      });

      showImage(currentImageIndexSlider);
    });
  </script>
@endsection
