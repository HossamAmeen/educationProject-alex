<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Room;
use App\Models\PrivateRoom;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth,File,DateTime;
class TeacherController extends Controller
{
    use APIResponseTrait;
    public function login (Request $request) {

        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails())
        {
            return  $this->APIResponse(null, $validator->errors()->all(), 422); 
        }

        $field = 'phone';

        if (is_numeric( request('phone'))) {
            $field = 'phone';
        } elseif (filter_var( request('phone'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }
        else
        {
            $field = 'user_name';
        }
        $request->merge([$field => request('user_name')]);

    
        $user = Teacher::where($field, request('user_name'))->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
            
                $success['token'] = $user->createToken('token')->accessToken;
                return $this->APIResponse($success, null, 200);
            } else {
                return $this->APIResponse(null, "Password mismatch", 422);  
            }
        } else {
            return $this->APIResponse(null, "User name does not exist", 422);
        }
    }

    public function register(Request $request)
    {
        $requestArray = $request->all();
        // return $requestArray;
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'rooms'); 
        
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);       
       
       $teacher = Teacher::create($requestArray);
       $success['token'] = $teacher->createToken('token')->accessToken;
       return $this->APIResponse($success, null, 200);
       
    }
    public function logout()
    { 
        if (Auth::guard('teacher-api')->check()) {
            // return Auth::guard('teacher-api')->user()->id;
            Auth::guard('teacher-api')->user()->AauthAcessToken()->delete();
            return $this->APIResponse(null, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "the token is expired", 422);
        }
    }
    public function getAccount()
    {
        $student = Teacher::find(Auth::guard('teacher-api')->user()->id) ; 
        return $this->APIResponse($student, null, 200);
    }
    public function updateAccount(Request $request)
    {        
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }       
        $student = Teacher::find(Auth::guard('teacher-api')->user()->id) ; 
        $student->update($requestArray);
        return $this->APIResponse(null, null, 200); 
    }
                    ////////////////// room
    public function getRooms()
    {
        
        // $data['public_rooms'] = Room::with('teacher')->where('teacher_id' , Auth::guard('teacher-api')->user()->id)->get();
        // $data['private_rooms'] = PrivateRoom::with('teacher')->where('teacher_id' , Auth::guard('teacher-api')->user()->id)->get();
        $teacher = Teacher::find(Auth::guard('teacher-api')->user()->id);
        $data['public_rooms'] = $teacher->publicRooms ;
        $data['private_rooms'] = $teacher->privateRooms ;
        return $this->APIResponse($data, null, 200);
       
    }

   
    public function createPublicRoom(Request $request)
    {
        $request['teacher_id'] = Auth::guard('teacher-api')->user()->id ; 
        if(isset($request->file)){
            $request['image'] = $this->storeFile($request->file , 'rooms');
        }
        Room::create($request->all());
        return $this->APIResponse(null, null, 200);
    }

    public function createRoom(Request $request)
    {
        $request['teacher_id'] = Auth::guard('teacher-api')->user()->id ;  
        PrivateRoom::create($request->all());
        return $this->APIResponse(null, null, 200);
    }

    public function getPublicRoomDetials($roomId)
    {
        $room = Room::with(['files','lives'])->find($roomId);
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
            return $this->APIResponse(null, "room not found", 404);
       
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
