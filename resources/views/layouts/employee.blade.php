<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title>@yield('PageTitle') </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('plugins/materialize/css/materialize.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('plugins/materialize/css/materialize.css')}}"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('plugins/material-preloader/css/materialPreloader.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <link href="{{asset('plugins/google-code-prettify/prettify.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Theme Styles -->
    <link href="{{asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<div class="mn-content fixed-sidebar">
    <header class="mn-header navbar-fixed">


        <nav class="navbar navbar-expand-lg navbar-light py-3 " >
            <div class="nav-wrapper row">
                <marquee width="950px" direction="left" behavior="alternate" ><span style="font-size:38px; font-weight:bold;color:#2a29bf;font-family:'lobster', cursive;">Order Management System</span>
                </marquee>
                <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav d-flex justify-content-center align-items-center">


                    </div>
                </div>

                <ul class="right col s9 m3 nav-right-menu">

                    <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                </ul>

                <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                    <li class="notificatoins-dropdown-container">
                        <ul>
                            <li class="notification-drop-title">Notifications</li>


                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside id="slide-out" class="side-nav white fixed">
        <div class="side-nav-wrapper">
            <div class="sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{asset('images/profile-image.png')}}" class="circle" alt="">
                </div>
                <div class="sidebar-profile-info">

                    <p>{{Auth::user()->name}}</p>


                </div>
            </div>

            <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Customers<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('customer.index')}}">Manage Customer</a></li>
                        </ul>
                    </div>
                </li>

                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Orders<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('order.index')}}">Manage Orders</a></li>
                        </ul>
                    </div>
                </li>


                <li class="no-padding"><a class="waves-effect waves-grey" href="changepassword.php"><i class="material-icons">settings_input_svideo</i>Change Password</a></li>

                <li class="no-padding">
                    <a class="waves-effect waves-grey" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <i class="material-icons">exit_to_app</i>Log Out</a>

                </li>




            </ul>
            <div class="footer">
                <p class="copyright"><a target="__blank" href="http://phptpoint.com/">OMS </a>©</p>

            </div>
        </div>
    </aside>
    <main class="mn-inner">
        @yield('user')
    </main>

</div>
<div class="left-sidebar-hover"></div>

<!-- Javascripts -->
<script src="{{asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('plugins/materialize/js/materialize.min.js')}}"></script>
<script src="{{asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
<script src="{{asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
<script src="{{asset('plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/alpha.min.js')}}"></script>
<script src="{{asset('js/pages/table-data.js')}}"></script>
<script src="{{asset('js/pages/ui-modals.js')}}"></script>
<script src="{{asset('plugins/google-code-prettify/prettify.js')}}"></script>

</body>
</html>
