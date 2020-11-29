<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>


    <!--   Core JS Files   -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>

    <!-- Styles -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body > 
    <div class="wrapper" >

        <div class="sidebar" data-color="azure" data-image="{{ asset('assets/img/1.jpg') }}">

<!--

sidebar : data-color="blue | azure | green | orange | red | purple"

-->

<div class="sidebar-wrapper">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">
            {{ config('app.name') }}
        </a>
    </div>

    <ul class="nav">
        <li class="{{ request()->routeIs('vendor.index')? 'active' : '' }}">
            <a href="{{ route('vendor.index')}}">
                <i class="pe-7s-portfolio"></i>
                <p>Details</p>
            </a>
        </li>

        <li class="{{ request()->routeIs('vendor.showtechnicians')? 'active' : '' }}">
            <a href="{{ route('vendor.showtechnicians')}}">
                <i class="pe-7s-user"></i>
                <p>Technicians</p>
            </a>
        </li>

        <li class="{{ request()->routeIs('vendor.viewskillset')? 'active' : '' }}">
            <a href="{{ route('vendor.viewskillset')}}">
                <i class="pe-7s-study"></i>
                <p>Skill Set</p>
            </a>
        </li>

        <li class="{{ request()->routeIs('vendor.documentupload')? 'active' : '' }}">
            <a href="{{ route('vendor.documentupload')}}">
                <i class="pe-7s-albums"></i>
                <p>Insurance & Financial</p>
            </a>
        </li>     

        <li class="{{ request()->routeIs('vendor.documentupload2')? 'active' : '' }}">
            <a href="{{ route('vendor.documentupload2')}}">
                <i class="pe-7s-cloud-upload"></i>
                <p>Work Area & Technical</p>
            </a>
        </li>

        <li class="{{ request()->routeIs('vendor.rates')? 'active' : '' }}">
            <a href="{{ route('vendor.rates')}}">
                <i class="pe-7s-piggy"></i>
                <p>Rates</p>
            </a>
        </li>       

        <li class="{{ request()->routeIs('vendor.formsandagreements')? 'active' : '' }}">
            <a href="{{ route('vendor.formsandagreements')}}">
                <i class="pe-7s-print"></i>
                <p>Forms</p>
            </a>
        </li>                          

    </ul>
</div>
</div>



<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                {{ Auth::user()->name }} 
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>                                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </nav>



    @if( session('status'))
    <div class="alert alert-info text-center">
        <span>{{ session('status')}} </span>
    </div>     


    @endif




    <!--Content Area!-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    <!--Footer Area!-->
    <footer class="footer">
        <div class="container-fluid">

            <p class="copyright pull-right">
                {{ now()->year }}  {{ config('app.name') }}
            </p>
        </div>



    </footer>

</div>

</div>

</body>

@yield('scripts')

<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>




</html>



