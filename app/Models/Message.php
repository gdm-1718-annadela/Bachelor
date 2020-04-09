<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message'; 

    protected $fillable = [
        'message',
        'sender_id',
        'receiver_id',
        'chat_id',
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
