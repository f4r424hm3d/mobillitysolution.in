<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductGalleryC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'product-gallery';
  }
  public function index(Request $request, $product_id, $id = null)
  {
    $product = Product::find($product_id);
    $page_no = $_GET['page'] ?? 1;
    $rows = ProductGallery::where('product_id', $product_id)->get();
    if ($id != null) {
      $sd = ProductGallery::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/' . $product_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route . '/' . $product_id);
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Product Gallery";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'product_id', 'product');
    return view('admin.product-gallery')->with($data);
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'product_id' => 'required',
      'title' => 'required',
      'files.*' => 'required|max:5000|mimes:jpg,jpeg,png,gif',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    foreach ($request->file('files') as $file) {
      $field = new ProductGallery;
      $field->product_id = $request['product_id'];
      $field->title = $request['title'];

      $fileOriginalName = $file->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $file->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $file->move('uploads/files/', $file_name);

      if ($move) {
        $field->file_name = $file_name;
        $field->file_path = 'uploads/files/' . $file_name;
        $field->save();
      }
    }

    return response()->json(['success' => 'Records inserted successfully.']);
  }

  public function delete($id)
  {
    if ($id) {
      $row = ProductGallery::findOrFail($id);
      if ($row->file_path != null) {
        unlink($row->file_path);
      }
      echo $result = $row->delete();
    }
  }
  public function update($product_id, $id, Request $request)
  {
    $request->validate(
      [
        'product_id' => 'required',
        'title' => 'required',
        'file' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif',
      ]
    );
    $field = ProductGallery::find($id);
    $field->product_id = $request['product_id'];
    $field->title = $request['title'];
    if ($request->hasFile('files')) {
      $fileOriginalName = $request->file('files')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('files')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('files')->move('uploads/files/', $file_name);
      if ($move) {
        unlink($field->file_path);
        $field->file_name = $file_name;
        $field->file_path = 'uploads/files/' . $file_name;
      }
    }
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route . '/' . $product_id);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = ProductGallery::where('product_id', $request->product_id)->paginate(10)->withPath('/admin/' . $this->page_route . '/' . $request->product_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Title</th>
        <th>File</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row'
        . $row->id . '">
            <td>' . $i . '</td>
            <td>' . $row->title . '</td>
            <td>';
      if ($row->file_path != null) {
        $output .= '<a target="blank" href="' . asset($row->file_path) . '"><img src="' . asset($row->file_path) . '" height="20" weight="20"></a>';
      } else {
        $output .= 'N/A';
      }
      $output .= '</td>
            <td>
              <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
                class="waves-effect waves-light btn btn-xs btn-outline btn-danger"><i class="fa fa-trash"
                  aria-hidden="true"></i></a>
              <a href="' . url('admin/' . $this->page_route . '/' . $request->product_id . '/update/' . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info"><i
                  class="fa fa-edit" aria-hidden="true"></i></a>
            </td>
          </tr>';
      $i++;
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
}
