@extends('admin.layout')
@section('title')
    {{__("message.IOS_not")}}
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.IOS_not")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#" id="email">{{__("message.IOS_not")}}</a></li>
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
    <div class="animated">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{__("message.IOS_not")}}</h5>
            </div>
            <div class="modal-body">
              <form id="form"action="{{route('edit_ios')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                    <input type="hidden" class="form-control" name="id" value="{{$ios->id}}" >
                    
                <div class="form-group" style="padding:15px;">
                  <label>IOS server key</label>
                  <input type="text" class="form-control" name="ios_key" value="{{$ios->ios_key}}"  required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-md btn-success" value="update"><span>Save Changes</span></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('footer')

@endsection