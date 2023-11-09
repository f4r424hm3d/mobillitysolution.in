<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomePageBannerC extends Controller
{
  public function __construct()
  {
    $this->page_route = 'home-page-banner';
  }
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = HomePageBanner::get();
    if ($id != null) {
      $sd = HomePageBanner::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route);
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "HomePageBanner";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.home-page-banner')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = HomePageBanner::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/' . $this->page_route);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Heading</th>
        <th>Shortnote</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    if ($rows->count() > 0) {
      foreach ($rows as $row) {
        $class = $row->status == 1 ? 'success' : 'danger';
        $status = $row->status == 1 ? 'Active' : 'Inactive';
        $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->heading . '</td>
      <td>' . $row->shortnote . '</td>
      <td>';
        if ($row->banner_path != null) {
          $output .= '<img src="' . asset($row->banner_path) . '" height="40" weight="40">';
        } else {
          $output .= 'N/A';
        }
        $output .= '</td>
      <td>
        <span class="badge bg-' . $class . '" onclick="changeStatus(' . $row->id . ')">' . $status . '</span>
      </td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/" . $this->page_route . "/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
      </td>
    </tr>';
        $i++;
      }
    } else {
      $output .= '<tr><td colspan="6"><center>No data found</center></td></tr>';
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'heading' => 'required',
      'shortnote' => 'required',
      'banner' => 'required||max:5000|mimes:jpg,jpeg,png,gif,webp',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new HomePageBanner;
    if ($request->hasFile('banner')) {
      $fileOriginalName = $request->file('banner')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('banner')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('banner')->move('uploads/banner/', $file_name);
      if ($move) {
        $field->banner = $file_name;
        $field->banner_path = 'uploads/banner/' . $file_name;
      }
    }
    $field->heading = $request['heading'];
    $field->shortnote = $request['shortnote'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    if ($id) {
      $row = HomePageBanner::findOrFail($id);
      if ($row->banner_path != null) {
        unlink($row->banner_path);
      }
      echo $result = $row->delete();
    }
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'heading' => 'required',
        'shortnote' => 'required',
        'banner' => 'required||max:5000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );
    $field = HomePageBanner::find($id);
    if ($request->hasFile('banner')) {
      $fileOriginalName = $request->file('banner')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('banner')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('banner')->move('uploads/banner/', $file_name);
      if ($move) {
        if ($field->banner_path != null) {
          unlink($field->banner_path);
        }
        $field->banner = $file_name;
        $field->banner_path = 'uploads/banner/' . $file_name;
      }
    }
    $field->heading = $request['heading'];
    $field->shortnote = $request['shortnote'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route);
  }
}
