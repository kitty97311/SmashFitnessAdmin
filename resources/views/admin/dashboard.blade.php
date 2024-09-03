

@extends('admin.layout')
@section('title')
  {{__("message.Dashboard")}}
@endsection
 @section('content')

  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.Dashboard")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">{{__("message.Dashboard")}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if (Session::has('error'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

@endif

<div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully Login with Email Is  {{ Session::get('admin')->email }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="content mt-3">
              <div class="col-sm-6 col-lg-4">
                  <div class="card text-white bg-flat-color-1">
                      <div class="card-body pb-0">
                        
                          <h4 class="mb-0" >
                              <span class="count">{{$count_category}}</span>
                          </h4>
                          <p class="text-light" style="font-size:18px;">Total Exercise Category</p>
                      </div>

                  </div>
              </div>  
          
              <div class="col-sm-6 col-lg-4">
                  <div class="card text-white bg-flat-color-4">
                      <div class="card-body pb-0">
                          
                          <h4 class="mb-0">
                              <span class="count">{{$count_exercise}}</span>
                          </h4>
                          <p class="text-light" style="font-size:18px;">Total Exercise Item</p>
                      </div>
                  </div>
              </div>
              
              <div class="col-sm-6 col-lg-4">
                  <div class="card text-white bg-flat-color-3">
                      <div class="card-body pb-0">
                         
                          <h4 class="mb-0">
                              <span class="count">{{$count_not}}</span>
                          </h4>
                          <p class="text-light" style="font-size:18px;">Total Push sent</p>
                      </div>
                  </div>
              </div>
           </div>

@endsection

