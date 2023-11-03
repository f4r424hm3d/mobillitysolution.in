<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\DoctorProcedure;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorProcedureC extends Controller
{
  public function index($doctor_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $doctor = Doctor::find($doctor_id);
    $departments = Department::all();
    $procedures = Procedure::all();
    $rows = DoctorProcedure::where('doctor_id', $doctor_id)->get();
    if ($id != null) {
      $sd = DoctorProcedure::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/doctor/procedures/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/doctor/procedures');
      }
    } else {
      $ft = 'add';
      $url = url('admin/doctor/procedures/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Doctor's Procedures";
    $page_route = "doctor/procedures";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'doctor', 'procedures', 'page_no', 'departments');
    return view('admin.doctor-procedures')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = DoctorProcedure::find($id)->delete();
  }
  public function update($doctor_id, $id, Request $request)
  {
    $request->validate(
      [
        'doctor_id' => 'required',
        'procedure_id' => 'required',
      ]
    );
    $field = DoctorProcedure::find($id);
    $field->doctor_id = $request['doctor_id'];
    $field->procedure_id = $request['procedure_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/doctor/procedures');
  }
  public function getData(Request $request)
  {
    //return "hello";
    $rows = DoctorProcedure::where('id', '!=', '0');
    if ($request->has('doctor_id') && $request->doctor_id != '') {
      $rows = $rows->where('doctor_id', $request->doctor_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/doctor/procedures/' . $request->doctor_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Doctor</th>
        <th>Department</th>
        <th>Procedure</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getDoctor->name . '</td>
      <td>' . $row->getDepartment->department_name . '</td>
      <td>' . $row->getProcedure->procedure_name . '</td>
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
      'doctor_id' => 'required',
      'department_id' => 'required',
      'procedure_id.*' => 'required',
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $procedure_ids = $request['procedure_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($procedure_ids); $i++) {
      $totalRows++;
      $chk = DoctorProcedure::where(['doctor_id' => $request['doctor_id'], 'procedure_id' => $procedure_ids[$i]])->count();
      if ($chk == 0) {
        $field = new DoctorProcedure;
        $field->doctor_id = $request['doctor_id'];
        $field->department_id = $request['department_id'];
        $field->procedure_id = $procedure_ids[$i];
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
