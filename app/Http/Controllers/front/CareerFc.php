<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DynamicPageSeo;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class CareerFc extends Controller
{
  public function index(Request $request)
  {
    $jobs = JobVacancy::whereStatus(1)->get();
    $data = compact('jobs');
    return view('front.career')->with($data);
  }
  public function jobDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = JobVacancy::where('slug', $slug)->firstOrFail();

    $page_url = url()->current();

    $wrdseo = ['url' => 'job-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $title = $row->category_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $row->meta_title == '' ? $dseo->meta_title : $row->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $row->meta_keyword == '' ? $dseo->meta_keyword : $row->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $row->page_content == '' ? $dseo->page_content : $row->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $row->meta_description == '' ? $dseo->meta_description : $row->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $row->thumbnail_path == '' ? $dseo->og_image_path : $row->thumbnail_path;

    $data = compact('row', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('front.job-details')->with($data);
  }
}
