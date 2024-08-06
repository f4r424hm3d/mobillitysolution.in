<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\HomePageBanner;
use Illuminate\Http\Request;

class HomeFc extends Controller
{
  public function index(Request $request)
  {
    $banners = HomePageBanner::whereStatus(1)->get();
    $blogs = Blog::limit(2)->orderBy('id', 'desc')->get();
    $data = compact('blogs', 'banners');
    return view('front.index')->with($data);
  }
  public function privacyPolicy(Request $request)
  {
    return view('front.privacy-policy');
  }
  public function team(Request $request)
  {
    return view('front.team');
  }
}
