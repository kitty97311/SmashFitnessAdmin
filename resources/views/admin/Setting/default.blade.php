@extends('admin.layout')
@section('title')
    {{__("message.setting")}}
@endsection
@section('content')
<style>
  .nav-link{
    color:gray;
    font-size :20px;
    font-weight: 500;
  }
  .nav-tabs .nav-link.active{
    color:black;
  }
  a{
    color:#218838;
  }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{__("message.setting")}}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">{{__("message.setting")}}</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <strong class="card-title">{{__("message.setting")}}</strong>
        </div>
        <form id="form" action="{{route('pay_set')}}" method="post" enctype="multipart/form-data" style="margin:05px;">
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <nav >
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Stripe Detail</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pay  Stack Detail</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Razor Pay Detail</button>
                <button class="nav-link" id="nav-rave-tab" data-bs-toggle="tab" data-bs-target="#nav-rave" type="button" role="tab" aria-controls="nav-Rave" aria-selected="false">Rave Detail</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent" style="margin:10px;">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <input type="hidden" class="form-control" name="id" value="{{ $pay->id }}" >
                <label for="name" class=" form-control-label">
                    Stripe Is Active</label>
                <div class="form-group">
                    <a href="{{url('add1')}}/{{$pay->stripe_is_active}}" style="border:none;background: none;font-size: 40px;margin-bottom:-20px">
                    @if ($pay->stripe_is_active == 1) 
                    <i class="fa fa-toggle-on iconde"></i>
                    @else   
                    <i class="fa fa-toggle-off iconde"></i>
                    @endif
                    </a>
                </div>
                <div class="form-group">
                   <label>Stripe Key</label>
                   <input type="text" class="form-control" name="stripe_key" value="{{$pay->stripe_key}}" >
                </div>
                <div class="form-group">
                   <label>Stripe Secert</label>
                   <input type="text" class="form-control" name="stripe_secert" value="{{$pay->stripe_secert}}" >
                </div>
                <div class="form-group">
                   <label>Stripe Currency</label>
                   <input type="text" class="form-control" name="stripe_currency" value="{{$pay->stripe_currency}}" >
                </div>
                <div>
                  <button style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-success btn-sm" ><i class="fa fa-edit "><span> UPDATE</span></i></button>
                </div>
              </div>

              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <label for="name" class=" form-control-label">Paystack Is Active</label>
                <div class="form-group">
                    <a href="{{url('add2')}}/{{$pay->paystack_is_active}}" style="border:none;background: none;font-size: 40px;margin-bottom:-20px">
                    @if ($pay->paystack_is_active == 1) 
                    <i class="fa fa-toggle-on iconde"></i>
                    @else   
                    <i class="fa fa-toggle-off iconde"></i>
                    @endif
                    </a>
                </div>
                <div class="form-group">
                   <label>Paystack Public Key</label>
                   <input type="text" class="form-control" name="paystack_public_key" value="{{$pay->paystack_public_key}}" >
                </div>
                <div class="form-group">
                   <label>Paystack Secert Key</label>
                   <input type="text" class="form-control" name="paystack_secert_key" value="{{$pay->paystack_secert_key}}" >
                </div>
                <div class="form-group">
                   <label>Payment Url</label>
                   <input type="text" class="form-control" name="payment_url" value="{{$pay->payment_url}}" >
                </div>
                <div class="form-group">
                   <label>Merchant Email</label>
                   <input type="text" class="form-control" name="merchant_email" value="{{$pay->merchant_email}}" >
                </div>
                <div>
                  <button  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-success btn-sm" ><i class="fa fa-edit "><span> UPDATE</span></i></button>
                </div>
              </div>

              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <label for="name" class=" form-control-label">Razorpay Is Active</label>
                <div class="form-group">
                    <a href="{{url('add3')}}/{{$pay->razorpay_is_active}}" style="border:none;background: none;font-size: 40px;margin-bottom:-20px">
                    @if ($pay->razorpay_is_active == 1) 
                    <i class="fa fa-toggle-on iconde"></i>
                    @else   
                    <i class="fa fa-toggle-off iconde"></i>
                    @endif
                    </a>
                </div>
                <div class="form-group">
                   <label>Razorpay Public Key</label>
                   <input type="text" class="form-control" name="razorpay_key" value="{{$pay->razorpay_key}}" >
                </div>
                <div class="form-group">
                   <label>Razorpay Secert Key</label>
                   <input type="text" class="form-control" name="razorpay_secert_key" value="{{$pay->razorpay_secert_key}}" >
                </div>
                <div>
                  <button  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-success btn-sm" ><i class="fa fa-edit "><span> UPDATE</span></i></button>
                </div>
              </div>

              <div class="tab-pane fade" id="nav-rave" role="tabpanel" aria-labelledby="nav-rave-tab">
                <label for="name" class=" form-control-label">Flutterwave Is Active</label>
                <div class="form-group">
                    <a href="{{url('add')}}/{{$pay->flutterwave_is_active}}" style="border:none;background: none;font-size: 40px;margin-bottom:-20px">
                    @if ($pay->flutterwave_is_active == 1) 
                    <i class="fa fa-toggle-on iconde"></i>
                    @else   
                    <i class="fa fa-toggle-off iconde"></i>
                    @endif
                    </a>
                </div>
                <div class="form-group">
                  <label>Flutterwave Public Key</label>
                  <input type="text" class="form-control" name="flutterwave_public_key" value="{{$pay->flutterwave_public_key}}" >
                </div>
                <div class="form-group">
                  <label>Flutterwave Secert Key</label>
                  <input type="text" class="form-control" name="flutterwave_secret_key" value="{{$pay->flutterwave_secret_key}}" >
                </div>
                <div class="form-group">
                  <label>Flutterwave Secert Hash</label>
                  <input type="text" class="form-control" name="flutterwave_secret_hash" value="{{$pay->flutterwave_secret_hash}}" >
                </div>
                <div>
                  <button  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-success btn-sm" ><i class="fa fa-edit "><span> UPDATE</span></i></button>
                </div>
            </div>
              
            </div>
        </form>
    </div>
</div>
@endsection
@section('footer')
    
@endsection