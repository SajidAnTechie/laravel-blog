<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title="This is index page";
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $data_for_about=array(
            'name'=>['sajid','ansari','raju'],
            'religion'=>'muslim'
        );
        return view('pages.about')->with($data_for_about);
    }
    public function services(){
        $title="This is service page";
        return view('pages.services')->with('title',$title);
    }
}
