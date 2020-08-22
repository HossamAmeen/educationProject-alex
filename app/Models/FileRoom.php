<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileRoom extends Model
{
    protected $fillable = ['path' , 'name' ,'room_id'] ; 
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
}
