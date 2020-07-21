<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Teacher extends Authenticatable
{
    use HasApiTokens , Notifiable;
    protected $fillable = ['full_name' ,'email', 'user_name', 'password', 'phone',
     'approvement', 'block_reason' ,'image', 'user_id'];
    
    public function AauthAcessToken(){
        return $this->hasMany(OauthAccessToken::class);
    }
    public function getImageAttribute()
    {
        if($this->attributes['image'] == "avatar.png")
        return asset($this->attributes['image']);
        else
        return $this->attributes['image'];
    }
    public function publicRooms()
    {
        return $this->hasMany(PublicRoomTeacher::class, "teacher_id") ; 
    }
    public function privateRooms()
    {
        return $this->hasMany(PrivateRoomTeacher::class, "teacher_id") ; 
    }
    
}
