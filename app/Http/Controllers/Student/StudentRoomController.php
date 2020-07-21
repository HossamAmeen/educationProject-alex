<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Room,PrivateRoom};
use App\Models\Student;
use App\Models\{StudentRoom,StudentPrivateRoom};
use Auth;
class StudentRoomController extends Controller
{
    use APIResponseTrait;
                        ////////// for students //////////////////
    public function showRooms()
    {
       
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        
        $data = array();
        $publicRooms = Room::all() ; 
        $privateRooms = PrivateRoom::all() ; 
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $student->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data['public_rooms'][] = $datas;
        }
        foreach ($privateRooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $student->privateRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data['private_rooms'][] = $datas;
        }
        return $this->APIResponse($data, null, 200);
    }
    public function showPublicRooms()
    {
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        $publicRooms = Room::all() ; 
        $data = array();
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  =  in_array($room->id , $student->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data[] = $datas;
        }
        return $this->APIResponse($data, null, 200);
    }
    public function showPrivateRooms()
    {
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        $Rooms = PrivateRoom::all() ; 
        $data = array();
        foreach ($Rooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $student->privateRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data[] = $datas;
        }
        return $this->APIResponse($data, null, 200);
       
    }
}
