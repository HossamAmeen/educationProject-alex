<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateRoom extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id')->select(['id' , 'full_name']);
    }

    public function files()
    {
        return $this->hasMany(FilePrivateRoom::class , 'room_id')->select(['id' , 'path' , 'name' , 'room_id']);
    }

    
}
