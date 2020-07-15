<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Student extends Authenticatable
{
    use HasApiTokens , Notifiable;
    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(StudentRoom::class , 'student_id');
    }
}
