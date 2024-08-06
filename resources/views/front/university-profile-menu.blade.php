@php
$page = Request::segment(2);
@endphp
<div data-gssticky="1" class="addSticky">
<div class="container">
  <div class="new-links">
    <ul class="vertically-scrollbar">
      <li class="{{ $page==''?'active':'' }}"><a href="{{ url($university->slug) }}">Overview</a></li>
      @if ($university->getPrograms->count()>0)
      <li class="{{ $page=='courses'?'active':'' }}">
        <a href="{{ url($university->slug.'/courses') }}">Courses & Fees</a>
      </li>
      @endif
      @foreach ($university->getAllTabContent as $tabS)
      <li class="{{ $page==$tabS->tab_slug?'active':'' }}">
        <a href="{{ url($university->slug.'/'.$tabS->tab_slug) }}">
          {{ $tabS->tab_name }}
        </a>
      </li>
      @endforeach
      @if ($university->getPhotos->count()>0)
      <li><a href="{{ url($university->slug) }}#photogallery">Gallery</a></li>
      @endif
      @if ($university->getScholarships->count()>0)
      <li class="{{ $page=='scholarship'?'active':'' }}">
        <a href="{{ url($university->slug.'/scholarship') }}">Scholarship</a>
      </li>
      @endif
      @if ($university->getReviews->count()>0)
      <li class="{{ $page=='reviews'?'active':'' }}"><a href="{{ url($university->slug.'/reviews') }}">Reviews</a></li>
      @endif
    </ul>
  </div>
</div>
</div>