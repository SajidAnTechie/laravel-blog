<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcomment extends Model
{
    //

    protected $fillable = [
        'commenter_id', 'comment', 'post_id',
    ];
}
