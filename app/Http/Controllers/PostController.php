<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Notifications\Notification;

//use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //$posts=Post::orderBy('title','desc')->get();
        //$posts=Post::where('title','Post Second')->get();
        //$posts=DB::select('SELECT * FROM posts');
        //$posts=Post::orderBy('title','desc')->take(1)->get();
        //$posts=Post::orderBy('created_at','desc')->paginate(1);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'choose_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasfile('choose_image')) {
            //get file name with extension
            $filenamewithExt = $request->file('choose_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('choose_image')->getClientOriginalExtension();
            //file name to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('choose_image')->storeAs('public/cover_images', $filenametostore);
        } else {
            $filenametostore = 'noimage.jpg';
        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $filenametostore;
        $post->user_id = auth()->user()->id;
        $post->save();

        $arr = ['title' => $post->title];

        auth()->user()->notifyusers($arr);

        return redirect('/posts')->withSuccess('Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post=Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $posts = Post::find($id);
        if (auth()->user()->id !== $posts->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        return view('posts.edit')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'choose_image' => 'image|nullable|max:1999'
        ]);
        if ($request->hasfile('choose_image')) {
            //get file name with extension
            $filenamewithExt = $request->file('choose_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('choose_image')->getClientOriginalExtension();
            //file name to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('choose_image')->storeAs('public/cover_images', $filenametostore);
        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        if ($request->hasfile('choose_image')) {
            $post->cover_image = $filenametostore;
        }

        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts')->withSuccess('' . $post->title . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }
        $post->Delete();
        return redirect('/posts')->withSuccess('' . $post->title . ' Deleted');
    }
}
