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
  public function index($id = null)
  {
    $categories = ProductCategory::all();
    $sub_categories = ProductSubCategory::all();
    $page_no = $_GET['page'] ?? 1;
    $rows = Product::get();
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
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no', 'categories', 'sub_categories');
    return view('admin.products')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Product::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/products/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Product</th>
        <th>Sub Category</th>
        <th>Category</th>
        <th>Thumbnail</th>
        <th>Content</th>
        <th>SEO</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    if ($rows->count() > 0) {
      foreach ($rows as $row) {
        $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->product_name . '</td>
      <td>' . $row->getSubCategory->sub_category_name . '</td>
      <td>' . $row->getCategory->category_name . '</td>
      <td>';

        if ($row->thumbnail_path != null) {
          $output .= '<img src="' . asset($row->thumbnail_path) . '" height="40" weight="40">';
        } else {
          $output .= 'N/A';
        }

        $output .= '</td><td>';

        if ($row->description != null) {
          $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#ContModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="ContModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="ConModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ConModalScrollableTitle' . $row->id . '">
                              Content
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h2>Description</h2>
                            ' . $row->description . ' <br>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>';
        } else {
          $output .= 'N/A';
        }

        $output .= '</td><td>';

        if ($row->meta_title != null) {
          $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#SeoModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="SeoModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="SeoModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="SeoModalScrollableTitle' . $row->id . '">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ' . $row->meta_title . '<br>
                            ' . $row->meta_keyword . ' <br>
                            ' . $row->meta_description . ' <br>
                            ' . $row->page_content . ' <br>
                            ' . $row->seo_rating . '
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>';
        } else {
          $output .= 'N/A';
        }

        $output .= '</td><td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/products/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
      </td>
    </tr>';
        $i++;
      }
    } else {
      $output .= '<tr><td colspan="8"><center>No data found</center></td></tr>';
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'product_name' => 'required|unique:products,product_name',
      'category_id' => 'required',
      'sub_category_id' => 'required',
      'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp',
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

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
    return response()->json(['success' => 'Record hase been added succesfully.']);
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
        if ($field->thumbnail_path != null) {
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
}
