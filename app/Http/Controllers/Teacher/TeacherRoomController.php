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
        // return $teacher->publicRooms->pluck('room_id')->toArray() ; 
        foreach ($publicRooms as $room){
            $datas = $room ;
            $datas['is_registered']  =  in_array($room->id , $teacher->publicRooms->pluck('room_id')->toArray()) ? 1 : 0 ;// rand(0,1);
            $data[] = $datas;
        }
        array_multisort(array_column($data, 'is_registered'), SORT_DESC, $data);
      

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

    // public function joinPublicRoom($roomId)
    // {
    //     $checkRoom =  RoomTeacher::where(['room_id'=>$roomId , 'teacher_id'=> Auth::guard('teacher-api')->user()->id])->first();
    //     if(isset($checkRoom)){
    //         return $this->APIResponse(null, "this room is registered", 400);
           
    //     }
    //     else
    //    {
    //     RoomTeacher::create([
    //         'room_id' => $roomId ,
    //          'teacher_id' => Auth::guard('teacher-api')->user()->id ,
    //          'is_private' => 0
    //     ]);
    //     return $this->APIResponse(null, null, 200);
    //    }
    // }
    public function joinRoom($roomId)
    {
        $checkRoom =  RoomTeacher::where(['room_id'=>$roomId , 'teacher_id'=> Auth::guard('teacher-api')->user()->id])->first();
        if(isset($checkRoom)){
            return $this->APIResponse(null, "المدرس مسجل بالفعل في الفصل", 400);
        }
        else
        {
            $room = Room::find($roomId);
            if(isset($room)){
                RoomTeacher::create([
                    'room_id' => $roomId ,
                    'teacher_id' => Auth::guard('teacher-api')->user()->id,
                    'is_private'=>$room->is_private
               ]);
               return $this->APIResponse(null, null, 200);
            }
            else
            return $this->APIResponse(null, "this الفصل غير موجود", 400);
           
        }
       
    }
                    ////////////////// room
    public function getRooms()
    {
        
        ////////////////////////////// edit after 
        $publicRooms = Room::select('rooms.*')
        ->join('room_teachers', 'room_teachers.room_id', '=', 'rooms.id')
       
        ->where('room_teachers.teacher_id', Auth::guard('teacher-api')->user()->id)
        ->where('rooms.is_private',0)
        ->where('rooms.approvement','accept')
        ->get();
        $privateRooms = Room::select('rooms.*')
        ->join('room_teachers', 'room_teachers.room_id', '=', 'rooms.id')
       
        ->where('room_teachers.teacher_id', Auth::guard('teacher-api')->user()->id)
        ->where('rooms.is_private',1)
        // ->where('rooms.approvement','accept')
        ->get();
        if( request()->get('type')  )
        {
            if( request()->get('type') == "public"){

               
                        

                return $this->APIResponse( $publicRooms , null, 200);
            }
            else
            {
                return $this->APIResponse($privateRooms, null, 200);
            }
        }
        else{
           
            $data['public_rooms'] = $publicRooms ;
            $data['private_rooms'] = $privateRooms ;
            return $this->APIResponse($data, null, 200);
        }
       
       
    }
    public function createRoom(Request $request)
    {
        $request['teacher_id'] = Auth::guard('teacher-api')->user()->id ; 
        if(isset($request->file)){
            $request['image'] = $this->storeFile($request->file , 'rooms');
        } 

        $room = Room::create($request->except('approvement'));
        RoomTeacher::create(['teacher_id' => Auth::guard('teacher-api')->user()->id , 'room_id' => $room->id ]);
        return $this->APIResponse(null, null, 200);
    }

    // public function joinPublicRoom($roomId)
    // {

    //     RoomTeacher::create(['teacher_id' => Auth::guard('teacher-api')->user()->id , 'room_id' => $roomId , 'is_private' => 0 ]);
    //     return $this->APIResponse(null, null, 200);
    // }
    public function getRoomDetials($roomId)
    {
        $room = Room::with(['files','lives' , 'newLives'])->find($roomId);
            if(isset($room)){
                if($room->lastLive()!==null){
                    $room['live_appointment'] = $room->lastLive()->appointment;
                    $room['live_youtube_video_path'] = $room->lastLive()->youtube_video_path;
                    $room['live_id'] = $room->lastLive()->id;
                    $appointment = $room->lastLive()->appointment;
                   
                    $room['status'] =time() > strtotime($room->lastLive()->appointment)  ? "no" : "now";

                  
                    return $this->APIResponse($room, null, 200);
                }
                else
                {
                    return $this->APIResponse( $room, null, 200);
                }
               
            }
            return $this->APIResponse(null, "الفصل غير موجود", 404);
       
    }
    public function updateRoom(Request $request , $roomId)
    {
        $checkRoom =  RoomTeacher::where(['room_id'=>$roomId , 'teacher_id'=> Auth::guard('teacher-api')->user()->id])->first();
        if(isset($checkRoom)){
            $room = Room::where('is_private' , 1 )->where('id' , $roomId)->first();
          
            if(isset($room)){
                $room->makeHidden('block_reason');
                $room->update($request->all());
                if(isset($request->approvement)){
                    $room->update(['approvement' => "blocked"]) ;
                }
                return $this->APIResponse($room,null, 200);
            }
            return $this->APIResponse(null, "الفصل غير موجود", 404);
           
        }
        else
        {
            return $this->APIResponse(null, "هذا المدرس غير مسجل لهذه الغرفه", 400);
        }
    }
    protected function storeFile($file, $folderName)
    {
        $path = 'uploads/'.$folderName.'/'.date("Y-m-d");
        if(!File::isDirectory($path))
        {
            File::makeDirectory($path, 0777, true, true);
        }
        $name = time().'.'.$file->getClientOriginalExtension();
        $file->move($path, $name);

        return $path .'/'. $name;
    }
}
