@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
  <!-- breadcrumb schema Code -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "BreadcrumbList",
      "name": "{{ ucwords($meta_title) }}",
      "description": "{{ $meta_description }}",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}"
      }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Articles",
        "item": "{{ url('articles') }}"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $blog->title }}",
        "item": "{{ url()->current() }}"
      }]
    }
  </script>
  <!-- breadcrumb schema Code End -->
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "webpage",
      "url": "{{ url()->current() }}",
      "name": "{{ $meta_title }}",
      "description": "{{ $meta_description }}",
      "inLanguage": "en-US",
      "keywords": ["{{ $meta_keyword }}"]
    }
  </script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "inLanguage": "en",
      "headline": "<?= $meta_title ?>",
      "description": "<?= $meta_description ?>",
      "keywords": "<?= $meta_keyword ?>",
      "dateModified": "<?= getISOFormatTime($blog->updated_at) ?>",
      "datePublished": "<?= getISOFormatTime($blog->created_at) ?>",
      "mainEntityOfPage": { "id": "<?= $page_url ?>", "@type": "WebPage" },
      "author": { "@type": "Person", "name": "Britannica Team", "url": "https://www.britannicaoverseas.com/author/6-britannica-team" },
      "publisher": {
          "@type": "Organization",
          "name": "Mobility Solution",
          "logo": { "@type": "ImageObject", "name": "Mobility Solution", "url": "https://www.britannicaoverseas.com/front/assets/img/logo.webp", "height": "65", "width": "258" }
      },
      "image": { "@type": "ImageObject", "url": "<?= asset($og_image_path) ?>" }
    }
  </script>
