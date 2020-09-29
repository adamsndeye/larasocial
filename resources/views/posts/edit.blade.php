
{{-- \resources\views\posts\edit.blade.php --}}

@extends('layouts.app')

@section('title', '| Edit Post')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Edit Post</h1>
    <hr>

  {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
         {{ Form::label('titre', 'Titre') }}
         {{ Form::text('titre', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {!! Form::label('image', 'Image:') !!}
     {!! Form::file('image',array('class' => 'form-control')) !!}
    </div>

   

    <div class='form-group'>
         {{ Form::label('description', 'Post Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
 {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
</div>

@endsection




























