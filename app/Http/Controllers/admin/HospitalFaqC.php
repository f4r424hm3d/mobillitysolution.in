<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\HospitalFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalFaqC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $rows = HospitalFaq::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalFaq::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/faqs/' . $hospital_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/faqs');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/faqs/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's Faqs";
    $page_route = "hospital/faqs";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'page_no');
    return view('admin.hospital-faqs')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = HospitalFaq::find($id)->delete();
  }
  public function update($hospital_id, $id, Request $request)
  {
    $request->validate(
      [
        'hospital_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );
    $field = HospitalFaq::find($id);
    $field->hospital_id = $request['hospital_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital/faqs/' . $hospital_id);
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = HospitalFaq::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/faqs/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Hospital</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getHospital->hospital_name . '</td>
      <td>' . $row->question . '</td>
      <td>' . $row->answer . '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/hospital/faqs/" . $row->hospital_id . "/update/" . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info">
        <i class="fa fa-edit" aria-hidden="true"></i>
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
        'question' => 'required',
        'answer' => 'required',
      ]
    );

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new HospitalFaq;
    $field->hospital_id = $request['hospital_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    return response()->json(['success' => 'Record has been inserted succesfully.']);
  }
}
