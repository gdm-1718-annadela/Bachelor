<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='image';

    protected $fillable = [
        'path',
        'caption',
        'title',
        'type',
        'story_id',
    ];
    public function story() {
        return $this->hasOne('App\Models\Story');
    }
}
