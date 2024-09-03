@extends('admin.layout')
@section('title')
    {{__("message.user")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.user")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.user")}}</a></li>
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
                        <strong class="card-title">{{__("message.user")}}</strong>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" id="user_datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                            <th>name</th>
                                            <th>phone</th>
                                            <th>Gender</th>
                                            <th>WorkOut Intensity</th>
                                            <th>Age</th>
                                            <th>Height</th>
                                            <th>Exercise Days</th>
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

<div class="modal fade" id="delete_user" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">{{__("message.delete_user")}}</h5>
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
               <form id="form" action="{{('deleted_user')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">  
                     <div class="form-group hidden">
                         <input type="hidden" class="form-control" name="id" value="" id="real_id">
                    </div> 
                    <p> Are You Sure You Want To Delete This User..?
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
      
        $('#user_datatable').DataTable({
        
            ajax: '{{route("user_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{
                   data: 'name',
                   name: 'name'
               },{
                   data: 'phone',
                   name: 'phone'
               },{
                   data: 'gender',
                   name: 'gender'
               },{
                   data: 'workout_intensity',
                   name: 'workout_intensity'
               },{
                   data: 'age',
                   name: 'age'
               },{
                   data: 'height',
                   name: 'height'
               },{
                   data: 'exercise_days',
                   name: 'exercise_days'
               }
            ],
                    
            order: [
                [0, "DESC"]
            ]
        });

        
  });   

function delete_user(id){
       $.ajax( {
         url: $("#path_admin").val()+"/delete_user"+"/"+id,
         data: { },
         success: function(data)
         {
            $("#real_id").val(data.id);
         }
    });
}
</script>
@endsection