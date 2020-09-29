<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

use App\Post;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware(['auth','clearance']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $posts = Post::orderby('id', 'desc')->paginate(5); 

        
        return view('home', compact('posts'));
    }



     public function create() {
        return view('posts.create');
    }


     public function store(Request $request) { 

        $id=Auth::user()->id;
        $input = $request->all();
         $input['user_id']=$id;
        
          $photo=$request->file('image');
        $post = Post::create($input);
        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('photos',$request->file('image'));
                   $post->fill(['image' => asset($path)])->save();
               }

    
        return redirect()->route('posts.index')
            ->with('flash_message', 'Post,
             '. $post->titre.' created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Post::findOrFail($id); 

        return view ('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
       

        $post = Post::findOrFail($id);
        $post->description = $request->input('description');
         $post->titre = $request->input('titre');
        $photo=$request->file('image');
        $post->save();
          if ($request->file('image')) {
                   $path = Storage::disk('public')->put('photos',$request->file('image'));
                   $employe->fill(['image' => asset($path)])->save();
               }

        return redirect()->route('posts.show', 
            $post->id)->with('flash_message', 
            'Post, '. $post->titre.' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('flash_message',
             'Article successfully deleted');

    }
}
