<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Assighment;

class AssighmentController extends Controller
{
    //
    public function assighment($name){

        $user=User::where('name',$name)->firstOrfail();
        return view('assighment.index')->with('assighments',Assighment::OrderBy('id','desc')->get());
    }

    public function completed(Assighment $completed){

        $completed->completeassigh();
        return redirect()->back();
    }

    public function create(){
        
        return view('assighment.create');
    }

    public function store(){

        $attributes=request()->validate([
            'subject'=> 'required|min:4',
            'assigh_name'=> 'required|min:5'
        ]);

        Assighment::create($attributes);
        return back()->withSuccess('Created'); 

    }
    
    public function remove(Assighment $delete){
       
        $delete->delete();
        return back();
    }

}
