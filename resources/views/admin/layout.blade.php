<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fitness</title>
    <meta name="description" content="Exercise Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('vendors/jqvmap/dist/jqvmap.min.css')}}">
    <script src=https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                >
                <div style="color:white; font-size:22px;">{{__("message.admin")}}</div>
                <!-- <a class="navbar-brand" href="./"><img src="{{url('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{url('images/logo2.png')}}" alt="Logo"></a> -->
            </div>
            <hr style="border-top: 1px solid white;">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{url('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>{{__("message.Dashboard")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('category')}}"> <i class="menu-icon fa fa-th-large"></i>{{__("message.category")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('smash')}}"> <i class="menu-icon fa fa-list-alt"></i>{{__("message.smash")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('sub_smash')}}"> <i class="menu-icon fa fa-list-alt"></i>{{__("message.sub_smash")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('smashplus')}}"> <i class="menu-icon fa fa-list-alt"></i>{{__("message.smashplus")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('sub_smashplus')}}"> <i class="menu-icon fa fa-list-alt"></i>{{__("message.sub_smashplus")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('workout')}}"> <i class="menu-icon fa fa-list-alt"></i>{{__("message.workout")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('workout_set')}}"> <i class="menu-icon fa fa-list-alt"></i>{{__("message.workout_set")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('exercise')}}"><i class="menu-icon fa fa-snowflake-o"></i>{{__("message.exercise")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('ex_set')}}"><i class="menu-icon fa fa-user"></i>{{__("message.sets")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('user')}}"><i class="menu-icon fa fa-users"></i>{{__("message.user_info")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('supplement')}}"> <i class="menu-icon fa fa-gift"></i>{{__("message.supplement")}} </a>
                        </li>
                        <h3 class="menu-title">Privacy Policy</h3>
                     <li>
                        <a href="{{url('about')}}" class="waves-effect">
                        <i class="menu-icon fa fa-lock "></i>
                        <span>{{__('message.About')}}</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{url('Terms_condition')}}" class="waves-effect">
                        <i class="menu-icon fa fa-lock"></i>
                        <span>{{__('message.term')}}</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{url('app_privacy')}}" class="waves-effect">
                        <i class="menu-icon fa fa-lock"></i>
                        <span>{{__('message.Privecy')}}</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{url('data_deletion')}}" class="waves-effect">
                        <i class="menu-icon fa fa-lock"></i>
                        <span>{{__('message.Data-Deletion')}}</span>
                        </a>
                     </li>
                     <h3 class="menu-title">Notification</h3>
                        <li class="">
                            <a href="{{url('send_not')}}"><i class="menu-icon fa fa-bell"></i>{{__("message.send_not")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('android_notification')}}"><i class="menu-icon fa fa-key"></i>{{__("message.ad_not")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('IOS_notification')}}"><i class="menu-icon fa fa-apple"></i>{{__("message.IOS_not")}} </a>
                        </li>
                       <!--  <li class="">
                            <a href="{{url('about')}}"><i class="menu-icon fa fa-list-alt"></i>{{__("message.about")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('terms')}}"><i class="menu-icon fa fa-balance-scale"></i>{{__("message.terms")}} </a>
                        </li>
                        <li class="">
                            <a href="{{url('setting')}}"><i class="menu-icon fa fa-cog"></i>{{__("message.setting")}} </a>
                        </li> -->
                    </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks" style="margin-top: 12px;"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{url('images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{route('Profile')}}"><i class="fa fa-user"></i> My Profile</a>

                            <!-- <a class="nav-link" href="{{route('send_not')}}"><i class="fa fa-user"></i> Notifications </a> -->

                            @if(session()->has('admin'))
                                <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                            @else
                                <a class="nav-link" href="{{route('PostLogin')}}"><i class="fa fa-power-off"></i> Login</a>
                            @endif
                           
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

      @yield('content')

        
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <input type="hidden" id="path_admin" value="{{url('/')}}">


    <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{url('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>

    
    <script src="{{url('js/widgets.js')}}"></script>

  
    
   
   @yield('footer')
</body>

</html>
