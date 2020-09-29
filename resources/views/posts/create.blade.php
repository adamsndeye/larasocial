@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Post</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'posts.store','enctype'=>'multipart/form-data')) }}
@csrf()
                  {{ Form::label('titre', 'Titre') }}
            {{ Form::text('titre', null, array('class' => 'form-control')) }}
                      <div class="form-group">
                      {!! Form::label('image', 'Image:') !!}
                         {!! Form::file('image',array('class' => 'form-control')) !!}
                      </div>
                    
<br>
           <div class="form-group">
            {{ Form::label('description', 'Post Description') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
             </div>
            <br>

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection