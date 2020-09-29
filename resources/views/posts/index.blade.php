@extends('layouts.app')
@section('content')





<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> POST

   </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>TITRE</th>
                     <th>DESCRIPTION</th>
                      <th>IMAGE</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->titre }}</td> 
                    <td>{{ $post->description }}</td> 
                    <td><img src="{!! $post->image !!}" style="height: 50px;width: 80px;"></td> 

                    <td>
                    <a href="{{ URL::to('posts/'.$post->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('posts/create') }}" class="btn btn-success">Add Post</a>

</div>

@endsection
   