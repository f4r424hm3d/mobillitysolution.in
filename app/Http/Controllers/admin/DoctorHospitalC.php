<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\HospitalDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorHospitalC extends Controller
{
  public function index($doctor_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $doctor = Doctor::find($doctor_id);
    $hospitals = Hospital::all();
    $rows = HospitalDoctor::where('doctor_id', $doctor_id)->get();
    if ($id != null) {
      $sd = HospitalDoctor::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/doctor/hospitals/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/doctor/hospitals');
      }
    } else {
      $ft = 'add';
      $url = url('admin/doctor/hospitals/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Doctor's Hospitals";
    $page_route = "doctor/hospitals";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'doctor', 'hospitals', 'page_no');
    return view('admin.doctor-hospitals')->with($data);
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
    return redirect('admin/doctor/hospitals');
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = HospitalDoctor::where('id', '!=', '0');
    if ($request->has('doctor_id') && $request->doctor_id != '') {
      $rows = $rows->where('doctor_id', $request->doctor_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/doctor/hospitals/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Doctor</th>
        <th>Hospital</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getDoctor->name . '</td>
      <td>' . $row->getHospital->hospital_name . '</td>
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
      'hospital_id.*' => 'required',
      'doctor_id' => 'required',
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $hospitals = $request['hospital_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($hospitals); $i++) {
      $totalRows++;
      $chk = HospitalDoctor::where(['doctor_id' => $request['doctor_id'], 'hospital_id' => $hospitals[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalDoctor;
        $field->doctor_id = $request['doctor_id'];
        $field->hospital_id = $hospitals[$i];
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
