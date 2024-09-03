@extends('admin.layout')
@section('title')
    {{__("message.supplement")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.supplement")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.supplement")}}</a></li>
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
                        <strong class="card-title">{{__("message.supplement")}}</strong>
                    </div>

                    <div class="card-body">

                        <a rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="add" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_supplement")}}</span></i></a>

                        <div class="table-responsive">
                            <table class="table" id="supplement_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Main Image</th>
                                        <th scope="col">Second Image</th>
                                        <th scope="col">Third Image</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Rating</th>
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
               <h5 class="modal-title">{{__("message.add_supplement")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_supplement')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="supplement_name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Enter Description:" name="supplement_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control"  name="supplement_price" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" class="form-control"  name="supplement_rating" placeholder="0-5">
                    </div>
                    <div class="form-group">
                        <label>Main Image</label>
                        <input type='file' class='form-control' name='supplement_image1' placeholder='Enter Image:' required> <br>
                    </div>
                    <div class="form-group">
                        <label>Second Image</label>
                        <input type='file' class='form-control' name='supplement_image2' placeholder='Enter Image:'> <br>
                    </div>
                    <div class="form-group">
                        <label>Third Image</label>
                        <input type='file' class='form-control' name='supplement_image3' placeholder='Enter Image:'> <br>
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
               <h5 class="modal-title">{{__("message.edit_supplement")}}</h5>
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
                  <form id="form" action="{{route('edited_supplement')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="id1">
                    </div> 
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="supplement_name1" name="supplement_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="supplement_description1" name="supplement_description" placeholder="Enter Description:"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" id="supplement_price1" name="supplement_price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" class="form-control" id="supplement_rating1" name="supplement_rating" placeholder="0-5">
                    </div>
                    <div class="form-group">
                        <label>Main Image</label>
                        <img id="image1" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                        <input type="hidden" name="old_image1" id="old_image1"/>
                        <input type="file" class="form-control" id="supplement_image1"  name="supplement_image1" accept="image/*" >
                    </div>
                    <div class="form-group">
                        <label>Second Image</label>
                        <img id="image2" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                        <input type="hidden" name="old_image2" id="old_image2"/>
                        <input type="file" class="form-control" id="supplement_image2"  name="supplement_image2" accept="image/*" >
                    </div>
                    <div class="form-group">
                        <label>Third Image</label>
                        <img id="image3" style="height: 100px; margin-top: 5px; margin-bottom: 10px;" />
                        <input type="hidden" name="old_image3" id="old_image3"/>
                        <input type="file" class="form-control" id="supplement_image3"  name="supplement_image3" accept="image/*" >
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

<div class="modal fade" id="delete_supplement" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_supplement")}}</h5>
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
               <form id="form" action="{{('deleted_supplement')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This Supplement..?
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
        $('#supplement_datatable').DataTable({
            ajax: '{{route("supplement_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                },{
                   data: 'supplement_name',
                   name: 'supplement_name'
                },{
                   data: 'supplement_description',
                   name: 'supplement_description'
                },{
                   data: 'supplement_image1',
                   name: 'supplement_image1'
                },{
                   data: 'supplement_image2',
                   name: 'supplement_image2'
                },{
                   data: 'supplement_image3',
                   name: 'supplement_image3'
                },{
                   data: 'supplement_price',
                   name: 'supplement_price'
                },{
                   data: 'supplement_rating',
                   name: 'supplement_rating'
                },{
                    data: 'action',
                    name: 'action'
                }
            ],
            columnDefs: [
                {
                    targets: 3,
                    render: function (data) {
                        return '<img src="'+data+'" style="height:100px;"/>';
                    }
                },
                {
                    targets: 4,
                    render: function (data) {
                        if (data == null) return '';
                        return '<img src="'+data+'" style="height:100px;"/>';
                    }
                },
                {
                    targets: 5,
                    render: function (data) {
                        if (data == null) return '';
                        return '<img src="'+data+'" style="height:100px;"/>';
                    }
                },
            ],
            order: [
                [0, "DESC"]
            ]
        });
    });

    function edit_supplement(id) {
        $.ajax({
            url: $("#path_admin").val()+"/edit_supplement"+"/"+id,
            data: { },
            success: function(data)
            {
                $("#id1").val(data.id);
                $("#supplement_name1").val(data.name);
                $("#supplement_description1").val(data.description);
                $("#supplement_price1").val(data.price);
                $("#supplement_rating1").val(data.rating);
                $("#old_image1").val(data.image1);
                $('#image1').attr("src", $("#path_admin").val()+"/storage/app/public/images/supplement/"+"/"+data.image1);
                $("#old_image2").val(data.image2);
                if (data.image2 != null) $('#image2').attr("src", $("#path_admin").val()+"/storage/app/public/images/supplement/"+"/"+data.image2);
                $("#old_image3").val(data.image3);
                if (data.image3 != null) $('#image3').attr("src", $("#path_admin").val()+"/storage/app/public/images/supplement/"+"/"+data.image3);
            }
        });
    }

    function delete_supplement(id) {
        $.ajax({
            url: $("#path_admin").val()+"/delete_supplement"+"/"+id,
            data: { },
            success: function(data)
            {
                $("#real_id").val(data.id);
            }
        });
    }
</script>
@endsection