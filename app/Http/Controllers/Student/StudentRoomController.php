<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Room,RoomLive};
use App\Models\Student;
use App\Models\{StudentRoom};
use Auth ,DateTime , DateTimeZone;
use Carbon\Carbon;
class StudentRoomController extends Controller
{
    use APIResponseTrait;
                        ////////// for students //////////////////
    public function showRooms()
    {

        $student = Student::find(Auth::guard('student-api')->user()->id) ;

        $data = array();
        $publicRooms = Room::accepted()->where('is_private' , 0)->get() ;
        $privateRooms = Room::accepted()->where('is_private' , 1)->get() ;
        $data['public_rooms'] = array();
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  = in_array($room->id , $student->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data['public_rooms'][] = $datas;
        }
        $data['private_rooms']= array();
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
        $publicRooms = Room::accepted()->where('is_private' , 0)->get() ;
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
        $Rooms = Room::accepted()->where('is_private' , 1 )->get() ;
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
        $data['public_rooms'] = Room::accepted()->whereIn('id',$student->publicRooms->pluck('room_id'))->where('is_private' , 0)->get();
        $data['private_rooms'] =  Room::accepted()->whereIn('id',$student->privateRooms->pluck('room_id'))->where('is_private' , 1)->get();

        return $this->APIResponse($data, null, 200);
    }

    public function joinRoom($roomId)
    {
        $studentId =  Auth::guard('student-api')->user()->id ;
        $studentRoom = StudentRoom::where('student_id' ,$studentId )->where('room_id' ,$roomId )->first();
        if(isset($studentRoom)){
            return $this->APIResponse(null, "هذا الطالب مشترك بالفعل في هذا الفصل " , 400);
        }
        else{
            $requestArray['student_id'] = $studentId;
            $requestArray['room_id'] = $roomId ;
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
        date_default_timezone_set("Africa/Cairo");
        $room = Room::with(['files','lives','next_live'])->find($roomId);
        $studentId =  Auth::guard('student-api')->user()->id ;

        $studentRoom = StudentRoom::where('student_id' ,$studentId )->where('room_id' ,$roomId)->first();


        if(!isset($studentRoom) ){
            return $this->APIResponse(null, "هذا الطالب غير مسجل في الغرفة." , 400);
        }elseif($studentRoom->approvement == 'blocked'){
            return $this->APIResponse(null, "هذا الطالب محظور من دخول الغرفة." , 400);
        }elseif($studentRoom->approvement == 'under_revision'){
            return $this->APIResponse(null, "هذا الطالب لم يتم الموافقة علي دخول الغرفة." , 400);
        }

        if(isset($room ) || $room->approvement == 'accept'){

                // $date = Carbon::parse(now())->addHour(2);
                // $date = now();
                $date = Carbon::parse(now())->subMinutes(118);
                $roomLive = RoomLive::where('room_id' ,$roomId )
                                ->where('appointment' ,'>=' , date('Y-m-d'))
                                ->where('appointment' ,'>=' , $date)
                                ->orderBy('appointment')
                                ->first();

                if($room->lastLive())
                    $room['status'] =time() > strtotime($room->lastLive()->appointment)  ? "no" : "now";
                if( $roomLive !==null){

                    $room['live_appointment'] = $roomLive->appointment;
                    $room['live_youtube_video_path'] = $roomLive->youtube_video_path;
                    $room['live_id'] = $roomLive->id;
                    $appointment = $roomLive->appointment;


                    $boostStartDate = (new Carbon)->parse($roomLive->appointment);
                    // $boostEndDate = (new Carbon)->parse($boostProperty->property_boost_end_date);
                    //Check Differences in Hours

                    $curentTime =Carbon::now('Africa/Cairo');
                    // return  $curentTime;
                    // return date("Y-m-d H:i:s");;
                    $diffInStartDate = $curentTime->diffInHours($boostStartDate); //24 means 1 day to d future
                    $room['status'] = $diffInStartDate <= 2 ? "now" : "no";
                    return $this->APIResponse($room, null, 200);
                }
                else
                {
                    return $this->APIResponse( $room, null, 200);
                }

            }
            return $this->APIResponse(null, "هذا الغرفة اتحذفت او اوفقت لوقت لاحق.", 404);

    }

}
