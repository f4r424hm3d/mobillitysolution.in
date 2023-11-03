<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\DoctorImport;
use App\Models\Country;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DoctorC extends Controller
{
  public function index($id = null)
  {
    $countries = Country::get();
    $departments = Department::get();
    $specializations = Specialization::all();
    $rows = Doctor::get();
    if ($id != null) {
      $sd = Doctor::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/doctors/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/doctors');
      }
    } else {
      $ft = 'add';
      $url = url('admin/doctors/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Doctors";
    $page_route = "doctors";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'departments', 'countries', 'specializations');
    return view('admin.doctors')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required',
        'department_id' => 'required',
      ]
    );
    $field = new Doctor;
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/doctors/', $file_name);
      if ($move) {
        $field->photo_name = $file_name;
        $field->photo_path = 'uploads/doctors/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->name = $request['name'];
    $field->slug = slugify($request['name']);
    $field->qualification = $request['qualification'];
    $field->specialization_id = $request['specialization_id'];
    $field->designation = $request['designation'];
    $field->department_id = $request['department_id'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->overview = $request['overview'];
    $field->experience = $request['experience'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/doctors');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Doctor::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'department_id' => 'required',
      ]
    );

    $field = Doctor::find($id);
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/doctors/', $file_name);
      if ($move) {
        $field->photo_name = $file_name;
        $field->photo_path = 'uploads/doctors/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->name = $request['name'];
    $field->slug = slugify($request['name']);
    $field->qualification = $request['qualification'];
    $field->specialization_id = $request['specialization_id'];
    $field->designation = $request['designation'];
    $field->department_id = $request['department_id'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->overview = $request['overview'];
    $field->experience = $request['experience'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/doctors');
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
        $result = Excel::import(new DoctorImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/doctors');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
  public function profile($doctor_id)
  {
    $doctor = Doctor::find($doctor_id);
    $page_title = "Doctor Profile";
    $page_route = "doctor/profile/" . $doctor_id;
    $data = compact('doctor', 'page_title', 'page_route');
    return view('admin.doctor-profile')->with($data);
  }
}
