<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teacher extends Authenticatable
{
    use HasApiTokens , Notifiable , SoftDeletes;
    protected $fillable = ['full_name' ,'email', 'user_name', 'password', 'phone','is_private',
     'approvement', 'block_reason' ,'image', 'user_id'];
    protected $hidden = ['password','gmail_id','facebook_id','user_id','created_at' , 'updated_at' , 'deleted_at'] ;
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
        return $this->hasMany(RoomTeacher::class, "teacher_id")->where('is_private' ,0) ; 
    }
    public function privateRooms()
    {
        return $this->hasMany(RoomTeacher::class, "teacher_id")->where('is_private' , 1) ; 
    }
    
}
