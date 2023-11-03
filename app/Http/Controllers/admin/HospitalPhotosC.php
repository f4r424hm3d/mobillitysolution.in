<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\HospitalPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalPhotosC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $rows = HospitalPhotos::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalPhotos::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/photos/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/photos');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/photos/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's Photos";
    $page_route = "hospital/photos";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'page_no');
    return view('admin.hospital-photos')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = HospitalPhotos::find($id)->delete();
  }
  public function update($hospital_id, $id, Request $request)
  {
    $request->validate(
      [
        'hospital_id' => 'required',
        'doctor_id' => 'required',
      ]
    );
    $field = HospitalPhotos::find($id);
    $field->hospital_id = $request['hospital_id'];
    $field->doctor_id = $request['doctor_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital/photos');
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = HospitalPhotos::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/photos/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Hospital</th>
        <th>Title</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getHospital->hospital_name . '</td>
      <td>' . $row->title . '</td>
      <td><a target="_blank" href="' . url($row->photo_path) . '"><img src="' . asset($row->photo_path) . '" height="40" width="40"></a></td>
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
    //return $request->toArray();
    $validator = Validator::make(
      $request->all(),
      [
        'hospital_id' => 'required',
        'title' => 'required',
        'photo.*' => 'required|max:1000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $rowsInserted = 0;
    $totalRows = 0;
    if ($request->hasFile('photo')) {
      foreach ($request->file('photo') as $key => $file) {
        $totalRows++;
        $field = new HospitalPhotos;
        $field->hospital_id = $request['hospital_id'];
        $field->title = $request['title'];
        $fileOriginalName = $file->getClientOriginalName();
        $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
        $file_name_slug = slugify($fileNameWithoutExtention);
        $file_name = $file_name_slug . '-' . time() . '.' . $file->getClientOriginalExtension();
        $move = $file->move('uploads/hospital/photos/', $file_name);
        if ($move) {
          $field->photo_name = $file_name;
          $field->photo_path = 'uploads/hospital/photos/' . $file_name;
        } else {
          session()->flash('emsg', 'Images not uploaded.');
        }
        $done = $field->save();
        if ($done) {
          $rowsInserted++;
        }
      }
    }
    if ($rowsInserted > 0) {
      return response()->json(['success' => $rowsInserted . ' out of ' . $totalRows . ' records have been inserted succesfully.']);
    } else {
      return response()->json(['failed' => 'Data not inserted. Duplicate rows found.']);
    }
  }
}
