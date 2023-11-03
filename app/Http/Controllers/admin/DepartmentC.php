<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\DepartmentImport;
use App\Models\Department;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentC extends Controller
{
  public function index($id = null)
  {
    $rows = Department::get();
    if ($id != null) {
      $sd = Department::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/departments/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/departments');
      }
    } else {
      $ft = 'add';
      $url = url('admin/departments/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Departments";
    $page_route = "departments";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route');
    return view('admin.departments')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'department_name' => 'required|unique:departments,department_name',
      ]
    );
    $field = new Department;
    $field->department_name = $request['department_name'];
    $field->department_slug = slugify($request['department_name']);
    $field->about = $request['about'];
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/departments');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Department::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'department_name' => 'required|unique:departments,department_name,' . $id,
      ]
    );

    $field = Department::find($id);
    $field->department_name = $request['department_name'];
    $field->department_slug = slugify($request['department_name']);
    $field->about = $request['about'];
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/departments');
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
        $result = Excel::import(new DepartmentImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/departments');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
}
