<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\{RoomTeacher , Room};
use Auth;
class TeacherRoomController extends Controller
{
    use APIResponseTrait;
                        ////////// for teachers //////////////////
    public function showRooms()
    {
      
        $teacher = Teacher::find(Auth::guard('teacher-api')->user()->id) ; 
        
        $data = array();
        $publicRooms = Room::where('is_private' , 0)->get() ; 
        $privateRooms =Room::where('is_private' , 1)->get() ; 
        
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $teacher->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data['public_rooms'][] = $datas;
        }
        foreach ($privateRooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $teacher->privateRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data['private_rooms'][] = $datas;
        }
        return $this->APIResponse($data, null, 200);
    }
    public function showPublicRooms()
    {
        
        $teacher = Teacher::find(Auth::guard('teacher-api')->user()->id) ; 
        $publicRooms = Room::where('is_private' , 0)->get() ; 
        $data = array();
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  =  in_array($room->id , $teacher->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data[] = $datas;
        }
        return $this->APIResponse($data, null, 200);
    }
    public function showPrivateRooms()
    {
        $teacher = Teacher::find(Auth::guard('teacher-api')->user()->id) ; 
        $Rooms = Room::where('is_private' , 1)->get() ;  
        $data = array();
        foreach ($Rooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $teacher->privateRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data[] = $datas;
        }
        return $this->APIResponse($data, null, 200);
       
    }

    public function joinPublicRoom($roomId)
    {
        $checkRoom =  RoomTeacher::where(['room_id'=>$roomId , 'teacher_id'=> Auth::guard('teacher-api')->user()->id])->first();
        if(isset($checkRoom)){
            return $this->APIResponse(null, "this room is registered", 400);
           
        }
        else
       {
        RoomTeacher::create([
            'room_id' => $roomId ,
             'teacher_id' => Auth::guard('teacher-api')->user()->id
        ]);
        return $this->APIResponse(null, null, 200);
       }
    }
    public function joinPrivateRoom($roomId)
    {
        $checkRoom =  RoomTeacher::where(['room_id'=>$roomId , 'teacher_id'=> Auth::guard('teacher-api')->user()->id])->first();
        if(isset($checkRoom)){
            return $this->APIResponse(null, "this room is registered", 400);
        }
        else
        {
            RoomTeacher::create([
                 'room_id' => $roomId ,
                 'teacher_id' => Auth::guard('teacher-api')->user()->id
            ]);
            return $this->APIResponse(null, null, 200);
        }
       
    }
}
