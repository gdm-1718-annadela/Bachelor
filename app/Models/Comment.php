<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'contact'; 

    protected $fillable = [
        'user_id',
        'comment',
    ];

    // public function categories()
    // {
    //   return $this->hasOne('App\Models\Category');
    // }

}
