<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content'
    ];

    public function room(){
        $this->belongsTo(Room::class);
    }
    public function user(){
        $this->belongsTo(User::class);
    }
}
