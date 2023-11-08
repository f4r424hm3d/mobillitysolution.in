<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ContactFc extends Controller
{
  public function index(Request $request)
  {
    return view('front.contact');
  }
  public function enquiry(Request $request)
  {
    $categories = ProductCategory::all();
    $data = compact('categories');
    return view('front.enquiry')->with($data);
  }
  public function thankYou(Request $request)
  {
    return view('front.thank-you');
  }
}
