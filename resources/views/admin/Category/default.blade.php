@extends('admin.layout')
@section('title')
    {{__("message.category")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.category")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.category")}}</a></li>
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
                        <strong class="card-title">{{__("message.category")}}</strong>
                    </div>

                    <div class="card-body">

                        <a  rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="add" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_Category")}}</span></i></a>

                        <div class="table-responsive">
                            <table class="table" id="category_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Name</th>
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
               <h5 class="modal-title">{{__("message.add_Category")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_category')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control"  name="cat_name" placeholder="Category Name" required>
                    </div>
                   <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Category Type" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" class="form-control"  name="level" placeholder="Category Level" required>
                    </div>
                    <div class="form-group">
                           <label>Category Icon</label>
                           <input type='file' class='form-control' name='cat_icon' placeholder='Enter Image:' required> <br>
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

<div class="modal fade" id="edit" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.edit_Category")}}</h5>
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
                  <form id="form" action="{{route('edited_category')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="id1">
                    </div> 
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" id="cat_name1" name="cat_name" placeholder="Category Name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" id="description1" name="description" placeholder="Category Type"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" class="form-control"  id="level1" name="level" placeholder="Category Level">
                    </div>
                    
                    <div class="form-group">
                           <label>Category Icon</label>
                           <img id="image1" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                           <input type="hidden" name="old_image" id="old_image"/>
                           <input type="file" class="form-control" id="image"  name="image"   accept="image/*" >
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

<div class="modal fade" id="delete_category" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_category")}}</h5>
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
               <form id="form" action="{{('deleted_category')}}" method="post" enctype="multipart/form-data">
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

<div class="modal fade" id="edit_ex" role="dialog">
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
                         <select name="is_rest" id="ex_rest" class="form-control" onchange="display_model()" >
                            <!-- <option value=1>Yes</option>
                            <option value=0 selected>No</option> -->
                        </select>
                    </div>
                  
                    <div class="form-group add_css" id="display" style="display:''">
                        <label>Level</label>
                          <h4 class=" mt-2 mb-4" id="star">
                          </h4>
                    
                        

                        <div class="form-group">
                            <label>Select Exercise</label>
                            <select name="exercise[]" id="ex_id" class="form-control" value="" multiple required>
                                <option disabled selected value="">--Select Exercise--</option>
                                
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
      
        $('#category_datatable').DataTable({
        
            ajax: '{{route("category_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
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
               targets:4,
               render: function (data) {
                       return '<img src="'+data+'" style="height:100px;"/>';                
               }
           }],        
            order: [
                [0, "DESC"]
            ]
        });

        
  });   

function edit_category(id){
  $.ajax( {
         url: $("#path_admin").val()+"/edit_category"+"/"+id,
         data: { },
         success: function(data)
         {
          
            $("#id1").val(data.id);
            $("#cat_name1").val(data.cat_name);
            $("#description1").val(data.description);
            $("#level1").val(data.level);
            
            $("#old_image").val(data.cat_icon);
             $('#image1').attr("src", $("#path_admin").val()+"/storage/app/public/images/menu_cat_icon/"+"/"+data.cat_icon)
            /* $('#real_image').val(str.data.edit_image);*/      
            
         }
    });
}

function display_model()
    {

      var status = $('#ex_rest option:selected').val();
      if(status == 0)
      {
       $("#display").css("display", "");
      }
      if(status == 1)
      {
        $("#display").css("display", "none");
      }
      
    }

    function gat_status1()
    {
      var status = $('#status_chack1 option:selected').val();
      if(status == 1)
      {
        $("#add_css1").css("display", "");
      }
      if(status == 0)
      {
        $("#add_css1").css("display", "none");
      }
      
    } 
function delete_category(id){
    
        $.ajax( {
         url: $("#path_admin").val()+"/delete_category"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#real_id").val(data.id);
         }
    });
}

function get_exercise_status()
    {

      var status = $('#ex_rest option:selected').val();
      if(status == 0)
      {
       $("#add_week").css("display", "");
      }
      if(status == 1)
      {
        $("#add_week").css("display", "none");
      }
      
    }

function edit_ex(id){  

    $.ajax( {
         url: $("#path_admin").val()+"/edit_ex"+"/"+id,
         data: { },
         success: function(data)
         { 
           $("#ex_rest").append(data.is_rest);

            $("#id").val(data.data.id);
            $("#ex_rest").val(data.data.is_rest);
            $("#level").val(data.data.level);
            $("#ex_id").val(data.data.ex_id);

            $("#star").append(data.rate);
            $("#ex_id").append(data.ex_data);
         }
    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 3; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {
            $(".level_class").val(count);

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

     $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });
}
</script>
@endsection