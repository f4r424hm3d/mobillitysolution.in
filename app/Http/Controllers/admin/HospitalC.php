<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\HospitalImport;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\HospitalType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HospitalC extends Controller
{
  public function index($id = null)
  {
    $types = HospitalType::get();
    $countries = Country::get();
    $rows = Hospital::get();
    if ($id != null) {
      $sd = Hospital::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospitals/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospitals');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospitals/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospitals";
    $page_route = "hospitals";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'countries', 'types');
    return view('admin.hospitals')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'hospital_name' => 'required|unique:hospitals,hospital_name',
        'logo' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif'
      ]
    );
    $field = new Hospital;
    if ($request->hasFile('logo')) {
      $fileOriginalName = $request->file('logo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('logo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('logo')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->logo_name = $file_name;
        $field->logo_path = 'uploads/hospital/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('banner')) {
      $fileOriginalName = $request->file('banner')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('banner')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('banner')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->banner_name = $file_name;
        $field->banner_path = 'uploads/hospital/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->thumbnail = 'uploads/hospital/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->hospital_name = $request['hospital_name'];
    $field->hospital_slug = slugify($request['hospital_name']);
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->pincode = $request['pincode'];
    $field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->facilities = $request['facilities'];
    $field->established_in = $request['established_in'];
    $field->number_of_bed = $request['number_of_bed'];
    $field->hospital_type_id = $request['hospital_type_id'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/hospitals');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Hospital::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'hospital_name' => 'required|unique:hospitals,hospital_name,' . $id,
      ]
    );
    $field = Hospital::find($id);
    if ($request->hasFile('logo')) {
      $fileOriginalName = $request->file('logo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('logo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('logo')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->logo_name = $file_name;
        $field->logo_path = 'uploads/hospital/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('banner')) {
      $fileOriginalName = $request->file('banner')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('banner')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('banner')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->banner_name = $file_name;
        $field->banner_path = 'uploads/hospital/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->thumbnail = 'uploads/hospital/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->hospital_name = $request['hospital_name'];
    $field->hospital_slug = slugify($request['hospital_name']);
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->pincode = $request['pincode'];
    $field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->facilities = $request['facilities'];
    $field->established_in = $request['established_in'];
    $field->number_of_bed = $request['number_of_bed'];
    $field->hospital_type_id = $request['hospital_type_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospitals');
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
        $result = Excel::import(new HospitalImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/hospitals');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
  public function profile($hospital_id)
  {
    $hospital = Hospital::find($hospital_id);
    $page_title = "Hospital Profile";
    $page_route = "hospital/profile/" . $hospital_id;
    $data = compact('hospital', 'page_title', 'page_route');
    return view('admin.hospital-profile')->with($data);
  }
}
