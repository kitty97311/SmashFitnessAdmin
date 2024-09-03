@extends('admin.layout')
@section('title')
    {{__("message.sub_smash")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.sub_smash")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.sub_smash")}}</a></li>
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
                        <strong class="card-title">{{__("message.sub_smash")}}</strong>
                    </div>

                    <div class="card-body">

                        <a rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="add" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_sub_smash")}}</span></i></a>

                        <div class="table-responsive">
                            <table class="table" id="sub_smash_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Smash Name</th>
                                        <th scope="col">Sub Smash Name</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Period</th>
                                        <th scope="col">Sub Smash Image</th>
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
               <h5 class="modal-title">{{__("message.add_sub_smash")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_sub_smash')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Sub Smash Name</label>
                        <input type="text" class="form-control"  name="sub_smash_name" placeholder="Sub Smash Name" required>
                    </div>
                    <div class="form-group">
                        <label>Period</label>
                        <input type="number" class="form-control"  name="period" placeholder="Period" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" required>
                            <option disabled selected="" value="">--select category--</option>
                            @foreach($category as $ex_category)
                                <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Smash Image</label>
                        <input type='file' class='form-control' name='sub_smash_image' placeholder='Enter Image:' required> <br>
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
               <h5 class="modal-title">{{__("message.edit_sub_smash")}}</h5>
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
                  <form id="form" action="{{route('edited_sub_smash')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="id1">
                    </div> 
                    <div class="form-group">
                        <label>Sub Smash Name</label>
                        <input type="text" class="form-control" id="sub_smash_name1" name="sub_smash_name" placeholder="Sub Smash Name">
                    </div>
                    <div class="form-group">
                        <label>Period</label>
                        <input type="number" class="form-control" id="period1" name="period" placeholder="Period" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" id="level1" required>
                            <option disabled selected="" value="">--select category--</option>
                            @foreach($category as $ex_category)
                                <option value="{{ $ex_category->id }}" {{($ex_category->id == old('category_id')) ? 'selected' : ''}}>{{ $ex_category->cat_name }}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Smash</label>
                        <select class="form-control" name="smash" id="smash1" required>
                            <option disabled selected="" value="">--select smash--</option>
                            <option value="0" {{(old("smash_id") == 0) ? 'selected' : ''}}>None</option>
                            @foreach($smash as $element)
                                <option value="{{ $element->id }}" {{($element->id == old('smash_id')) ? 'selected' : ''}}>{{ $element->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Smash Image</label>
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

<div class="modal fade" id="delete_sub_smash" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_sub_smash")}}</h5>
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
               <form id="form" action="{{('deleted_sub_smash')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This Sub Smash..?
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
        $('#sub_smash_datatable').DataTable({
            ajax: '{{route("sub_smash_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                },{
                   data: 'smash_name',
                   name: 'smash_name'
                },{
                   data: 'sub_smash_name',
                   name: 'sub_smash_name'
                },{
                   data: 'level',
                   name: 'level'
                },{
                   data: 'period',
                   name: 'period'
                },{
                   data: 'sub_smash_image',
                   name: 'sub_smash_image'
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

    function edit_sub_smash(id) {
        $.ajax({
            url: $("#path_admin").val()+"/edit_sub_smash"+"/"+id,
            data: { },
            success: function(data)
            {
                $("#id1").val(data.id);
                $("#smash1").val(data.smash_id);
                $("#sub_smash_name1").val(data.name);
                $("#period1").val(data.period);
                $("#level1").val(data.level_id);
                $("#old_image").val(data.img);
                $('#image1').attr("src", $("#path_admin").val()+"/storage/app/public/images/sub_smash/"+"/"+data.img);
            }
        });
    }

    function delete_sub_smash(id) {
        $.ajax({
            url: $("#path_admin").val()+"/delete_sub_smash"+"/"+id,
            data: { },
            success: function(data)
            {
                $("#real_id").val(data.id);
            }
        });
    }
</script>
@endsection