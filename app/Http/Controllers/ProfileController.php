<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;
use App\User;
//use Image;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_profile($name){
        $user=User::where('name',$name)->firstOrfail();
        return view('profile.user_image')->with('user',auth()->user());
    }
     
    public function update_profile(Request $request){
        $this->validate($request,[
            'choose_profile'=>'image|nullable|max:1999'
        ]);

        if($request->hasfile('choose_profile')){
            //get file name with extension
            $filenamewithExt= $request->file('choose_profile')->getClientOriginalName();
            //get just file name
            $filename= pathinfo($filenamewithExt,PATHINFO_FILENAME);
            //get file extension
            $extension= $request->file('choose_profile')->getClientOriginalExtension();
            //file name to store
            $filenametostore= $filename.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('choose_profile')->storeAs('public/user_images',$filenametostore);
        }
        $user=Auth::user();
        $user->user_image= $filenametostore;
        $user->save();
        return redirect('/Profile/'.auth()->user()->name)->withSuccess('Profile Image Updated');
    }
   
    public function remove(Request $request, $id)
    {
        $user= User::find($id);
        if($user->user_image !='default.jpg'){
            Storage::delete('public/user_images/'.$user->user_image);
        }
        if($user->user_image =='default.jpg'){
            return redirect('/Profile/'.auth()->user()->name);
        }
        $user->user_image='default.jpg';
        $user->save();
        return redirect('/Profile/'.auth()->user()->name);



    }
}
