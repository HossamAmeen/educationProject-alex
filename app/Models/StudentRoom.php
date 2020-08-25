<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRoom extends Model
{
    protected $fillable= ['approvement' ,'block_reason', 'student_id', 'room_id' ,'user_id'];
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;

    public function room()
    {
        return $this->belongsTo(Room::class , 'room_id')->select('id','name');
    }
     
    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id')->select('id','full_name' ,'image');
    }
}
