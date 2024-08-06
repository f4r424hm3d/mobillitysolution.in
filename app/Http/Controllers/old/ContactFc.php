<?php

namespace App\Http\Controllers\old;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ContactFc extends Controller
{
  public function index(Request $request)
  {
    return view('old.contact');
  }
  public function enquiry(Request $request)
  {
    $categories = ProductCategory::all();
    $data = compact('categories');
    return view('old.enquiry')->with($data);
  }
  public function thankYou(Request $request)
  {
    return view('old.thank-you');
  }
}
