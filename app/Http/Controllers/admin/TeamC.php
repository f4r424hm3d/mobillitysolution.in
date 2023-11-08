<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamC extends Controller
{
  public function __construct()
  {
    $this->page_route = 'team';
  }
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = Team::get();
    if ($id != null) {
      $sd = Team::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/team/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/team');
      }
    } else {
      $ft = 'add';
      $url = url('admin/team/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Team";
    $page_route = "team";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.team')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Team::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/team/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    if ($rows->count() > 0) {
      foreach ($rows as $row) {
        $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->name . '</td>
      <td>' . $row->designation . '</td>
      <td>';

        if ($row->photo_path != null) {
          $output .= '<img src="' . asset($row->photo_path) . '" height="40" weight="40">';
        } else {
          $output .= 'N/A';
        }

        $output .= '</td><td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/team/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
      </td>
    </tr>';
        $i++;
      }
    } else {
      $output .= '<tr><td colspan="8"><center>No data found</center></td></tr>';
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'designation' => 'required',
      'photo' => 'required|max:5000|mimes:jpg,jpeg,png,gif,webp',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Team;
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/team/', $file_name);
      if ($move) {
        $field->photo = $file_name;
        $field->photo_path = 'uploads/team/' . $file_name;
      }
    }
    $field->name = $request['name'];
    $field->designation = $request['designation'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    if ($id) {
      $row = Team::findOrFail($id);
      if ($row->photo_path != null) {
        unlink($row->photo_path);
      }
      echo $result = $row->delete();
    }
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'designation' => 'required',
        'photo' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );
    $field = Team::find($id);
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/team/', $file_name);
      if ($move) {
        if ($field->photo_path != null) {
          unlink($field->photo_path);
        }
        $field->photo = $file_name;
        $field->photo_path = 'uploads/team/' . $file_name;
      }
    }
    $field->name = $request['name'];
    $field->designation = $request['designation'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/team');
  }
}
