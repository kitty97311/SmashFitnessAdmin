@extends('admin.layout')
@section('title')
    {{__("message.exercise")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.exercise")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.exercise")}}</a></li>
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
                        <strong class="card-title">{{__("message.exercise")}}</strong>
                    </div>

                    <div class="card-body">

                        <a  rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="add" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_exercise")}}</span></i></a>

                        <div class="table-responsive">
                            <table class="table" id="exercise_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Exercise Name</th>
                                        <th scope="col">Sub Smash Name</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Time In Second</th>
                                        <th scope="col">Calories</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Repeat Count</th>
                                        <th scope="col">Url</th>
                                        <th colspan="3" style="text-align:center">Action</th>
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
               <h5 class="modal-title">{{__("message.add_exercise")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_exercise')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="cat_name" id="cat_name" class="form-control" value="{{old('category_id')}}" >
                            <option disabled selected="" value="" >--select category--</option>
                                @foreach($category as $ex_category)
                                    <option value="{{ $ex_category->id }}" {{($ex_category->id == old('id')) ? 'selected' : ''}}>{{ $ex_category->name }}
                                    </option> 
                                @endforeach
                        </select>
                    </div>
                   <div class="form-group">
                        <label>Exersice Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Exersice Name" required>
                    </div>
                    <div class="form-group">
                        <label>Repeat Count</label>
                        <input type="text" class="form-control"  id="repeat_count" name="repeat_count" placeholder="Repeat Count" required>
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Time In Second</label>
                       <input type="text" class="form-control"  id="time" name="time" placeholder="Time In Second">
                    </div>
                    <div class="form-group">
                        <label>Calories</label>
                        <input type="text" class="form-control"  id="calories" name="calories" placeholder="Calories" required>
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Url</label>
                       <input type="text" class="form-control"  id="url" name="url" placeholder="Url">
                    </div>
                    <div class="form-group">
                           <label>Select Image</label>
                           <input type='file' class='form-control'  id='image' name='image' placeholder='Select Image:' required> <br>
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

<div class="modal fade" id="edit_exercise" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.edit_exercise")}}</h5>
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
                  <form id="form" action="{{route('edited_exercise')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="" class="form-control" name="id" value="" id="id">
                    </div> 
                   <div class="form-group">
                        <label>Category Name</label>
                        <select name="cat_name" id="ex_cat_name" class="form-control" value="" required>
                                @foreach($category as $ex_category)
                                    <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->name }}
                                    </option> 
                                @endforeach
                        </select>
                    </div>
                   <div class="form-group">
                        <label>Exersice Name</label>
                        <input type="text" class="form-control" id="ex_name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Repeat Count</label>
                        <input type="text" class="form-control"  id="ex_repeat_count" name="repeat_count" >
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Time In Second</label>
                       <input type="text" class="form-control"  id="ex_time" name="time" >
                    </div>
                    <div class="form-group">
                        <label>Calories</label>
                        <input type="text" class="form-control"  id="ex_calories" name="calories" >
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Url</label>
                       <input type="text" class="form-control"  id="ex_url" name="url" >
                    </div>
                    <div class="form-group">
                        <label>Sub Smash</label>
                        <select class="form-control" name="sub_smash" id="sub_smash1" required>
                            <option disabled selected="" value="">--select sub smash--</option>
                            <option value="0" {{(old("sub_smash_id") == 0) ? 'selected' : ''}}>None</option>
                            @foreach($sub_smash as $element)
                                <option value="{{ $element->id }}" {{($element->id == old('sub_smash_id')) ? 'selected' : ''}}>{{ $element->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <img id="image1" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                    <div class="form-group">
                           <label>Select Image</label>
                           <input type="hidden" name="old_image" id="old_image"/>
                           <input type='file' class='form-control'  id='image' name='image'placeholder='Select Image:' > <br>
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
                @endif
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="delete_exercise" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_exercise")}}</h5>
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
               <form id="form" action="{{('deleted_exercise')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This Category..?
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
@endsection
@section('footer')

<script type="text/javascript">
    $(document).ready(function(){
      
        $('#exercise_datatable').DataTable({
        
            ajax: '{{route("exercise_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{
                   data: 'name',
                   name: 'name'
                },{
                   data: 'sub_smash_name',
                   name: 'sub_smash_name'
               },{
                   data: 'cat_name',
                   name: 'cat_name'
               },{
                   data: 'time',
                   name: 'time'
               },{
                   data: 'calories',
                   name: 'calories'
               },{
                   data: 'image',
                   name: 'image'
               },{
                   data: 'repeat_count',
                   name: 'repeat_count'
               },{
                   data: 'url',
                   name: 'url'
               },{
                    data: 'action',
                    name: 'action'
                }
            ],
            columnDefs: [{
               targets: 6,
               render: function (data) {
                       return '<img src="'+data+'" style="height:80px; width:120px;"/>';                
               }
           }],        
            order: [
                [0, "DESC"]
            ]
        });

        
  });   

function edit_exercise(id){
  
    $.ajax( {
         url: $("#path_admin").val()+"/edit_exercise"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#id").val(data.id);
            $("#cat_name").val(data.cat_name);
            $("#sub_smash1").val(data.sub_smash_id);
            $("#ex_name").val(data.name);
            $("#ex_repeat_count").val(data.repeat_count);
            $("#ex_time").val(data.time);
            $("#ex_calories").val(data.calories);
            $("#ex_url").val(data.url);
            
            $("#old_image").val(data.image);
             $('#image1').attr("src", $("#path_admin").val()+"/storage/app/public/images/menu_item_icon"+"/"+data.image)
            /* $('#real_image').val(str.data.edit_image);*/    
         }
    });
}

function delete_exercise(id){
    
        $.ajax( {
         url: $("#path_admin").val()+"/delete_exercise"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#real_id").val(data.id);
         }
    });
}
</script>
@endsection