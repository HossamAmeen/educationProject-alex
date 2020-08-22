<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRoom extends Model
{
    protected $guarded= [];
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
}
