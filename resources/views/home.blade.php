@extends('layouts.app')

@section('content')
<?php 

$id=Auth::user()->id;
$prof=DB::table('profils')->where('user_id',$id)->first();




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
  </head>
  <body>
<br>  <br>  <br>  
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="colorlib-active"><a href="{{route('home')}}">Home</a></li>
                    
                    <li><a href="{{route('posts.create')}}">Creer un Post</a></li>
                       @if( $prof == true)
                     <li>
                       <a href="{{ route('profils.show',Auth::user()->id) }}"><i class="fa fa-btn fa-unlock"></i> mon profil</a>
                    
                       @endif
              @if($prof == false)
                 <li>
    
               <a href="{{ route('profils.create',Auth::user()->id) }}">completer mon profil</a>
   
                 </li>
   
                   @endif
                      <li>
    
              <a href="{{ route('posts.index') }}"><i class="fa fa-btn fa-unlock"></i>mes posts</a>
   
                      </li>
                   
                </ul>
            </nav>

            <div class="colorlib-footer">
<h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Lara <span>Social</span></a></h1>
               
                
            </div>
        </aside> <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-8 py-5 px-md-5">
                        <div class="row pt-md-4">
                              @foreach ($posts as $post)
                            <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex">
                                   <img src="{!! $post->image !!}"  style="object-fit:cover;width:250px;
  height:250px;">  
    
                                        <div class="text text-2 pl-md-4">
                              <h3 class="mb-2"><a href="{{ route('posts.show', $post->id ) }}">{{ $post->titre }}</a></h3>
                              <div class="meta-wrap">
                                                <p class="meta">
                                    <span><i class="icon-calendar mr-2"></i>{{ $post->created_at}}</span>
                                    </span>
                                    <span><i class="icon-comment2 mr-2"></i></span>
                                </p>
                            </div>
                              <p class="mb-4">{{ $post->description}}.</p>
                              <p><a href="{{ route('posts.show', $post->id ) }}" class="btn-custom">Voir plus <span class="ion-ios-arrow-forward"></span></a></p>
                            </div>
                                    </div>
                                </div>
                                @endforeach
                               
                                
                                
                               
                               
                               
                               
                               
                              
                             
                        </div><!-- END-->



                        <div class="row">
                      
                    </div>
                    </div>
                    <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
                <div class="sidebar-box pt-md-4">
                  <form action="#" class="search-form">
                    <div class="form-group">
                      <span class="icon icon-search"></span>
                      <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                    </div>
                  </form>
                </div>
               

                <div class="sidebar-box ftco-animate">
                  <h3 class="sidebar-heading">Popular Post</h3>
                  <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                    <div class="text">
                      <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                    <div class="text">
                      <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                    <div class="text">
                      <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                      </div>
                    </div>
                  </div>
                </div>

                

                           

               


                
              </div><!-- END COL -->
                </div>
            </div>
        </section>
        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('assets/js/popper.min.js')}}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('assets/js/aos.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('assets/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('assets/js/google-map.js')}}"></script>
  <script src="{{ asset('assets/js/main.js')}}"></script>
    
  </body>
</html>
@endsection
