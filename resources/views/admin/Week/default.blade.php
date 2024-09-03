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
                            <table class="table" id="week_datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Cat Id</th>
                                        <th scope="col">Week</th>
                                        <th colspan="1" style="text-align:center">Action</th>
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

@endsection
@section('footer')

<script type="text/javascript">
    $(document).ready(function(){
      
        $('#week_datatable').DataTable({
          
            ajax: '{{route("week_datatable")}}',
            columns: [{
                   data: 'id',
                   name: 'id',
                  
                },{
                   data: 'cat_id',
                   name: 'cat_id'
               },{
                   data: 'week',
                   name: 'week'
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

</script>
@endsection