<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Post;
use Auth;
use Session;

class PostController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'clearance']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index() {
        $id=Auth::user()->id;

        $posts = Post::orderby('id', 'desc')->where('user_id',$id)->get(); 

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                   $post->fill(['image' => asset($path)])->save();
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