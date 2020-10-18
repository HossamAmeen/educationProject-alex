<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigrationController extends Controller
{
    use APIResponseTrait;
    public function getConfigration()
    {
        $data['teachers_counter'] = \App\Models\Teacher::get()->count();
        $data['students_counter'] = \App\Models\Student::get()->count();
        $data['room_counter'] = \App\Models\Room::get()->count();
        $data['public_room_counter'] = \App\Models\Room::where('is_private' , 0)->get()->count();
        $data['private_room_counter'] = \App\Models\Room::where('is_private' , 1)->get()->count();
        $data['lesson_counter'] = \App\Models\RoomLive::get()->count();
        return $this->APIResponse($data, null, 200);
    }
}
