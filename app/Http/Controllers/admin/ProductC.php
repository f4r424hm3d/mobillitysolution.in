<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductC extends Controller
{
  public function index(Request $request, $id = null)
  {
    $categories = ProductCategory::all();
    $sub_categories = ProductSubCategory::all();
    $limit_per_page = $request->limit_per_page ?? 10;
    $order_by = $request->order_by ?? 'product_name';
    $order_in = $request->order_in ?? 'ASC';
    $page_no = $_GET['page'] ?? 1;

    $filterApplied = false;
    $rows = Product::orderBy($order_by, $order_in);
    if ($request->has('search') && $request->search != '') {
      $rows = $rows->where('product_name', 'like', '%' . $request->search . '%');
    } else {
      if ($request->has('category') && $request->category != '') {
        $rows = $rows->Where('category_id', $request->category);
        $filterApplied = true;
      }
      if ($request->has('sub_category') && $request->sub_category != '') {
        $rows = $rows->Where('sub_category_id', $request->sub_category);
        $filterApplied = true;
      }
    }
    $rows = $rows->paginate($limit_per_page)->withQueryString();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $lpp = ['10', '20', '50'];
    $orderColumns = ['Name' => 'name', 'Date' => 'created_at'];

    $filterCategories = Product::select('category_id')->groupBy('category_id')->orderBy('category_id')->get();

    $filterSubCategories = Product::select('sub_category_id')->groupBy('sub_category_id')->orderBy('sub_category_id')->where('sub_category_id', '!=', '');
    if ($request->has('category') && $request->category != '') {
      $filterSubCategories = $filterSubCategories->where('category_id', $request->category);
    }
    $filterSubCategories = $filterSubCategories->get();

    if ($id != null) {
      $sd = Product::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/products/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/products');
      }
    } else {
      $ft = 'add';
      $url = url('admin/products/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Products";
    $page_route = "products";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'i', 'page_title', 'page_route', 'page_no', 'categories', 'sub_categories', 'filterApplied', 'limit_per_page', 'order_by', 'order_in', 'lpp', 'orderColumns', 'filterCategories', 'filterSubCategories');
    return view('admin.products')->with($data);
  }
  public function store(Request $request)
  {
    $request->validate(
      [
        'product_name' => 'required|unique:products,product_name',
        'category_id' => 'required',
        'sub_category_id' => 'required',
        'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );

    $field = new Product;
    if ($request->hasFile('thumbnail_name')) {
      $fileOriginalName = $request->file('thumbnail_name')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail_name')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail_name')->move('uploads/products/', $file_name);
      if ($move) {
        $field->thumbnail_name = $file_name;
        $field->thumbnail_path = 'uploads/products/' . $file_name;
      }
    }
    $field->category_id = $request['category_id'];
    $field->sub_category_id = $request['sub_category_id'];
    $field->product_name = $request['product_name'];
    $field->product_slug = slugify($request['product_name']);
    //$field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record hase been added succesfully.');
    return redirect('admin/products');
  }
  public function delete($id)
  {
    if ($id) {
      $row = Product::findOrFail($id);
      if ($row->thumbnail_path != null) {
        unlink($row->thumbnail_path);
      }
      echo $result = $row->delete();
    }
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'product_name' => 'required|unique:products,product_name,' . $id,
        'category_id' => 'required',
        'sub_category_id' => 'required',
        'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );
    $field = Product::find($id);
    if ($request->hasFile('thumbnail_name')) {
      $fileOriginalName = $request->file('thumbnail_name')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail_name')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail_name')->move('uploads/products/', $file_name);
      if ($move) {
        if ($field->thumbnail_path != null && file_exists($field->thumbnail_path)) {
          unlink($field->thumbnail_path);
        }
        $field->thumbnail_name = $file_name;
        $field->thumbnail_path = 'uploads/products/' . $file_name;
      }
    }
    $field->category_id = $request['category_id'];
    $field->sub_category_id = $request['sub_category_id'];
    $field->product_name = $request['product_name'];
    $field->product_slug = slugify($request['product_name']);
    //$field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/products');
  }
  public function getSubCategoryByCategory(Request $request)
  {
    //echo $id;
    $field = Product::select('sub_category_id')->groupBy('sub_category_id')->orderBy('sub_category_id')->where('category_id', $request['category_id'])->get();
    $output = '<option value="">Select Sub Category</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->sub_category_id . '">' . $row->getSubCategory->sub_category_name . '</option>';
    }
    echo $output;
  }
}
