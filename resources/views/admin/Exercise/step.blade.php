@extends('admin.layout')
@section('title')
    {{__("message.step")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.step")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.step")}}</a></li>
                     </ol>
            </div>
        </div>
    </div>
</div>

@if (Session::has('error'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="margin: 20px; font-weight:500">
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@endif

<div class="content mt-3">
   <div class="animated fadeIn">
        <div class="row">
             <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{__("message.step")}}</strong>
                    </div>
                    <div class="card-body">
                      <form id="form" action="{{route('edit_step')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered" id="step_table_datatable">
                              <input type="HIDDEN" class="form-control" name="ex_id" value="{{$ex_id}}" id="ex_id">
                                <thead>
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th colspan="1">Action</th>
                                    </tr>
                                </thead>    
                                <tbody id="table_data">
                                    
                                </tbody>
                            </table>
                            <div style="margin:00px 10px 10px 28px;">
                                 <button style="padding:5px; border-radius: 4px; cursor: pointer; margin-top:5px; color:white;" id="add" class="btn btn-success btn-sm"  ><i class="fa fa-plus " > <span>ADD ROW</span></i></button>

                                <button style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" class="btn btn-sm" ><i class="fa fa-edit "><span> SUBMIT</span></i></button>
                              </div>
                         </div>
                         <div id="total_row">
                            
                         </div>

                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')

<script type="text/javascript">
  $(document).ready(function() {
    
    var ex_id = $('#ex_id').val();
    $.ajax( {
         url: $("#path_admin").val()+"/step_table_datatable"+"/"+ex_id,
         data: { },
         success: function(data)
         { 
            $("#table_data").append(data.table);
            $("#total_row").append(data.input_raw);
         }
    });

  
  $(document).on("click", "#add", function () {
    
    var match_row = $('#step_table_datatable tr').length;
  
    var new_row = '<tr id="' + match_row + '" class="tbl_row"><input type="hidden" name="step_id[]" value="0"/><td><textarea name="step[]" id="' + match_row + '" class="form-control" placeholder="Enter Step Description"></textarea></td><td><button class="delete-row btn btn-primary" type="button" value="Delete" style="margin-right: 5px; background-color:#dc3545; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button></td></tr>';
  
    $('#table_data').append(new_row);
    return false;
  });
  
  $(document).on("click", ".delete-row", function () {
  $(this).closest('tr').remove();   
  return false;
  });
 
 

});

    </script>
@endsection