<?php 
$id= Auth::user()->id;

$ig= DB::table('profils')->select('image')->where('user_id',$id)->first();

 ?>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Larasocial') }}</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/../css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- Scripts -->
   
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
</head>
<body>


        <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
                         <a class="navbar-brand" href="#"><h1 style="color: blue;">Larasocial</h1></a>
                            <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon "></span>
                            </button>
                              <div class="collapse navbar-collapse " id="collapsibleNavbar">
                                  <ul class="navbar-nav ml-auto ">

                                 @guest
                            <li class="nav-item">
                                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                             @else

  
<div class="dropdown">
  <button class="btn btn-primary   dropdown-toggle" type="button" data-toggle="dropdown" style="font-size:15px; ">
    @if($ig == true)
    <img src="{!! $ig->image !!}" class="img-circle" style="width: 40px;height: 40px;">
    @endif
     {{ Auth::user()->name }}  
  </button>
  <ul class="dropdown-menu">
    
  
     @role('admin') 
    <a href="{{ route('users.index') }}"><i class="fa fa-btn fa-unlock"></i>users</a>
    @endrole
    </li>
    
    
    <li>
        
    <a class="dropdown-item" href="{{ route('logout') }}"
      onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>
<i class="fa fa-btn fa-unlock"></i>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
    </li>
    <li><a style="font-size: 10px;" href="{{('/home')}}">Home</a></li>
    
  </ul>
</div>
                        @endguest



                                     
                              </div>  
</nav>



    <div id="app">
       
        @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 

        <div class="row">
            <div class="col-md-8 col-md-offset-2">              
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
