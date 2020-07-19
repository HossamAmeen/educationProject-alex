<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveComment extends Model
{
    protected $fillable = ['comment', 'user_name' ,'type' ,'live_id' ,'person_id'];
}
