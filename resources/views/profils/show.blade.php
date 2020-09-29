
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/../css/sty.css">

@extends('layouts.app')

@section('content')

<br><br><br><br><br>

<h2 style="text-align:center"></h2>
<div class="col-md-12">
<div class="card">
 <img src="{!! $userprofil->image !!}" class="img-circle"  style="object-fit:cover;width:250px;
  height:250px; margin: auto;">  
  <h1>{!! $userprofil->nomcomplet !!}</h1>
 
  <h2>{!! $userprofil->profession !!}</h2>
   <p class="title">Bio:{!! $userprofil->bio !!}</p>
   <div class="col-md-3" style="margin: auto;">
  <a href="{{route('profils.edit',$userprofil->id)}}" style="font-size: 15px;"  class="btn btn-primary">Modifier mon profil</a>
  </div>
</div>
<br><br>
<div class="card-body">
  <h2 style="text-align:center"><b></b></h2>
 
  <div style="margin: 30px 10;">

     <a href="#"><i class="fa fa-venus-mars"></i> {!! $userprofil->sexe !!}</a> &nbsp;  
      <a href="#"><i class="fa fa-birthday-cake"></i> {{ $userprofil->datenaiss }}</a>  &nbsp; 
    <a href="#"><i class="fa fa-phone"></i> {!! $userprofil->telephone !!}</a>   &nbsp;
    <a href="#"><i class="fa fa-map-marker"></i> {!! $userprofil->adresse !!}</a>  
   
  </div>
  
</div>
</div>

@endsection