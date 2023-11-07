<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
  public function getSubStatusByStatus(Request $request)
  {
    //echo $id;
    $field = DB::table('lead_sub_statuses')->where('status_id', $request['status_id'])->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->sub_status . '</option>';
    }
    echo $output;
  }
  public function changeStatus(Request $request)
  {
    echo $result = DB::table($request->tbl)->where('id', $request->id)->update(['status' => $request->val]);
  }
  public function updateField(Request $request)
  {
    echo $result = DB::table($request->tbl)->whereIn('id', $request->ids)->update([$request->col => $request->val]);
  }
  public function updateFieldById(Request $request)
  {
    echo $result = DB::table($request->tbl)->where('id', $request->id)->update([$request->col => $request->val]);
  }
  public function updateBulkField(Request $request)
  {
    echo $result = DB::table($request->tbl)->whereIn('id', $request->ids)->update([$request->col => $request->val]);
  }
  public function getSubCategoryByCategory(Request $request)
  {
    //echo $id;
    $field = DB::table('product_sub_categories')->where('category_id', $request['category_id'])->get();
    $output = '<option value="">Select Sub Category</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->sub_category_name . '</option>';
    }
    echo $output;
  }
}
