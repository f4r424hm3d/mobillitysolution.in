<?php

namespace App\Http\Controllers\old;

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
    return view('old.index')->with($data);
  }
  public function whatMakeUsDifferent(Request $request)
  {
    return view('old.what-make-us-different');
  }
  public function privacyPolicy(Request $request)
  {
    return view('old.privacy-policy');
  }
  public function team(Request $request)
  {
    return view('old.team');
  }
}
