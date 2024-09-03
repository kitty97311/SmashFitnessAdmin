<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>{{__("message.login_admin")}}</title>
      <meta name="description" content="{{__('messages.meta_description_admin')}}">
      <meta name="title" content="{{__('messages.meta_title_admin')}}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta property="og:type" content="website"/>
      <meta property="og:url" content="{{url('/')}}"/>
      <meta property="og:title" content="{{__('messages.site_name')}}"/>
      <meta property="og:image" content="{{asset('App_icon.png')}}"/>
      <meta property="og:image:width" content="250px"/>
      <meta property="og:image:height" content="250px"/>
      <meta property="og:site_name" content="{{__('messages.site_name')}}"/>
      <meta property="og:description" content="{{__('messages.meta_description_admin')}}"/>
      <meta property="og:keyword" content="{{__('messages.meta_keyword')}}"/>
      <link rel="apple-touch-icon" href="apple-icon.png">
      <link rel="shortcut icon" href="{{asset('App_icon.png')}}">
      <link rel="stylesheet" href="{{asset('adesign/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('adesign/vendors/font-awesome/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('adesign/vendors/themify-icons/css/themify-icons.css')}}">
      <link rel="stylesheet" href="{{asset('adesign/vendors/flag-icon-css/css/flag-icon.min.css')}}">
      <link rel="stylesheet" href="{{asset('adesign/vendors/selectFX/css/cs-skin-elastic.css')}}">
      @if(Session::get("is_rtl")==""||Session::get("is_rtl")=='1')
        <link rel="stylesheet" href="{{asset('adesign/assets/css/style.css')}}">
      @else
      <link rel="stylesheet" href="{{asset('adesign/assets/css/rtl.css?v=2')}}">
      @endif
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark" onload="gettimezone()">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-logo">
                  <a href="index.html">
                  <span>{{__("message.login_admin")}}</span> 
                
                  </a>
               </div>
               <div class="login-form">
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

                  <form action="{{route('PostLogin')}}" method="post">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">   
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" value="admin@gmail.com" class="form-control" name="email"placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="123" class="form-control"  name="password" placeholder="Password">
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                        
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Sign in</button>      
                  </form>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="site_url" value="{{url('/')}}" />
      <script src="{{asset('adesign/vendors/jquery/dist/jquery.min.js')}}"></script>
      <script src="{{asset('adesign/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
      <script src="{{asset('adesign/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('adesign/assets/js/main.js')}}"></script>       
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="{{asset('adesign/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script src="{{asset('js/admin.js?v=88')}}"></script>
   </body>
</html>