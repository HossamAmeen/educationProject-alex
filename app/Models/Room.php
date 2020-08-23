<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','is_private', 'subject', 'approvement', 'image', 'block_reason','user_id'];
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
 
    public function teachers()
    {
        return $this->hasMany(RoomTeacher::class,'room_id');
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
