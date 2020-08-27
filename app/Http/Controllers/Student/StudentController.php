<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\{Room,LiveComment};
use App\Models\StudentRoom;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
class StudentController extends Controller
{
    use APIResponseTrait;

    public function register(Request $request)
    {
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'rooms'); 
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);
        $student = Student::create($requestArray);
        $success['token'] = $student->createToken('token')->accessToken;
        return $this->APIResponse($success, null, 200);
      
    }
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

        if (is_numeric( request('user_name'))) {
            $field = 'phone';
        } elseif (filter_var( request('user_name'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }
        else
        {
            $field = 'user_name';
        }
        $request->merge([$field => request('user_name')]);

        // return $field;
        $user = Student::where($field, request('user_name'))->first();

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

    public function logout()
    { 
        if (Auth::guard('student-api')->check()) {
            // return Auth::guard('teacher-api')->user()->id;
            Auth::guard('student-api')->user()->AauthAcessToken()->delete();
            return $this->APIResponse(null, null, 200);
        }
        else
        {
            return $this->APIResponse(null, "the token is expired", 422);
        }
    }
    public function getAccount()
    {
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
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
        if(isset($requestArray['file']) )
        {
            $requestArray['image'] =  $this->storeFile($request->file , 'rooms'); 
        }
        
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        $student->update($requestArray);
        return $this->APIResponse(null, null, 200); 
    }
                    ////////////////// rooms //////////////////
    public function getRooms()
    {
        $student = Student::find(Auth::guard('student-api')->user()->id) ; 
        // return $student->publicRooms ; 
        $data['public_rooms'] = Room::whereIn('id',$student->publicRooms->pluck('room_id'))->where('is_private' , 0)->get();
        $data['private_rooms'] =  Room::whereIn('id',$student->privateRooms->pluck('room_id'))->where('is_private' , 1)->get();
      
        return $this->APIResponse($data, null, 200);
    }

    public function joinPublicRoom($room_id)
    {
        $requestArray['student_id'] = Auth::guard('student-api')->user()->id ;
        $requestArray['room_id'] = $room_id ;
        StudentRoom::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function joinRoom($room_id)
    {
        $requestArray['student_id'] = Auth::guard('student-api')->user()->id ;
        $requestArray['room_id'] = $room_id ;
        StudentRoom::create($requestArray);
        return $this->APIResponse(null, null, 200);
    }
    
    public function getPublicRoomDetials($roomId)
    {
        $room = Room::with(['files','lives'])->find($roomId);
        $room['appointment'] = "فثسف";
        return $this->APIResponse($room, null, 200);
    }
    
    public function getPrivateRoomDetials($roomId)
    {
        $room = Room::with(['files','lives'])->find($roomId);
        return $this->APIResponse($room, null, 200);
    }
  
    public function addComment($id)
    {
        LiveComment::create(
            [
                'comment' => request('comment'),
                'user_name'=> "hossam test" ,//Auth::guard('student-api')->user()->user_name,
                'type'=> "students" ,
                'live_id' =>$id,
                'person_id'=>1//Auth::guard('student-api')->user()->id
            ]
            );
            return $this->APIResponse(null, null, 200);
    }
    public function showComments($liveId)
    {
       $comments =  LiveComment::where('live_id',$liveId)->get(['comment' , 'user_name']);
       return $this->APIResponse($comments, null, 200);
    }
}
