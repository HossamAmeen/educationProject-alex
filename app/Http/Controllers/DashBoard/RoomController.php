<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Teacher,Room,RoomTeacher,StudentRoom,FileRoom, RoomLive};
use Auth;
class RoomController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(Room $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $rooms = Room::get();
        
        $rows = array();
      
        foreach($rooms as $room ){
            $data = $room;
            // $data['teachers_names'] = array();
            $datas['names'] =  array(); 
            foreach($room->teachers as $x ){
                $datas['names'][] =    $x->teacher->full_name ?? " ";
            }
            $data['teachers_names'] = $datas['names'];
            // return $data ;
            $rows[] = $data;
        }
        return $this->APIResponse($rows, null, 200);
    }
    public function store(Request $request){
        
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'rooms');
        // $requestArray['user_id'] = Auth::user()->id;
        $requestArray['is_private'] = 0 ;
       $room =  $this->model->create($requestArray);
       if(is_array($request->teacher_id)){

            for($i=0 ; $i<count($request->teacher_id);$i++)
            {
                RoomTeacher::create([
                    'teacher_id' => $request->teacher_id[$i],
                    'room_id' => $room->id,
                    'is_private'=>0]);
                    
            }
            
        }

      
        return $this->APIResponse(null, null, 200);
    }

    public function show($id)
    {
        $item = $this->model->FindOrFail($id);
        $with = $this->with();
        
      
        // return $teachers;
       
        if (!empty($with))
        {
            $item = $this->model::with($with)->get()->find($id);
            // $rows = $rows->with($with);
        }
      
        $teachers = Teacher::select('teachers.*')
        ->join('room_teachers', 'room_teachers.teacher_id', '=', 'teachers.id')
        ->where('room_teachers.room_id', $id)
        ->get()->pluck('id');
        $item['teachers_id']= $teachers ;
        return $this->APIResponse($item, null, 200);
    }

    public function update($id , Request $request){
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'rooms');
        $row->teachers()->delete();
        if(is_array($request->teacher_id)){

            for($i=0 ; $i<count($request->teacher_id);$i++)
            {
                RoomTeacher::create([
                    'teacher_id' => $request->teacher_id[$i],
                    'room_id' => $row->id,
                    'is_private'=>0]);
            }
            
        }
        // $requestArray['user_id'] = Auth::user()->id;
        // $requestArray['is_private'] = 0 ;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function showPrivateRooms()
    {
        $rows = $this->model;
        
        $with = $this->with();
        if (!empty($with))
        {
            $rows = $rows->with($with);
        }
        $attributes = $this->attributes();
        $rows = $rows->where('is_private' , 1)->orderBy('id', 'DESC')->get($attributes);

        return $this->APIResponse($rows, null, 200);
    }
    public function filter($rows)
    {
        $rows = $this->model->where('is_private' , 0);
        return $rows;
    }
    // public function with()
    // {
    //     return ["teachers.teacher"];
    // }
    public function withs()
    {
        return ["teacher"];
    }

    public function showLessons($roomId)
    {
        
        return $this->APIResponse(RoomLive::where('room_id' , $roomId)->get(), null, 200);
    }

    public function showFilesForRoom($roomId)
    {
        return $this->APIResponse(FileRoom::where('room_id' , $roomId)->get(), null, 200);
    }

    public function showJoinRequests()
    { 
        // return request('roomId');
        if(request('roomId') != null)
        $rows = StudentRoom::with(['student' , 'room'])
        ->select('student_rooms.*')
        ->join('rooms', 'rooms.id', '=', 'student_rooms.room_id')
        // ->where('room_teachers.teacher_id', Auth::guard('teacher-api')->user()->id)
        ->where('rooms.is_private', 0)
        ->where('student_rooms.approvement', 'under_revision')
        ->where('student_rooms.room_id', request('roomId'))
        ->get();
        else{
            $rows = StudentRoom::with(['student' , 'room'])
            ->select('student_rooms.*')
            ->join('rooms', 'rooms.id', '=', 'student_rooms.room_id')
            // ->where('room_teachers.teacher_id', Auth::guard('teacher-api')->user()->id)
            ->where('rooms.is_private', 0)
            ->where('student_rooms.approvement', 'under_revision')
            ->get();
        }
        return $this->APIResponse($rows, null, 200);
    }
    public function changeStatusStudentRoom()
    {
        $studentRoom = StudentRoom::where(['student_id' => request('student_id') , 'room_id' => request('roomId') , 'approvement'=>'under_revision'])->first();
        if($studentRoom){
            $studentRoom->update(['approvement' => request('status') , 'block_reason' => request('block_reason')]);
            return $this->APIResponse(null, null, 200);
        }
        return $this->APIResponse(null, "this stuent is accepted/bloacked", 400);
    }
}
