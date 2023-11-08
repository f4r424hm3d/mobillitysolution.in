<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeFc extends Controller
{
  public function index(Request $request)
  {
    $blogs = Blog::limit(2)->orderBy('id', 'desc')->get();
    $data = compact('blogs');
    return view('front.index')->with($data);
  }
  public function whatMakeUsDifferent(Request $request)
  {
    return view('front.what-make-us-different');
  }
  public function privacyPolicy(Request $request)
  {
    return view('front.privacy-policy');
  }
}
