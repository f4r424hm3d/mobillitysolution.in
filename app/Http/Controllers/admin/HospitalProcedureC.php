<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\HospitalProcedure;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalProcedureC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $departments = Department::all();
    $procedures = Procedure::all();
    $rows = HospitalProcedure::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalProcedure::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/procedures/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/procedures');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/procedures/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's Procedures";
    $page_route = "hospital/procedures";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'procedures', 'page_no', 'departments');
    return view('admin.hospital-procedures')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'hospital_id' => 'required',
        'procedure_id.*' => 'required',
      ]
    );
    $doctors = $request['procedure_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($doctors); $i++) {
      $totalRows++;
      $chk = HospitalProcedure::where(['hospital_id' => $request['hospital_id'], 'procedure_id' => $doctors[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalProcedure;
        $field->hospital_id = $request['hospital_id'];
        $field->procedure_id = $doctors[$i];
        $field->save();
        $rowsInserted++;
      }
    }
    if ($rowsInserted > 0) {
      session()->flash('smsg', $rowsInserted . ' out of ' . $totalRows . ' records have been inserted succesfully.');
    } else {
      session()->flash('emsg', 'Data not inserted. Duplicate rows found.');
    }
    return redirect('admin/hospital/procedures');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = HospitalProcedure::find($id)->delete();
  }
  public function update($hospital_id, $id, Request $request)
  {
    $request->validate(
      [
        'hospital_id' => 'required',
        'procedure_id' => 'required',
      ]
    );
    $field = HospitalProcedure::find($id);
    $field->hospital_id = $request['hospital_id'];
    $field->procedure_id = $request['procedure_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital/procedures');
  }
  public function getData(Request $request)
  {
    $rows = HospitalProcedure::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/procedures/' . $request->hospital_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Hospital</th>
        <th>Department</th>
        <th>Procedure</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getHospital->hospital_name . '</td>
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
      'hospital_id' => 'required',
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
      $chk = HospitalProcedure::where(['hospital_id' => $request['hospital_id'], 'procedure_id' => $procedure_ids[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalProcedure;
        $field->hospital_id = $request['hospital_id'];
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
