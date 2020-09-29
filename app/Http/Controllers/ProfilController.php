<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profil;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;
class ProfilController extends Controller
{
      public function __construct() {
        $this->middleware(['auth', 'clearance']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function show( ){
       
         $id=Auth::user()->id;

          $userprofil= Profil::where('user_id',$id)->first();
     

        return view ('profils.show',[$id] , compact('userprofil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
         return view ('profils.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function edit($userpro)
    {
        
        $profil = Profil::findOrFail($userpro); 

            
           return view ('profils.edit' , compact('profil'));
      
    }

    public function store(Request $request ,User $user)
    {
          $id=Auth::user()->id;
        $input = $request->all();
         $input['user_id']=$id;
        
          $photo=$request->file('image');
        $profil = Profil::create($input);
        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('photoprofils',$request->file('image'));
                   $profil->fill(['image' => asset($path)])->save();
               }

    
        return redirect()->route('profils.show?user='.$id.'')
            ->with('flash_message', 'Votre profil est a jour');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userpro)
    {
         $id=Auth::user()->id;
         $profil = Profil::find($userpro);
         $input = $request->all();
         $profil->user_id= $id;

         $photo=$request->file('image');
        $profil->update([$request->all(), $id]);

        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('photoprofils',$request->file('image'));
                   $profil->fill(['image' => asset($path)])->save();
               }

                  
               

        return redirect()->route('profils.show',[$id])->with('flash_message', 'Votre profil est a jour');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
