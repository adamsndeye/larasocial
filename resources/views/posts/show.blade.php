

@extends('layouts.app')

@section('content')
<?php 



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Larasocial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
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

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">

			<nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li ><a href="{{route('home')}}">Home</a></li>
                    <li class="colorlib-active" ><a href="{{route('posts.index')}}">Post</a></li>
                    <li><a href="{{route('posts.create')}}">Creer un Post</a></li>
                    
                </ul>
            </nav>

		
			
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<p><a  href="{{route('posts.edit',$post)}}">Modifier le post</a></p>
	    				<div class="row pt-md-4">
	    					
	    					<h1 class="mb-3">{{ $post->titre }}</h1>
	    					
	    					<br><br>
		            
		           
		                <img src="{!! $post->image !!}" >
		           
		            <br>
		            <p>{{ $post->description }}</p>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-header">Comments</h2>
       @forelse($post->comments as $comment)
        <section class="comment-list">  
 			<article class="row">
            <div class="col-md-3 col-sm-3 hidden-xs">
            	
              <figure class="thumbnail">
              	
                <img class="img-responsive" src="" />
                <figcaption class="text-center">{{$comment->user->name}}</figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> </div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$comment->created_at->format('d/m/y')}}</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      {{$comment->message}}
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </article>
           </section>
           @empty
		    <div class="alert alert-info">aucun commentaire pour ce post</div>
		   @endforelse
    </div>
  </div>
</div>

		            <div class="pt-5 mt-5">
		            	 <!--
		              <h3 class="mb-5 font-weight-bold"> Commentaires</h3>
		            
                       @forelse($post->comments as $comment)
		                  <ul class="children">
		                <li class="comment">
		                  <div class="comment-body">
		                    <h3>{{$comment->user->name}}</h3>
		                    <div class="meta">Posté le:{{$comment->created_at->format('d/m/y')}}</div>
		                    <p>{{$comment->message}}</p>
		                   
		                  </div>
		                </li>
		              </ul>
		              	@empty
		              <div class="alert alert-info">aucun commentaire pour ce post</div>
		              @endforelse
		              END comment-list -->
		              
		              <div class="comment-form-wrap pt-5">
		                <h3 class="mb-5"> Votre commentaire</h3>
		                <form action="{{route('comments.store',$post)}}" method="POST" class="p-3 p-md-5 bg-light">
		                  @csrf

		                  <div class="form-group">
		                    <label for="message">Message</label>
		                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
		                  </div>
		                  <div class="form-group">
		                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
		              </div>
		            </div>
			    		</div><!-- END-->
			    	</div>
	    			<div class="col-lg-4 sidebar ftco-animate bg-light pt-5">
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