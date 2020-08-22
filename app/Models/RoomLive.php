<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomLive extends Model
{
    protected $fillable = ['appointment', 'name', 'youtube_video_path' ,'description' ,'room_id'] ;
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
    
}
