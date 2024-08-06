<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class AjaxFc extends Controller
{
  public function getSubCategories(Request $request)
  {
    $field = ProductSubCategory::where('category_id', $request['category_id'])->get();
    $output = '<option value="">Select Sub Category</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->sub_category_name . '</option>';
    }
    echo $output;
  }

  public function getProducts(Request $request)
  {
    $field = Product::where('sub_category_id', $request->sub_category_id)->get();
    $output = '<option value="">Select Product</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->product_name . '</option>';
    }
    echo $output;
  }
}
