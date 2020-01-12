<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assighment extends Model
{
    protected $guarded=[];
    //
    public function completeassigh(){  
        $this->update([
            'completed'=> request()->has('completed')
        ]);
    }
}
