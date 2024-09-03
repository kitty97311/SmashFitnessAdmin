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

<div class="content mt-3">
   <div class="animated fadeIn">
        <div class="row">
             <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{__("message.step")}}</strong>
                    </div>

                    <div class="card-body">
                        <input type="hidden" class="form-control" name="main_id" value="{{$ex_id}}" id="main_id">

                          <div class="table-responsive" style="padding: 10px;">
                             <table id="test-table" class="table table-striped table-bordered">
                                  <div id="row">
                                     <div class="col-md-8" >
                                          <textarea name="step[]" id="step" class='form-control' placeholder="Enter Step Description"></textarea>
                                      </div>
                                      <div class="col-md-4">
                                          <button style="margin-right: 5px; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>
                                      </div>
                                  </div><br/>
                                  <div id="newinput">
                                  </div>
                              </table>
                            </div>
                             <button style="padding:5px; border-radius: 4px; cursor: pointer; margin-top:5px; color:white;" class="btn btn-success btn-sm"  ><i class="fa fa-plus " id="rowAdder"> <span>ADD </span></i></button>

                            <button style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" class="btn btn-sm" ><i class="fa fa-edit " ><span> SUBMIT</span></i></button>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
<script type="text/javascript">
 
        $("#rowAdder").click(function () {
            newRowAdd =
            '<div id="row"> ' +
            '<div class="col-md-8"> <textarea id="step" class="form-control" placeholder="Enter Step Description"></textarea> </div>' +
            '<div class="col-md-4"> <button style="margin-right: 5px; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-danger btn-sm" id="DeleteRow">' +
            '<i class="fa fa-trash "><span> DELETE</span></i></button>  </div> ' +
            '</div><br/>';
 
            $('#newinput').append(newRowAdd);
             $('#newinput').append(`<tr id="R${++rowIdx}">
                                  <td class="row-index text-center">
                                        <p>Row ${rowIdx}</p></td>
                                   <td class="text-center">
                                    <button class="btn btn-danger remove" 
                                        type="button">Remove</button>
                                    </td>
                                   </tr>`);
        });
        $('#row').append("<br/>");
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>
@endsection