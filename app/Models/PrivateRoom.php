<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateRoom extends Model
{
    protected $fillable = ['name', 'subject', 'approvement', 'image','teacher_id', 'block_reason','user_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id')->select(['id' , 'full_name']);
    }

    public function files()
    {
        return $this->hasMany(FilePrivateRoom::class , 'room_id')->select(['id' , 'path' , 'name' , 'room_id']);
    }

    public function lives()
    {
        return $this->hasMany(PrivateRoomLive::class , 'room_id')->select(['id' , 'youtube_video_path' , 'name' ,'description', 'room_id']);
    }

    public function getImageAttribute()
    {
        return asset($this->attributes['image']);
    }
}
