<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveConnect extends Model
{
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
    protected $fillable= ['in_out','live_id' , 'student_id'];

      
    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id')->select('id','full_name' ,'image');
    }
}
