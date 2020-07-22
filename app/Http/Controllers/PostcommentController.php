<?php

namespace App\Http\Controllers;


use App\Post;
use App\Postcomment;
use App\User;
use Illuminate\Http\Request;
use Auth;

class PostcommentController extends Controller
{
    //
    public function store(Post $post, User $owener)
    {
        $attributes =  request()->validate([
            'comment' => 'required|min:5',
        ]);

        $attributes['post_id'] = $post->id;
        $attributes['commenter_id'] = auth()->user()->id;

        Postcomment::create($attributes);

        $owener->notifyusers(auth()->user(), $post);

        return back();
    }
}
