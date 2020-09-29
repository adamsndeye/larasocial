@extends('layouts.app')

@section('title', '| Modifier Profil')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Mise a jour du profil </h1>
    <hr>
 {{ Form::model($profil, array('route' => array('profils.update', $profil->id), 'method' => 'patch','enctype'=>'multipart/form-data')) }}
     
@csrf()
    <div class="form-group ">
        {!! Form::label('nomcomplet', 'Nom complet') !!}<br>
        {!! Form::text('nomcomplet', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group ">
        {!! Form::label('sexe', 'Sexe:') !!}<br>
    {!! Form::select('sexe', ['Masculin' => 'Masculin', 'Feminin' => 'Feminin'], null, ['class' => 'form-control']) !!}
    </div>

    <div class='form-group '>
        {!! Form::label('telephone', 'Telephone:') !!}<br>
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group ">
        {!! Form::label('adresse', 'Adresse:') !!}<br>
    {!! Form::text('adresse', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group ">
       {!! Form::label('datenaiss', 'Date de naissance :') !!}<br>
    {!! Form::date('datenaiss', null, ['class' => 'form-control']) !!}

    </div>
    <div class="form-group ">
       {!! Form::label('bio', 'bio :') !!}<br>
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}

    </div>
    <div class="form-group ">
       {!! Form::label('profession', 'profession :') !!}<br>
    {!! Form::text('profession', null, ['class' => 'form-control']) !!}

    </div>
     {!! Form::label('image', 'Photo :') !!}<br>

    <img  src="{!! $profil->image !!}" height="100px" width="100px" class="img-circle"  onclick="triggerClick()" id="profilDisplay"  >
                
    <input type="file"  name="image" id="profilimage"  onchange="displayImage(this)" style="display: none";  >

           <br><br><br>      
<div class="form-group col-md-6">
    {{ Form::submit('Add', array('class' => 'btn btn-primary btn-lg')) }}
</div>
    {{ Form::close() }}

</div>
<script type="text/javascript" src="/../js/script.js"></script>

@endsection