<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'subject', 'approvement', 'image','teacher_id', 'block_reason','user_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id')->select(['id' , 'full_name']);
    }

    public function files()
    {
        return $this->hasMany(FileRoom::class , 'room_id')->select(['id' , 'path' , 'name' , 'room_id']);
    }

    public function lives()
    {
        return $this->hasMany(RoomLive::class , 'room_id')->select(['id' , 'youtube_video_path' , 'name' ,'description', 'room_id']);
    }

    public function getImageAttribute()
    {
        // if($this->attributes['image'] == "education.png")
        return asset($this->attributes['image']);
        // else
        // return $this->attributes['image'];
    }
}
