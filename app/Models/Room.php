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
        return $this->hasMany(RoomLive::class , 'room_id')->select(['id' , 'youtube_video_path' , 'name' ,'description','appointment', 'room_id'])
        ->orderBy('id' , 'DESC');
    }

    public function lastLive()
    {
        // return $this->lives()->where('appointment' ,'>=' , date('Y-m-d'))->latest();
        // return $this->lives()->where('appointment' ,'>=' , date('Y-m-d'))->sortByDesc('id' )->get();
        return $this->hasOne(RoomLive::class , 'room_id')
                   ->select(['id' , 'youtube_video_path' , 'name' ,'description','appointment', 'room_id'])
                   ->where('appointment' ,'>=' , date('Y-m-d'))
                   ->orderBy('appointment')
                   ->first()
        ;
    }
    

    public function getImageAttribute()
    {
        return asset($this->attributes['image']);
    }
}
