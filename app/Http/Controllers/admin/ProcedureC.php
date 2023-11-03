<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ProcedureImport;
use App\Models\Department;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProcedureC extends Controller
{
  public function index($id = null)
  {
    $departments = Department::get();
    $rows = Procedure::get();
    if ($id != null) {
      $sd = Procedure::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/procedures/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/procedures');
      }
    } else {
      $ft = 'add';
      $url = url('admin/procedures/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Procedures";
    $page_route = "procedures";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'departments');
    return view('admin.procedures')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'department_id' => 'required',
        'procedure_name' => 'required|unique:procedures,procedure_name',
      ]
    );
    $field = new Procedure;
    $field->department_id = $request['department_id'];
    $field->procedure_name = $request['procedure_name'];
    $field->procedure_slug = slugify($request['procedure_name']);
    $field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/procedures');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Procedure::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'department_id' => 'required',
        'procedure_name' => 'required|unique:procedures,procedure_name,' . $id,
      ]
    );

    $field = Procedure::find($id);
    $field->department_id = $request['department_id'];
    $field->procedure_name = $request['procedure_name'];
    $field->procedure_slug = slugify($request['procedure_name']);
    $field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/procedures');
  }
  public function Import(Request $request)
  {
    // printArray($data->all());
    // die;
    $request->validate([
      'file' => 'required|mimes:xlsx,csv,xls'
    ]);
    $file = $request->file;
    if ($file) {
      try {
        $result = Excel::import(new ProcedureImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/procedures');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
  public function getProcedureByDep(Request $request)
  {
    $procedures = Procedure::where('department_id', $request->department_id)->get();
    //return json_encode($procedures);
    //$output = '<option value="">Select</option>';
    $output = '';
    foreach ($procedures as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->procedure_name . '</option>';
    }
    return $output;
  }
}
