@extends('admin.layout')
@section('title')
    {{__("message.day")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.day")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.day")}}</a></li>
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
                        <strong class="card-title">{{__("message.day")}}</strong>
                    </div>

                    <div class="card-body">

                        <a  rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="Remove" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_day")}}</span></i></a>
                        
                        <div class="table-responsive">
                            <table class="table" id="day_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Is Work-Out</th>
                                        <th scope="col">Work-Out Days</th>
                                        <th colspan="2" style="text-align:center">Action</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                    
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.add_day")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_day')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="sub_cat_id"  class="form-control" value="{{old('cat_id')}}" required>
                          <option disabled selected="" value="">--select category--</option>
                                @foreach($category as $ex_category)
                                    <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                    </option> 
                                @endforeach
                        </select>
                      </div>
                   <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="name" placeholder="Sub-Category Name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Enter Description:" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Is Work-Out  </label>
                       <select name="is_workout" id="status_chack" onchange="gat_status()" class="form-control"  required>
                            <option disabled selected="" value="">--Select Work-Out Days--</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option> 
                        </select>
                    </div>
                    <div class="form-group" id="add_css">
                           <label> Work-Out Days</label>
                           <select name="days"  class="form-control"  required>
                            <option disabled selected="" value="">--Select Work-Out Days--</option>
                            
                            <option value="1">1 Day</option>
                            <option value="2">2 Day</option>
                            <option value="3">3 Day</option>
                            <option value="4">4 Day</option>
                            <option value="5">5 Day</option>
                            <option value="6">6 Day</option>
                            <option value="7">7 Day</option>
                            <option value="8">8 Day</option>
                            <option value="9">9 Day</option>
                            <option value="10">10 Day</option> 
                            <option value="11">11 Day</option>
                            <option value="12">12 Day</option>
                            <option value="13">13 Day</option>
                            <option value="14">14 Day</option>
                            <option value="15">15 Day</option>
                            <option value="16">16 Day</option>
                            <option value="17">17 Day</option>
                            <option value="18">18 Day</option>
                            <option value="19">19 Day</option>
                            <option value="20">20 Day</option>
                            <option value="21">21 Day</option>
                            <option value="22">22 Day</option>
                            <option value="23">23 Day</option>
                            <option value="24">24 Day</option>
                            <option value="25">25 Day</option>
                            <option value="26">26 Day</option>
                            <option value="27">27 Day</option>
                            <option value="28">28 Day</option>
                            <option value="29">29 Day</option>
                            <option value="30">30 Day</option>
                            <option value="31">31 Day</option>  
                        </select>
                    </div>
                    <center>
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="add"><span> Save </span>
                        </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                       </div>
                    </center>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit_category" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.edit_day")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              @php 
              $data = Session :: get('admin');
              $email = ($data->email);
              
              @endphp
              @if( $email == "demo@gmail.com")
                 <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert"> 
                         <p style="color:#721c24;"> Admin Can Not give Permission To Edit Because You Are Using Demo Account...</p>
                       
                    </div>
                </div>
              @else
                  <form id="form" action="{{route('edited_work')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="main_id">
                    </div> 
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="sub_cat_id" id="sub_cat_id" class="form-control" required >
                          <option disabled selected="" value="">--select category--</option>
                                @foreach($category as $ex_category)
                                    <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                    </option> 
                                @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="name" value="" id="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Enter Description:" name="description" id="description" required></textarea>
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Is Work-Out</label>
                       <select name="is_workout" id="is_workout"  onchange="gat_status1()"class="form-control"  required>
                            <option disabled selected="" value="">--Select Work-Out Days--</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option> 
                        </select>
                    </div>
                    <div class="form-group" id="add_css1">
                           <label>Days</label>
                          
                           <select name="days"  id="days" class="form-control"  required>
                            <option disabled selected="" value="">--Select Work-Out Days--</option>
                            
                            <option value="1">1 Day</option>
                            <option value="2">2 Day</option>
                            <option value="3">3 Day</option>
                            <option value="4">4 Day</option>
                            <option value="5">5 Day</option>
                            <option value="6">6 Day</option>
                            <option value="7">7 Day</option>
                            <option value="8">8 Day</option>
                            <option value="9">9 Day</option>
                            <option value="10">10 Day</option> 
                            <option value="11">11 Day</option>
                            <option value="12">12 Day</option>
                            <option value="13">13 Day</option>
                            <option value="14">14 Day</option>
                            <option value="15">15 Day</option>
                            <option value="16">16 Day</option>
                            <option value="17">17 Day</option>
                            <option value="18">18 Day</option>
                            <option value="19">19 Day</option>
                            <option value="20">20 Day</option>
                            <option value="21">21 Day</option>
                            <option value="22">22 Day</option>
                            <option value="23">23 Day</option>
                            <option value="24">24 Day</option>
                            <option value="25">25 Day</option>
                            <option value="26">26 Day</option>
                            <option value="27">27 Day</option>
                            <option value="28">28 Day</option>
                            <option value="29">29 Day</option>
                            <option value="30">30 Day</option>
                            <option value="31">31 Day</option>  
                        </select>
                    </div>
                    <center>
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="add"><span> Save </span> </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                       </div>
                    </center>
                </form>
              @endif
               
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="delete_category" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delte_day")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              @php 
              $data = Session :: get('admin');
              $email = ($data->email);
              
              @endphp
              @if( $email == "demo@gmail.com")
                  <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert"> 
                         <p style="color:#721c24;"> Admin Can Not give Permission To Delete Because You Are Using Demo Account...</p>
                       
                    </div>
                </div>
              @else
               <form id="form" action="{{('deleted_work')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This Work-Out..?
                    </p>
                    <center>
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="delete"><span> Delete </span> </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                       </div>
                    </center>
                </form>
              @endif
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.edit_exercise")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('edited_day')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <input type="hidden" class="form-control" name="id" id="id" value="" >
                    
                    <div class="form-group">
                        <label>Is Rest</label>
                         <select name="is_rest" id="rest" class="form-control" onchange="get_exercise_rest()" >
                            
                        </select>
                    </div>
                  
                    <div class="form-group add_css" id="add_rest" style="display:''">
                        <label>Level</label>
                          <h4 class=" mt-2 mb-4" id="star">
                          </h4>
                    
                        

                        <div class="form-group">
                            <label>Select Exercise</label>
                            <select name="exercise[]" id="ex_id" class="form-control" value="" multiple required>
                                <option disabled selected value="">--Select Price--</option>
                                
                            </select>
                        </div>
                    </div>
                    <center>
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="add">
                                    <span> Save </span>
                            </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                        </div>
                    </center>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer')

