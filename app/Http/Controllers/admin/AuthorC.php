<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = Author::get();
    if ($id != null) {
      $sd = Author::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/authors/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/authors');
      }
    } else {
      $ft = 'add';
      $url = url('admin/authors/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Authors";
    $page_route = "authors";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.authors')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Author::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/authors/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Info</th>
        <th>Shortnote</th>
        <th>Details</th>
        <th>Pic</th>
        <th>SEO</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    if ($rows->count() > 0) {
      foreach ($rows as $row) {
        $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->author_name . '<br>' . $row->email . '<br>' . $row->mobile . '</td>
      <td>';
        if ($row->shortnote != null) {
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
                            ' . $row->shortnote . '
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
        $output .= '</td>
      <td>';
        if ($row->highlights != null) {
          $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#descModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="descModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="DescModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="DescModalScrollableTitle' . $row->id . '">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ' . $row->highlights . ' <br>
                            ' . $row->experiance . ' <br>
                            ' . $row->education . '
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
        $output .= '</td>
      <td>';
        if ($row->profile_pic_path != null) {
          $output .= '<img src="' . asset($row->profile_pic_path) . '" alt="" height="80" width="80">';
        } else {
          $output .= 'N/A';
        }
        $output .= '</td>
      <td>';
        if ($row->meta_title != null) {
          $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#SeoModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="SeoModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="SeoModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="SeoModalScrollableTitle' . $row->id . '">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ' . $row->meta_title . '<br>
                            ' . $row->meta_keyword . ' <br>
                            ' . $row->meta_description . ' <br>
                            ' . $row->page_content . ' <br>
                            ' . $row->seo_rating . '
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
        $output .= '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/authors/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
      </td>
    </tr>';
        $i++;
      }
    } else {
      $output .= '<tr><td colspan="7"><center>No Data Found</center></td></tr>';
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'author_name' => 'required|unique:authors,author_name',
      'profile_pic' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif',
    ]);

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Author;
    if ($request->hasFile('profile_pic')) {
      $fileOriginalName = $request->file('profile_pic')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('profile_pic')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('profile_pic')->move('uploads/authors/', $file_name);
      if ($move) {
        $field->profile_pic = $file_name;
        $field->profile_pic_path = 'uploads/authors/' . $file_name;
      }
    }
    $field->author_name = $request['author_name'];
    $field->author_slug = slugify($request['author_name']);
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->shortnote = $request['shortnote'];
    $field->highlights = $request['highlights'];
    $field->experiance = $request['experiance'];
    $field->education = $request['education'];
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
    echo $result = Author::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'author_name' => 'required|unique:authors,author_name,' . $id,
        'profile_pic' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif',
      ]
    );
    $field = Author::find($id);
    if ($request->hasFile('profile_pic')) {
      $fileOriginalName = $request->file('profile_pic')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('profile_pic')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('profile_pic')->move('uploads/authors/', $file_name);
      if ($move) {
        $field->profile_pic = $file_name;
        $field->profile_pic_path = 'uploads/authors/' . $file_name;
      }
    }
    $field->author_name = $request['author_name'];
    $field->author_slug = slugify($request['author_name']);
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->shortnote = $request['shortnote'];
    $field->highlights = $request['highlights'];
    $field->experiance = $request['experiance'];
    $field->education = $request['education'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/authors');
  }
}
