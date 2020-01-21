<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use Commentable;
    //Table header
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function postcomments()
    {
        $this->belongsToMany(
            Postcomment::class
        );
    }
}
