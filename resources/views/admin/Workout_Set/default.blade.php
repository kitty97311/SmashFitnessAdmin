@extends('admin.layout')
@section('title')
    {{__("message.workout_set")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.workout_set")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.workout_set")}}</a></li>
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
                        <strong class="card-title">{{__("message.workout_set")}}</strong>
                    </div>

                    <div class="card-body">

                        <a  rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="Remove" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_workout_set")}}</span></i></a>
                        
                        <div class="table-responsive">
                            <table class="table" id="workout_set_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Workout Name</th>
                                        <th scope="col">Exercise Name</th>
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
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.add_workout_set")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_workout_set')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Workout Name</label>
                        <select name="workout_id"  class="form-control" value="{{old('workout_id')}}" required>
                          <option disabled selected="" value="">--select workout--</option>
                                @foreach($workout as $element)
                                    <option value="{{ $element->id }}" {{($element->id == old('workout_id')) ? 'selected' : ''}}>{{ $element->name }}
                                    </option>
                                @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Exercise Name</label>
                        <select name="ex_id[]" multiple="" size="12" class="form-control" value="{{old('ex_id')}}" required>
                          <option disabled selected="" value="">--select Exercise--</option>
                                @foreach($exercise as $exercises)
                                    <option value="{{ $exercises->id }}" {{($exercises->id == old('id')) ? 'selected' : ''}}>{{ $exercises->name }}
                                    </option> 
                                @endforeach
                        </select>
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

<div class="modal fade" id="edit_workout_set" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.edit_workout_set")}}</h5>
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
                  <form id="form" action="{{route('edited_workout_set')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="main_id">
                    </div> 
                    <div class="form-group">
                        <label>Workout Name</label>
                        <select name="workout_id" id="workout_id" class="form-control"  required>
                          <option disabled selected="" value="">--select workout--</option>
                                @foreach($workout as $element)
                                    <option value="{{ $element->id }}" {{($element->id == old('workout_id')) ? 'selected' : ''}}>{{ $element->name }}
                                    </option> 
                                @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Exercise Name</label>
                        <select name="ex_id[]" multiple="" id="ex_id" size="12" class="form-control" value="{{old('ex_id')}}" required>
                          <option disabled selected="" value="">--select Exercise--</option>
                        </select>
                      </div>
                    <div class="row">
                        <div class="col-md-3" style="margin-left:120px;">
                            <button class="btn btn-primary"  type="submit" name="add"><span> Save </span> </button>
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

<div class="modal fade" id="delete_workout_set" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_workout_set")}}</h5>
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
               <form id="form" action="{{('deleted_workout_set')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This Workout Set..?
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
        $('#workout_set_datatable').DataTable({
            ajax: '{{route("workout_set_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{data: 'workout_id',
                   name: 'workout_id',
                  
                },{
                   data: 'ex_id',
                   name: 'ex_id'
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

    function edit_workout_set(id){
        $.ajax({
            url: $("#path_admin").val()+"/edit_workout_set"+"/"+id,
            data: {},
            success: function(data)
            {
                $("#ex_id").append(data.ex_data);                
                $("#main_id").val(data.data.id);
                $("#workout_id").val(data.data.workout_id);
                $("#ex_id").val(data.data.ex_id);
            }
        });
    }

    function delete_workout_set(id){
        $.ajax({
            url: $("#path_admin").val()+"/delete_workout_set"+"/"+id,
            data: {},
            success: function(data)
            {
                $("#real_id").val(data.id);
            }
        });
    }
</script>
@endsection