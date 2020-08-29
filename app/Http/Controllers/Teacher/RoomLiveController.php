<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Teacher,Room,RoomLive , LiveComment , LiveConnect , FileRoom};
use Auth;
class RoomLiveController extends Controller
{
    use APIResponseTrait;
    // public function index()
    // {
    //     // return Auth::guard('teacher-api')->user()->id ;
    //     $teacher = Teacher::find(Auth::guard('teacher-api')->user()->id);
    //     // return $teacher->publicRooms->pluck('room_id');
    //     $lives = RoomLive::whereIn('room_id' , $teacher->publicRooms->pluck('room_id')->toArray() )->get();
    //     return $this->APIResponse($lives, null, 200);
    // }

    public function store(Request $request){
        
        $requestArray = $request->all();
        // $requestArray['user_id'] = Auth::user()->id;
        RoomLive::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function show($liveId)
    {
        $roomLive = RoomLive::find($liveId);
        if(isset($roomLive)){
            return $this->APIResponse($roomLive, null, 200);
        }
        else
        return $this->APIResponse($roomLive, null, 200);
    }
    public function update(Request $request , $id){
        
        $requestArray = $request->all();
        // $requestArray['user_id'] = Auth::user()->id;
        $live = RoomLive::find($id);
        if(isset($live))
        {
            $live->update($requestArray);
            return $this->APIResponse($live, null, 200);
        }
      
        else{
            return $this->APIResponse(null, null, 400);
        }
    }
    public function uploadFileLesson(Request $request)
    {
        // return $request->all();
        FileRoom::create($request->all());
     
        return $this->APIResponse(null, null, 200);
    }

    public function getLives($id)
    {
        $lives = RoomLive::where('room_id' , $id )->get();
        return $this->APIResponse($lives, null, 200);
    }
    public function destroy($id)
    {
        $live = RoomLive::find($id );
        if(isset($live)){
            $live->delete();
            return $this->APIResponse(null,null, 200);
        }
        else
        {
            return $this->APIResponse(null,"this lesson not found", 400);
        }
       
    }
    public function showComments($liveId)
    {
       $comments =  LiveComment::where('live_id',$liveId)->get(['comment' , 'user_name']);
       return $this->APIResponse($comments, null, 200);
    }
    public function showConnects($liveId)
    {
        $comments =  LiveConnect::with('student')->where('live_id',$liveId)->get();
        return $this->APIResponse($comments, null, 200);
    }
}
