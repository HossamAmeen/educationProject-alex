<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTeacher extends Model
{
    protected $fillable= ['room_id' , 'teacher_id','is_private', 'user_id'];
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id')->select(['id' , 'full_name']);
    }
}
