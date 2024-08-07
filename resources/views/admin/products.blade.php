@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ url('/admin/') }}"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <!-- NOTIFICATION FIELD START -->
          <x-ResultNotificationField></x-ResultNotificationField>
          <!-- NOTIFICATION FIELD END -->
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                {{ $title }} Record
                <span style="float:right;">
                  <button class="btn btn-xs btn-info tglBtn">+</button>
                  <button class="btn btn-xs btn-info tglBtn hide-this">-</button>
                </span>
              </h4>
            </div>
            <div class="card-body {{ $ft == 'edit' ? '' : 'hide-this' }}" id="tblCDiv">
              <form action="{{ $url }}" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField type="text" label="Enter Product Name" name="product_name" id="product_name"
                      :ft="$ft" :sd="$sd">
                    </x-InputField>
                    <span id="product_name-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-select-field label="Select Category" name="category_id" id="category_id" :ft="$ft"
                      :sd="$sd" :list="$categories" showv="category_name" savev="id">
                    </x-select-field>
                    <span id="category_id-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SelectField label="Select Sub Category" name="sub_category_id" id="sub_category_id"
                      :ft="$ft" :sd="$sd" :list="$sub_categories" showv="sub_category_name" savev="id">
                    </x-SelectField>
                    <span id="sub_category_id-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField type="file" label="Upload Image" name="thumbnail_name" id="thumbnail_name"
                      :ft="$ft" :sd="$sd">
                    </x-InputField>
                    <span id="thumbnail_name-err" class="text-danger errSpan"></span>
                  </div>

                  <div class="col-md-12 col-sm-12 mb-3">
                    <x-TextareaField label="Enter Description" name="description" id="description" :ft="$ft"
                      :sd="$sd">
                    </x-TextareaField>
                    <span id="description-err" class="text-danger errSpan"></span>
                  </div>
                </div>
                <hr>
                <!--  SEO INPUT FILED COMPONENT  -->
                <x-SeoField :ft="$ft" :sd="$sd"></x-SeoField>
                <!--  SEO INPUT FILED COMPONENT END  -->
                @if ($ft == ' add')
                  <button type="reset" class="btn btn-sm btn-warning  mr-1"><i class="ti-trash"></i>
                    Reset</button>
                @endif
                @if ($ft == 'edit')
                  <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info "><i class="ti-trash"></i> Cancel</a>
                @endif
                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
              </form>
            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body" id="tblCDiv">
              <form class="needs-validation" method="get" enctype="multipart/form-data" novalidate>
                <div class="row">
                  <div class="col-md-6 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Search Product Name</label>
                      <input name="search" id="search" type="text" class="form-control"
                        placeholder="Search Product Name" value="{{ $_GET['search'] ?? '' }}" required>
                      <span class="text-danger" id="search-err">
                        @error('search')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <button class="btn btn-sm btn-primary setBtn" type="submit">Search</button>
                    <a href="{{ aurl('products') }}" class="btn btn-sm btn-warning setBtn"><i class="ti-trash"></i>
                      Reset</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info setBtn" id="advSearchBtn">
                      <i class="ti-trash"></i> Advance Search
                    </a>
                  </div>
                </div>
              </form>
              <div class="{{ $filterApplied == true ? 'hide-thi' : 'hide-this' }}" id="advSearchForm">
                <hr>
                <form class="needs-validation" method="get" enctype="multipart/form-data" novalidate>
                  <div class="row">
                    <div class="col-md-3 col-sm-12 mb-3">
                      <div class="form-group">
                        <label>Cartegory</label>
                        <select name="category" id="category" class="form-control js-example-basic-singl">
                          <option value="">Select</option>
                          @foreach ($filterCategories as $row)
                            <option value="{{ $row->category_id }}"
                              {{ isset($_GET['category']) && $_GET['category'] == $row->category_id ? 'selected' : '' }}>
                              {{ $row->category->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <div class="form-group">
                        <label>Sub Category</label>
                        <select name="sub_category" id="sub_category" class="form-control js-example-basic-singl">
                          <option value="">Select</option>
                          @foreach ($filterSubCategories as $row)
                            <option value="{{ $row->sub_category_id }}"
                              {{ isset($_GET['sub_category']) && $_GET['sub_category'] == $row->sub_category_id ? 'selected' : '' }}>
                              {{ $row->subCategory->sub_category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <button class="btn btn-sm btn-primary setBtn advSearchBtn" type="submit">Search</button>
                      <a href="{{ aurl('products') }}" class="btn btn-sm btn-warning setBtn"><i class="ti-trash"></i>
                        Reset</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div style="float:left;">
                <label>
                  Show
                  <select name="limit_per_page" id="limit_per_page" class="">
                    @foreach ($lpp as $lpp)
                      <option value="{{ $lpp }}" {{ $limit_per_page == $lpp ? 'selected' : '' }}>
                        {{ $lpp }}</option>
                    @endforeach
                  </select>
                  entries
                </label>
                <select name="order_by" id="order_by">
                  @foreach ($orderColumns as $key => $value)
                    <option value="{{ $value }}" <?php echo $order_by == $value ? 'selected' : ''; ?>>{{ $key }}</option>
                  @endforeach
                </select>
                <select name="order_in" id="order_in">
                  <option value="ASC" {{ $order_in == 'ASC' ? 'selected' : '' }}>ASC</option>
                  <option value="DESC" {{ $order_in == 'DESC' ? 'selected' : '' }}>DESC</option>
                </select>
              </div>
              <div style="float:right;">
                <a href="{{ aurl($page_route . '/export/') }}" class="btn btn-xs btn-success">Export</a>
              </div>
            </div>
            <div class="card-body">
              <table id="datatabl" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="check_all" id="check_all" value=""
                        class="check-all-chkbox filled-in chk-col-primary" />
                    </th>
                    <th>Sr. No.</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Thumbnail</th>
                    <th>Content</th>
                    <th>SEO</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rows as $row)
                    <tr id="row{{ $row->id }}">
                      <td>
                        <input type="checkbox" name="selected_id[]" id="chk{{ $row->id }}"
                          class="checkbox check-chkbox filled-in chk-col-info" value="{{ $row->id }}" />
                        <label for="chk{{ $row->id }}">&nbsp;</label>
                      </td>
                      <td>{{ $i }}</td>
                      <td>{{ $row->product_name }}</td>
                      <td>
                        <b>Category</b> : {{ $row->category->category_name }}<br>
                        <b>Sub Category</b> : {{ $row->subCategory->sub_category_name }}
                      </td>
                      <td>
                        @if ($row->thumbnail_path != null)
                          <img src="{{ asset($row->thumbnail_path) }}" height="20" weight="20">
                        @else
                          N/A
                        @endif
                      </td>
                      <td>
                        @if ($row->description != null)
                          <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                            data-bs-toggle="modal"
                            data-bs-target="#ContModalScrollable{{ $row->id }}">View</button>
                          <div class="modal fade" id="ContModalScrollable{{ $row->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="ConModalScrollableTitle{{ $row->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="ConModalScrollableTitle{{ $row->id }}">
                                    Content
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h2>Description</h2>
                                  {!! $row->description !!}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          N/A
                        @endif
                      </td>
                      <td>
                        @if ($row->meta_title != null)
                          <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                            data-bs-toggle="modal"
                            data-bs-target="#SeoModalScrollable{{ $row->id }}">View</button>
                          <div class="modal fade" id="SeoModalScrollable{{ $row->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="SeoModalScrollableTitle{{ $row->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="SeoModalScrollableTitle{{ $row->id }}">
                                    SEO
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {{ $row->meta_title }}<br>
                                  {{ $row->meta_keyword }} <br>
                                  {{ $row->meta_description }} <br>
                                  {{ $row->page_content }} <br>
                                  {{ $row->seo_rating }}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          N/A
                        @endif
                      </td>
                      <td>
                        <a href="javascript:void()" onclick="DeleteAjax({{ $row->id }})"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('admin/products/update/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                          <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('admin/product-content/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline-info">
                          Content <span class="badge bg-primary"> {{ $row->contents->count() }}</span>
                        </a>
                        <a href="{{ url('admin/product-gallery/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline-info">
                          Gallery <span class="badge bg-primary">{{ $row->photos->count() }}</span>
                        </a>
                        <a href="{{ url('admin/product-faqs/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline-info">
                          Faqs <span class="badge bg-primary">{{ $row->faqs->count() }}</span>
                        </a>
                      </td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
              {!! $rows->links('pagination::bootstrap-5') !!}
              <div class="hide-this w100 float-left sbmtBtndiv" id="submitBtn">
                <a onclick="bulkDelete()" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-outlin btn-danger" value="delete" title="Click to delete">Delete</a>

                {{-- <a onclick="bulkUpdate('status','1')" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-outline btn-success" title="Active">
                  Active
                </a>

                <a onclick="bulkUpdate('status','0')" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-outline btn-danger" title="Inactive">
                  Inactive
                </a> --}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function changeStatus(id, val) {
      //alert(id);
      var tbl = 'products';
      $.ajax({
        url: "{{ url('common/change-status') }}",
        method: "GET",
        data: {
          id: id,
          tbl: tbl,
          val: val
        },
        success: function(data) {
          if (data == '1') {
            //alert('status changed of ' + id + ' to ' + val);
            if (val == '1') {
              $('#asts' + id).toggle();
              $('#ists' + id).toggle();
            }
            if (val == '0') {
              $('#asts' + id).toggle();
              $('#ists' + id).toggle();
            }
          }
        }
      });
    }

    function DeleteAjax(id) {
      //alert(id);
      var cd = confirm("Are you sure ?");
      if (cd == true) {
        $.ajax({
          url: "{{ url('admin/' . $page_route . '/delete') }}" + "/" + id,
          success: function(data) {
            if (data == '1') {
              //getData();
              var h = 'Success';
              var msg = 'Record deleted successfully';
              var type = 'success';
              $('#row' + id).remove();
              $('#toastMsg').text(msg);
              $('#liveToast').show();
              showToastr(h, msg, type);
            }
          }
        });
      }
    }

    CKEDITOR.replace("description");

    // $(function() {
    //   var $description = CKEDITOR.replace('description');

    //   $description.on('change', function() {
    //     $description.updateElement();
    //   });
    // });

    $(document).ready(function() {
      $('#category_id').on('change', function(event) {
        var category_id = $('#category_id').val();
        //alert(category_id);
        $.ajax({
          url: "{{ url('common/get-sub-category-by-category') }}",
          method: "GET",
          data: {
            category_id: category_id
          },
          success: function(result) {
            //alert(result);
            $('#sub_category_id').html(result);
          }
        })
      });
      $('#category').on('change', function(event) {
        var category = $('#category').val();
        //alert(category);
        $.ajax({
          url: "{{ url('admin/products/get-sub-category-by-category') }}",
          method: "GET",
          data: {
            category_id: category
          },
          success: function(result) {
            //alert(result);
            $('#sub_category').html(result);
          }
        })
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.advSearchBtn').click(function() {
        // Remove empty fields before form submission
        $('select').each(function() {
          if ($(this).val() == '') {
            $(this).prop('disabled', true);
          }
        });
      });
    });

    // ORDER BY, LIMIT PER PAGE
    $(document).ready(function() {
      $('#limit_per_page').change(function() {
        var selectedValue = $(this).val(); // Get the selected value
        var currentUrl = new URL(window.location.href); // Get the current URL
        var searchParams = currentUrl.searchParams;
        // Update or set the 'limit_per_page' query parameter
        searchParams.set('limit_per_page', selectedValue);
        // Update the URL by replacing the existing query string
        currentUrl.search = searchParams.toString();
        // Reload the page with the updated URL
        window.location.href = currentUrl.href;
      });
      $('#order_by').change(function() {
        var selectedValue = $(this).val(); // Get the selected value
        var currentUrl = new URL(window.location.href); // Get the current URL
        var searchParams = currentUrl.searchParams;
        // Update or set the 'order_by' query parameter
        searchParams.set('order_by', selectedValue);
        // Update the URL by replacing the existing query string
        currentUrl.search = searchParams.toString();
        // Reload the page with the updated URL
        window.location.href = currentUrl.href;
      });
      $('#order_in').change(function() {
        var selectedValue = $(this).val(); // Get the selected value
        var currentUrl = new URL(window.location.href); // Get the current URL
        var searchParams = currentUrl.searchParams;
        // Update or set the 'order_in' query parameter
        searchParams.set('order_in', selectedValue);
        // Update the URL by replacing the existing query string
        currentUrl.search = searchParams.toString();
        // Reload the page with the updated URL
        window.location.href = currentUrl.href;
      });
      $('#advSearchBtn').click(function() {
        $('#advSearchForm').toggle();
      });
    });

    // CHECK ALL CHECKBOX
    $(document).ready(function() {
      $('#check_all').on('click', function() {
        if (this.checked) {
          $('.checkbox').each(function() {
            this.checked = true;
            $(this).closest('tr').addClass('selectedRow');
          });
        } else {
          $('.checkbox').each(function() {
            this.checked = false;
            $(this).closest('tr').removeClass('selectedRow');
          });
        }
      });
      $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
          $('#check_all').prop('checked', true);
        } else {
          $('#check_all').prop('checked', false);
        }
      });
      $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length > 0) {
          $('#submitBtn').show();
        } else {
          $('#submitBtn').hide();
        }
      });
      $('#check_all').on('click', function() {
        if ($('.checkbox:checked').length > 0) {
          $('#submitBtn').show();
        } else {
          $('#submitBtn').hide();
        }
      });
      $('.checkbox').click(function() {
        if ($(this).is(':checked')) {
          $(this).closest('tr').addClass('selectedRow');
        } else {
          $(this).closest('tr').removeClass('selectedRow');
        }
      });
    });

    // UPDATE BULK FIELD (STATUS)
    function bulkUpdate(col, val) {
      var tbl = 'universities';
      var users_arr = [];
      $(".checkbox:checked").each(function() {
        var userid = $(this).val();
        users_arr.push(userid);
      });
      $.ajax({
        url: "{{ url('common/update-bulk-field') }}",
        type: 'get',
        data: {
          ids: users_arr,
          val: val,
          col: col,
          tbl: tbl
        },
        success: function(response) {
          //alert(response.affected_rows);
          if (response.affected_rows > '0') {
            var h = 'Success';
            var msg = response.affected_rows + ' rows updated successfully';
            var type = 'success';
          } else {
            var h = 'Danger';
            var msg = 'Not any record updated';
            var type = 'danger';
          }
          showToastr(h, msg, type);
          if (col == 'status' && val == 1) {
            $('tr.selectedRow span.active_status').show();
            $('tr.selectedRow span.inactive_status').hide();
          } else if (col == 'status' && val == 0) {
            $('tr.selectedRow span.active_status').hide();
            $('tr.selectedRow span.inactive_status').show();
          }
        }
      });

    }

    // DELETE BULK
    function bulkDelete() {
      var deleteConfirm = confirm("Are you sure?");
      if (deleteConfirm == true) {
        var tbl = 'universities';
        var users_arr = [];
        $(".checkbox:checked").each(function() {
          var userid = $(this).val();
          users_arr.push(userid);
        });
        $.ajax({
          url: "{{ url('common/bulk-delete') }}",
          type: 'get',
          data: {
            ids: users_arr,
            tbl: tbl
          },
          success: function(response) {
            location.reload(true);
          }
        });
      }
    }
  </script>
@endsection
