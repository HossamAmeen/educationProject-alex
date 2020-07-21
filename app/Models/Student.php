<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Student extends Authenticatable
{
    use HasApiTokens , Notifiable;
    protected $fillable = ['full_name' ,'email', 'user_name', 'password', 'phone',
     'level' ,'approvement', 'block_reason' ,'image', 'user_id'];

    public function publicRooms()
    {
        return $this->hasMany(StudentRoom::class , 'student_id');
    }

    public function privateRooms()
    {
        return $this->hasMany(StudentPrivateRoom::class , 'student_id');
    }

    public function getImageAttribute()
    {
        if($this->attributes['image'] == "avatar.png")
        return asset($this->attributes['image']);
        else
        return $this->attributes['image'];
    }
}
