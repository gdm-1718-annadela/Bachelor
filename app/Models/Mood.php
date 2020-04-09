<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $table = 'mood'; 

    protected $fillable = [
        'mood',
    ];

    public function storys()
    {
    return $this->hasMany('App\Models\Story');
    }
}
