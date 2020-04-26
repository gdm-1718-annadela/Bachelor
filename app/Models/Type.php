<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type'; 

    protected $fillable = [
        'type',
    ];

    public function storys()
    {
    return $this->hasMany('App\Models\Story');
    }
}
