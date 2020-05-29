<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['full_name', 'emaill', 'user_name', 'password', 'phone'];
}
