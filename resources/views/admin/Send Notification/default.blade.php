@extends('admin.layout')
@section('title')
    {{__("message.send_not")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.send_not")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.send_not")}}</a></li>
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
                        <strong class="card-title">{{__("message.send_not")}}</strong>
                    </div>

                    <div class="card-body">

                        <a  rel="tooltip" title="" style="border-radius: 4px; color:white;" class="btn btn-dark btn-sm" data-original-title="Remove" data-toggle="modal" data-target="#add" ><i class="fa fa-plus "> <span>  {{__("message.add_not")}}</span></i></a>
                        
                        <div class="table-responsive">
                            <table class="table" id="send_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Message</th>
                                        
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
               <h5 class="modal-title">{{__("message.add_not")}}</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form id="form"action="{{route('add_not')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                   <div class="form-group">
                        <label>Message</label>
                        <textarea type="text" class="form-control"  name="message" placeholder="Enter Notification" required></textarea>
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

@endsection
@section('footer')

<script type="text/javascript">
    $(document).ready(function(){
      
        $('#send_datatable').DataTable({
        
            ajax: '{{route("send_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{data: 'message',
                   name: 'message',
                }],        
            order: [
                [0, "DESC"]
            ]
        });

        
  });   

</script>
@endsection