<script type="text/javascript">
    $(document).ready(function(){
      
        $('#day_datatable').DataTable({
        
            ajax: '{{route("day_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{data: 'sub_cat_id',
                   name: 'sub_cat_id',
                  
                },{
                   data: 'name',
                   name: 'name'
               },{
                   data: 'description',
                   name: 'description'
               },{
                   data: 'is_workout',
                   name: 'is_workout'
               },{
                   data: 'days',
                   name: 'days'
               },{
                    data: 'action',
                    name: 'action'
                }
            ],
               
            order: [
                [0, "DESC"]
            ]
        });

        
  });  

function gat_status()
    {
      var status = $('#status_chack option:selected').val();
      if(status == 1)
      {
        $("#add_css").css("display", "");
      }
      if(status == 0)
      {
        $("#add_css").css("display", "none");
      }
      
    } 
function edit_days(id){
  
    $.ajax( {
         url: $("#path_admin").val()+"/edit_days"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#main_id").val(data.id);
            $("#sub_cat_id").val(data.sub_cat_id);
            $("#name").val(data.name);
            $("#description").val(data.description);
            $("#is_workout").val(data.is_workout);
            $("#days").val(data.days);
            
            /* $('#real_image').val(str.data.edit_image);*/    
         }
    });
}
function gat_status1()
    {
      var status = $('#is_workout option:selected').val();
      if(status == 1)
      {
        $("#add_css1").css("display", "");
      }
      if(status == 0)
      {
        $("#add_css1").css("display", "none");
      }
      
    } 
function delete_work(id){
    
        $.ajax( {
         url: $("#path_admin").val()+"/delete_work"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#real_id").val(data.id);
         }
    });
}

function add_ex(id){  
alert(id);
    $.ajax( {
         url: $("#path_admin").val()+"/add_ex"+"/"+id,
         data: { },
         success: function(data)
         { 
            $("#rest").append(data.is_rest);

            $("#id").val(data.data.id);
            $("#status_chack").val(data.data.is_rest);
            $("#level").val(data.data.level);
            $("#ex_id").val(data.data.ex_id);

            $("#star").append(data.rate);

            $("#ex_id").append(data.ex_data);
         }
    });
}
</script>
@endsection