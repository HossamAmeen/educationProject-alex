<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Room};
use App\Models\Student;
use App\Models\{StudentRoom};
use Auth ,DateTime;
use Carbon\Carbon;
class StudentRoomController extends Controller
{
    use APIResponseTrait;
                        ////////// for students //////////////////
    public function showRooms()
    {
       
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        
        $data = array();
        $publicRooms = Room::where('is_private' , 0)->get() ; 
        $privateRooms = Room::where('is_private' , 1)->get() ; 
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
        $publicRooms = Room::where('is_private' , 0)->get() ; 
        $data = array();
       
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  =  in_array($room->id , $student->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            // return "test";
            $data[] = $datas;
        }
        return $this->APIResponse($data, null, 200);
    }
    public function showPrivateRooms()
    {
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        $Rooms = Room::where('is_private' , 1 )->get() ; 
        $data = array();
        foreach ($Rooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $student->privateRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data[] = $datas;
        }
        return $this->APIResponse($data, null, 200);
       
    }
    public function getRegisteredRooms()
    {
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        // return $student->publicRooms ; 
        $data['public_rooms'] = Room::whereIn('id',$student->publicRooms->pluck('room_id'))->where('is_private' , 0)->get();
        $data['private_rooms'] =  Room::whereIn('id',$student->privateRooms->pluck('room_id'))->where('is_private' , 1)->get();
      
        return $this->APIResponse($data, null, 200);
    }

    public function joinRoom($room_id)
    {
        $studentId =  Auth::guard('student-api')->user()->id ; 
        $studentRoom = StudentRoom::where('student_id' ,$studentId )->where('room_id' ,$room_id )->first();
        if(isset($studentRoom)){
          

            return $this->APIResponse(null, "هذا الطالب مشترك بالفعل في هذا الفصل " , 400);
        }
        else{
            $requestArray['student_id'] = $studentId;
            $requestArray['room_id'] = $room_id ;
            StudentRoom::create($requestArray);
            return $this->APIResponse(null, null, 200);
        }
       
       
    }

    public function getRoomDetials_later($roomId)
    {
        $room = Room::with(['files','lives'])->find($roomId);
        if(isset($room)){
            // $room['appointment'] = "فثسف";
            return $this->APIResponse($room, null, 200);
        }
        else
        return $this->APIResponse(null, "this room not found", 400);
      
    }

    public function getRoomDetials($roomId)
    {

      


        $room = Room::with(['files','lives'])->find($roomId);
            if(isset($room ) || $room->approvement == 'accept'){

               
                if($room->lastLive()!==null){
                    $room['live_appointment'] = $room->lastLive()->appointment;
                    $room['live_youtube_video_path'] = $room->lastLive()->youtube_video_path;
                    $room['live_id'] = $room->lastLive()->id;
                    $appointment = $room->lastLive()->appointment;

                   
                $boostStartDate = (new Carbon)->parse($room->lastLive()->appointment);
                // $boostEndDate = (new Carbon)->parse($boostProperty->property_boost_end_date);
                //Check Differences in Hours
                $curentTime = Carbon::now();
                $diffInStartDate = $curentTime->diffInHours($boostStartDate); //24 means 1 day to d future
               
                return $diffInStartDate ;
                $diffInEndDate = $boostEndDate->diffInHours($curentTime); //72
                //echo $diffInStartDate . '..';
                
                if($diffInStartDate == 24 && $diffInEndDate > 12) {
                    //Boost active for 24 hours; Update startDate to currentTime and sendNotification
                }
                if($diffInEndDate == 12) {
                    //if The difference is == 12 that means the boost is less than a day and it would expire in 12 hours
                    
                }
                if($diffInEndDate <= 0) {
                    //That means the boost has expired.
                    
                }


                    $room['status'] =time() > strtotime($room->lastLive()->appointment)  ? "now" : "no";

                  
                    return $this->APIResponse($room, null, 200);
                }
                else
                {
                    return $this->APIResponse( $room, null, 200);
                }
               
            }
            return $this->APIResponse(null, "room not found", 404);
       
    }
    
}