@endpush
@section('main-section')
  <!-- Breadcrumb -->
  <div class="image-cover ed_detail_head lg" style="background:url({{ url('/front/') }}/assets/img/ub.jpg);"
    data-overlay="8">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1"><a href="{{ url('articles') }}">Articles</a></li>
              <li class="facts-1">{{ $blog->title }}</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">{{ $blog->title }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->
  <!-- Content -->
  <section class="bg-light blog-page">
    <div class="container">
      <!-- row Start -->
      <div class="row">
        <!-- Blog Detail -->
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <div class="article_detail_wrapss single_article_wrap format-standard">
            <div class="article_body_wrap">
              <div class="article_featured_image">
                <img class="img-fluid w-100" src="{{ asset($blog->thumbnail_path) }}" alt="{{ $blog->title }}">
              </div>
              <div class="article_top_info">
                <ul class="article_middle_info">
                  @if ($blog->user_id != null)
                    <li>
                      <a href="javascript:void()">
                        <span class="icons"><i class="ti-user"></i></span>
                        by {{ $blog->getUser->name }}
                      </a>
                    </li>
                  @endif
                  {{-- <li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span>45 Comments</a></li> --}}
                </ul>
              </div>
              <h2 class="post-title">{{ $blog->title }}</h2>

              {!! $blog->description !!}
            </div>
          </div>
          <!-- Blog Comment -->
          {{-- <div class="article_detail_wrapss single_article_wrap format-standard">
          <div class="comment-area">
            <div class="all-comments">
              <h3 class="comments-title">05 Comments</h3>
              <div class="comment-list">
                <ul>
                  <li class="article_comments_wrap">
                    <article>
                      <div class="article_comments_thumb"><img data-src="{{ url('front/') }}/assets/img/user-1.jpg" alt="">
                      </div>
                      <div class="comment-details">
                        <div class="comment-meta">
                          <div class="comment-left-meta">
                            <h4 class="author-name">Rosalina Kelian <span class="selected"><i
                                  class="fas fa-bookmark"></i></span></h4>
                            <div class="comment-date">19th May 2018</div>
                          </div>
                          <div class="comment-reply">
                            <a href="#" class="reply"><span class="icona"><i class="ti-back-left"></i></span> Reply</a>
                          </div>
                        </div>
                        <div class="comment-text">
                          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim laborumab.
                            perspiciatis unde omnis iste natus error.
                          </p>
                        </div>
                      </div>
                    </article>
                    <ul class="children">
                      <li class="article_comments_wrap">
                        <article>
                          <div class="article_comments_thumb"><img data-src="{{ url('front/') }}/assets/img/user-2.jpg"
                              alt=""></div>
                          <div class="comment-details">
                            <div class="comment-meta">
                              <div class="comment-left-meta">
                                <h4 class="author-name">Rosalina Kelian</h4>
                                <div class="comment-date">19th May 2018</div>
                              </div>
                              <div class="comment-reply">
                                <a href="#" class="reply"><span class="icons"><i class="ti-back-left"></i></span>
                                  Reply</a>
                              </div>
                            </div>
                            <div class="comment-text">
                              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim laborumab.
                                perspiciatis unde omnis iste natus error.
                              </p>
                            </div>
                          </div>
                        </article>
                        <ul class="children">
                          <li class="article_comments_wrap">
                            <article>
                              <div class="article_comments_thumb"><img data-src="{{ url('front/') }}/assets/img/user-4.jpg"
                                  alt=""></div>
                              <div class="comment-details">
                                <div class="comment-meta">
                                  <div class="comment-left-meta">
                                    <h4 class="author-name">Rosalina Kelian</h4>
                                    <div class="comment-date">19th May 2018</div>
                                  </div>
                                  <div class="comment-reply">
                                    <a href="#" class="reply"><span class="icons"><i class="ti-back-left"></i></span>
                                      Reply</a>
                                  </div>
                                </div>
                                <div class="comment-text">
                                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim laborumab.
                                    perspiciatis unde omnis iste natus error.
                                  </p>
                                </div>
                              </div>
                            </article>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="article_comments_wrap">
                    <article>
                      <div class="article_comments_thumb"><img data-src="{{ url('front/') }}/assets/img/user-5.jpg" alt="">
                      </div>
                      <div class="comment-details">
                        <div class="comment-meta">
                          <div class="comment-left-meta">
                            <h4 class="author-name">Rosalina Kelian</h4>
                            <div class="comment-date">19th May 2018</div>
                          </div>
                          <div class="comment-reply">
                            <a href="#" class="reply"><span class="icons"><i class="ti-back-left"></i></span> Reply</a>
                          </div>
                        </div>
                        <div class="comment-text">
                          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim laborumab.
                            perspiciatis unde omnis iste natus error.
                          </p>
                        </div>
                      </div>
                    </article>
                  </li>
                </ul>
              </div>
            </div>
            <div class="comment-box submit-form">
              <h3 class="reply-title">Post Comment</h3>
              <div class="comment-form">
                <form action="#">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group"><input type="text" class="form-control" placeholder="Your Name"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group"><input type="text" class="form-control" placeholder="Your Email"></div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group"><textarea name="comment" class="form-control" cols="30" rows="6"
                          placeholder="Type your comments...."></textarea></div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group"><a href="#" class="btn search-btn">Submit Now</a></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> --}}
        </div>
        <!-- Single blog Grid -->
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">

          <!-- Categories -->
          <div class="single_widgets widget_category">
            <h4 class="title">Categories</h4>
            <ul>
              @foreach ($categories as $row)
                <li><a href="{{ url('articles/' . $row->category_slug) }}">{{ $row->category_name }} </a></li>
              @endforeach
            </ul>
          </div>
          <!-- Trending Posts -->
          <div class="single_widgets widget_thumb_post">
            <h4 class="title mb-3">Trending Posts</h4>
            <ul>

              @foreach ($blogs as $row)
                <li>
                  <span class="left"><img data-src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->title }}"
                      class=""></span>
                  <span class="right">
                    <a class="feed-title" href="{{ url($row->slug) }}">{{ $row->title }}</a>
                    <span class="post-date"><i
                        class="ti-calendar"></i>{{ getFormattedDate($row->created_at, 'd M, Y') }}</span>
                  </span>
                </li>
              @endforeach

            </ul>
          </div>
          <!-- Tags Cloud -->

        </div>
      </div>
      <!-- /row -->
    </div>
  </section>
  <!-- Content -->
@endsection
