<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\HospitalDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalDoctorC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $doctors = Doctor::all();
    $rows = HospitalDoctor::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalDoctor::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/doctors/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/doctors');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/doctors/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's Doctor";
    $page_route = "hospital/doctors";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'doctors', 'page_no');
    return view('admin.hospital-doctors')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'hospital_id' => 'required',
        'doctor_id.*' => 'required',
      ]
    );
    $doctors = $request['doctor_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($doctors); $i++) {
      $totalRows++;
      $chk = HospitalDoctor::where(['hospital_id' => $request['hospital_id'], 'doctor_id' => $doctors[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalDoctor;
        $field->hospital_id = $request['hospital_id'];
        $field->doctor_id = $doctors[$i];
        $field->save();
        $rowsInserted++;
      }
    }
    if ($rowsInserted > 0) {
      session()->flash('smsg', $rowsInserted . ' out of ' . $totalRows . ' records have been inserted succesfully.');
    } else {
      session()->flash('emsg', 'Data not inserted. Duplicate rows found.');
    }
    return redirect('admin/hospital/doctors');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = HospitalDoctor::find($id)->delete();
  }
  public function update($hospital_id, $id, Request $request)
  {
    $request->validate(
      [
        'hospital_id' => 'required',
        'doctor_id' => 'required',
      ]
    );
    $field = HospitalDoctor::find($id);
    $field->hospital_id = $request['hospital_id'];
    $field->doctor_id = $request['doctor_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital/doctors');
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = HospitalDoctor::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/doctors/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Hospital</th>
        <th>Doctor</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getHospital->hospital_name . '</td>
      <td>' . $row->getDoctor->name . '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
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
      'hospital_id' => 'required',
      'doctor_id.*' => 'required',
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $doctors = $request['doctor_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($doctors); $i++) {
      $totalRows++;
      $chk = HospitalDoctor::where(['hospital_id' => $request['hospital_id'], 'doctor_id' => $doctors[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalDoctor;
        $field->hospital_id = $request['hospital_id'];
        $field->doctor_id = $doctors[$i];
        $field->save();
        $rowsInserted++;
      }
    }
    if ($rowsInserted > 0) {
      return response()->json(['success' => $rowsInserted . ' out of ' . $totalRows . ' records have been inserted succesfully.']);
    } else {
      return response()->json(['failed' => 'Data not inserted. Duplicate rows found.']);
    }
  }
}
