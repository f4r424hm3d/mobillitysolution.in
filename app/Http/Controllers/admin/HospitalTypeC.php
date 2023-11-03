<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalTypeC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = HospitalType::get();
    if ($id != null) {
      $sd = HospitalType::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital-types/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital-types');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital-types/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital Type";
    $page_route = "hospital-types";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.hospital-types')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = HospitalType::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/hospital-types/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Id</th>
        <th>Hospital type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->id . '</td>
      <td>' . $row->hospital_type . '</td>';
      $output .= '<td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/hospital-types/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
      </td>
    </tr>';
      $i++;
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'hospital_type' => 'required|unique:hospital_types,hospital_type'
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new HospitalType;
    $field->hospital_type = $request['hospital_type'];
    $field->hospital_type_slug = slugify($request['hospital_type']);
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = HospitalType::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'hospital_type' => 'required|unique:hospital_types,hospital_type,' . $id,
      ]
    );
    $field = HospitalType::find($id);
    $field->hospital_type = $request['hospital_type'];
    $field->hospital_type_slug = slugify($request['hospital_type']);
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital-types');
  }
}
