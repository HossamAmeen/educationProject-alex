<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Teacher,Room,RoomLive};
use Auth;
class RoomLiveController extends Controller
{
    use APIResponseTrait;
    public function index()
    {
        // return Auth::guard('teacher-api')->user()->id ;
        $teacher = Teacher::find(Auth::guard('teacher-api')->user()->id);
        // return $teacher->publicRooms->pluck('room_id');
        $lives = RoomLive::whereIn('room_id' , $teacher->publicRooms->pluck('room_id')->toArray() )->get();
        return $this->APIResponse($lives, null, 200);
    }

    public function store(Request $request){
        
        $requestArray = $request->all();
        // $requestArray['user_id'] = Auth::user()->id;
        RoomLive::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update(Request $request , $id){
        
        $requestArray = $request->all();
        // $requestArray['user_id'] = Auth::user()->id;
        RoomLive::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }
    public function getLives($id)
    {
        $lives = RoomLive::where('room_id' , $id )->get();
        return $this->APIResponse($lives, null, 200);
    }
}
