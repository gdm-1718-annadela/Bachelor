<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; 

    protected $fillable = [
        'title',
        'text',
        'user_id',
        'category_id',
    ];

    // public function categories()
    // {
    //   return $this->hasOne('App\Models\Category');
    // }

    public function story(){
        return $this->belongsTo('App\Models\Story');
    }

    // public function user(){
    //     return $this->hasOne('App\User');
    // }
}
