@extends('admin.layout')
@section('title')
    {{__("message.workout")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.workout")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.workout")}}</a></li>
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
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
                    
<div class="content mt-3">
   <div class="animated fadeIn">
        <div class="row">
             <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{__("message.workout")}}</strong>
                    </div>

                    <div class="card-body">

                        <a rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="add" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_workout")}}</span></i></a>

                        <div class="table-responsive">
                            <table class="table" id="workout_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Sub Smash Name</th>
                                        <th scope="col">Sub Smash+ Name</th>
                                        <th scope="col">Workout Name</th>
                                        <th scope="col">Workout Image</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Total Times</th>
                                        <th scope="col">Total Counts</th>
                                        <th scope="col">Total Calories</th>
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
               <h5 class="modal-title">{{__("message.add_workout")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_workout')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Workout Name</label>
                        <input type="text" class="form-control"  name="workout_name" placeholder="Workout Name" required>
                    </div>
                    <div class="form-group">
                        <label>Sub Smash Name</label>
                        <select class="form-control" name="sub_smash_id">
                            <option disabled selected="" value="">--select sub smash--</option>
                            @foreach($sub_smash as $element)
                                <option value="{{ $element->id }}" {{($element->id == old('sub_smash_id')) ? 'selected' : ''}}>{{ $element->name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Smash+ Name</label>
                        <select class="form-control" name="sub_smashplus_id">
                            <option disabled selected="" value="">--select sub smash+--</option>
                            @foreach($sub_smashplus as $element)
                                <option value="{{ $element->id }}" {{($element->id == old('sub_smashplus_id')) ? 'selected' : ''}}>{{ $element->name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="workout_level">
                            <option disabled selected="" value="">--select category--</option>
                            @foreach($category as $ex_category)
                                <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Workout Image</label>
                        <input type='file' class='form-control' name='workout_image' placeholder='Enter Image:' required> <br>
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="add"><span> Save </span>
                            </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                       </div>
                    </div>
                </form>
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
               <h5 class="modal-title">{{__("message.edit_workout")}}</h5>
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
                  <form id="form" action="{{route('edited_workout')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="id1">
                    </div> 
                    <div class="form-group">
                        <label>Workout Name</label>
                        <input type="text" class="form-control" id="workout_name1" name="workout_name" placeholder="Workout Name">
                    </div>
                    <div class="form-group">
                        <label>Sub Smash Name</label>
                        <select class="form-control" name="sub_smash_id" id="sub_smash1">
                            <option disabled selected="" value="">--select sub smash--</option>
                            @foreach($sub_smash as $element)
                                <option value="{{ $element->id }}" {{($element->id == old('sub_smash_id')) ? 'selected' : ''}}>{{ $element->name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Smash+ Name</label>
                        <select class="form-control" name="sub_smashplus_id" id="sub_smashplus1">
                            <option disabled selected="" value="">--select sub smash+--</option>
                            @foreach($sub_smashplus as $element)
                                <option value="{{ $element->id }}" {{($element->id == old('sub_smashplus_id')) ? 'selected' : ''}}>{{ $element->name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="workout_level" id="workout_level1">
                            <option disabled selected="" value="">--select category--</option>
                            @foreach($category as $ex_category)
                                <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Default Main Workout?</label>
                        <select class="form-control" name="workout_special" id="workout_special1">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Exercises Time</label>
                        <input type="number" class="form-control" id="workout_period1" name="workout_period" placeholder="Total Time">
                    </div>
                    <div class="form-group">
                        <label>Exercises count</label>
                        <input type="number" class="form-control" id="workout_size1" name="workout_size" placeholder="Total Count">
                    </div>
                    <div class="form-group">
                        <label>Exercises calories</label>
                        <input type="number" class="form-control" id="workout_calories1" name="workout_calories" placeholder="Total Calories">
                    </div>
                    <div class="form-group">
                        <label>Workout Image</label>
                        <img id="image1" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                        <input type="hidden" name="old_image" id="old_image"/>
                        <input type="file" class="form-control" id="image"  name="image"   accept="image/*" >
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="add"><span> Save </span>
                        </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                       </div>
                    </div>
                </form>
                @endif
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="delete_workout" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_workout")}}</h5>
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
               <form id="form" action="{{('deleted_workout')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This Workout..?
                    </p>
                    <div class="row">
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="delete"><span> Delete </span> </button>
                        </div>
                        <div class="col-md-3" style="margin-left:-30px;">
                            <input type="button" class="btn btn-danger btn-md form-control" data-dismiss="modal" value="Cancel">
                       </div>
                    </div>
                </form>
              @endif
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('footer')

<script type="text/javascript">
    $(document).ready(function(){
        $('#workout_datatable').DataTable({
            ajax: '{{route("workout_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                },{
                   data: 'sub_smash_name',
                   name: 'sub_smash_name'
                },{
                   data: 'sub_smashplus_name',
                   name: 'sub_smashplus_name'
                },{
                   data: 'workout_name',
                   name: 'workout_name'
                },{
                    data: 'workout_image',
                   name: 'workout_image'
                },{
                    data: 'workout_level',
                   name: 'workout_level'
                },{
                    data: 'workout_period',
                   name: 'workout_period'
                },{
                    data: 'workout_size',
                   name: 'workout_size'
                },{
                    data: 'workout_calories',
                   name: 'workout_calories'
                },{
                    data: 'action',
                    name: 'action'
                }
            ],
            columnDefs: [{
               targets: 4,
               render: function (data) {
                       return '<img src="'+data+'" style="height:100px;"/>';                
               }
           }],
            order: [
                [0, "DESC"]
            ]
        });
    });

    function edit_workout(id) {
        $.ajax({
            url: $("#path_admin").val()+"/edit_workout"+"/"+id,
            data: { },
            success: function(data)
            {
                $("#id1").val(data.id);
                $("#sub_smash1").val(data.sub_smash_id);
                $("#sub_smashplus1").val(data.sub_smashplus_id);
                $("#workout_name1").val(data.name);
                $("#workout_level1").val(data.level_id);
                $("#workout_special1").val(data.special);
                $("#workout_period1").val(data.period);
                $("#workout_size1").val(data.size);
                $("#workout_calories1").val(data.calories);
                $("#old_image").val(data.img);
                $('#image1').attr("src", $("#path_admin").val()+"/storage/app/public/images/workout/"+"/"+data.img);
            }
        });
    }

    function delete_workout(id) {
        $.ajax({
            url: $("#path_admin").val()+"/delete_workout"+"/"+id,
            data: { },
            success: function(data)
            {
                $("#real_id").val(data.id);
            }
        });
    }
</script>
@endsection