<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveConnect extends Model
{
    protected $hidden = ['user_id','created_at' , 'updated_at'] ;
}
