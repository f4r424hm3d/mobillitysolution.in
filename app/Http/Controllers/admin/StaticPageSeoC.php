<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPageSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaticPageSeoC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = StaticPageSeo::get();
    if ($id != null) {
      $sd = StaticPageSeo::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/static-page-seo/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/static-page-seo');
      }
    } else {
      $ft = 'add';
      $url = url('admin/static-page-seo/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Static Page Seo";
    $page_route = "static-page-seo";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.static-page-seo')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = StaticPageSeo::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/static-page-seo/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>URL</th>
        <th>Title</th>
        <th>Keyword</th>
        <th>Content</th>
        <th>Description</th>
        <th>SEO Rating</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->url . '</td>
      <td>' . $row->meta_title . '</td>
      <td>' . $row->meta_keyword . '</td>
      <td>' . $row->page_content . '</td>
      <td>';
      if ($row->meta_description != null) {
        $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#ShortnoteModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="ShortnoteModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="ShortnoteModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ShortnoteModalScrollableTitle' . $row->id . '">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ' . $row->meta_description . '
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>';
      } else {
        $output .= 'Null';
      }
      $output .= '</td><td>' . $row->seo_rating . '</td>';



      $output .= '<td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/static-page-seo/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
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
    $validator = Validator::make($request->all(), [
      'url' => 'required|unique:static_page_seos,url',
      'seo_rating' => 'nullable|numeric',
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new StaticPageSeo;
    $field->url = $request['url'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = StaticPageSeo::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'url' => 'required|unique:static_page_seos,url,' . $id,
        'seo_rating' => 'nullable|numeric',
      ]
    );
    $field = StaticPageSeo::find($id);
    $field->url = $request['url'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/static-page-seo');
  }
}
