<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Story extends Model
{

    protected $table = 'story'; 

    protected $fillable = [
        'title',
        'text',
        'user_id',
        'category_id',
        'mood_id',
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function mood()
    {
      return $this->belongsTo('App\Models\Mood');
    }

    public function images() {
      return $this->hasMany('App\Models\Image');
  }

    public function categories(){
        return $this->belongsTo('App\Models\Category');
    }
}