<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateRoomTeacher extends Model
{
    protected $fillable= ['room_id' , 'teacher_id'];
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
}
