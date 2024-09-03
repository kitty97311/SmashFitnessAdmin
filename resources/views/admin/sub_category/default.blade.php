@extends('admin.layout')
@section('title')
    {{__("message.sub_category")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.sub_category")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.sub_category")}}</a></li>
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
                        <strong class="card-title">{{__("message.sub_category")}}</strong>
                    </div>

                    <div class="card-body">

                        <a  rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="Remove" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_sub_category")}}</span></i></a>
                        
                        <div class="table-responsive">
                            <table class="table" id="category_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Sub-Category Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Category Icon</th>
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
               <h5 class="modal-title">{{__("message.add_sub_category")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_sub_category')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="cat_id" id="cat_id" class="form-control" value="{{old('cat_id')}}" required>
                          <option disabled selected="" value="">--select category--</option>
                                @foreach($category as $ex_category)
                                    <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                    </option> 
                                @endforeach
                        </select>
                      </div>
                   <div class="form-group">
                        <label>Sub-Category Name</label>
                        <input type="text" class="form-control"  name="cat_name" placeholder="Sub-Category Name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Enter Description:" name="description" required></textarea>
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Level</label>
                       <input type="text" class="form-control"   name="level" placeholder="Category level">
                    </div>
                    <div class="form-group">
                           <label>Category Icon</label>
                           <input type='file' class='form-control'   name='cat_icon' placeholder='Enter Image:' required> <br>
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
               <h5 class="modal-title">{{__("message.edit_sub_category")}}</h5>
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
                  <form id="form" action="{{route('pay_set')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="main_id">
                    </div> 
                    <div class="form-group">
                        <label>Category Name</label>
                        <select name="cat_id" id="cat_id1" class="form-control"  required>
                          <option disabled selected="" value="">--select category--</option>
                                @foreach($category as $ex_category)
                                    <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                    </option> 
                                @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="cat_name" value="" id="cat_name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Enter Description:" name="description" id="description" required></textarea>
                    </div>
                    <div class="form-group" id="add_css">
                        <label>Level</label>
                       <input type="text" class="form-control"  id="level" name="level" placeholder="Category level">
                    </div>
                    <div class="form-group">
                           <label>Category Icon</label>
                            <img id="image1" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                           <input type="hidden" name="old_image" id="old_image"/>
                           <input type="file" class="form-control" id="image"  name="image"   accept="image/*" >
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
               <h5 class="modal-title">{{__("message.delte_sub_category")}}</h5>
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
               <form id="form" action="{{('deleted_sub_category')}}" method="post" enctype="multipart/form-data">
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
      
        $('#category_datatable').DataTable({
        
            ajax: '{{route("sub_cat_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{data: 'cat_id',
                   name: 'cat_id',
                  
                },{
                   data: 'cat_name',
                   name: 'cat_name'
               },{
                   data: 'description',
                   name: 'description'
               },{
                   data: 'level',
                   name: 'level'
               },{
                   data: 'cat_icon',
                   name: 'cat_icon'
               },{
                    data: 'action',
                    name: 'action'
                }
            ],
            columnDefs: [{
               targets: 5,
               render: function (data) {
                       return '<img src="'+data+'" style="height:100px;"/>';                
               }
           }],        
            order: [
                [0, "DESC"]
            ]
        });

        
  });   

function edit_sub_category(id){
  
    $.ajax( {
         url: $("#path_admin").val()+"/edit_sub_category"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#main_id").val(data.id);
            $("#cat_name").val(data.cat_name);
            $("#cat_id1").val(data.cat_id);
            $("#description").val(data.description);
            $("#level").val(data.level);
            
            $("#old_image").val(data.cat_icon);
             $('#image1').attr("src", $("#path_admin").val()+"/storage/app/public/images/menu_sub_icon"+"/"+data.cat_icon)
            /* $('#real_image').val(str.data.edit_image);*/    
         }
    });
}


function delete_sub_category(id){
    
        $.ajax( {
         url: $("#path_admin").val()+"/delete_sub_category"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#real_id").val(data.id);
         }
    });
}
</script>
@endsection