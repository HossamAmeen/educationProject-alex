<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Room;
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
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);
        Student::create($requestArray);
        return $this->APIResponse(null, null, 200);
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

    
    public function getRooms()
    {
        // return Auth::guard('teacher-api')->user()->id ; 
      
        return $this->APIResponse(Student::with('rooms')->find(Auth::guard('student-api')->user()->id), null, 200);
       
    }

    public function getRoomDetials($roomId)
    {
        $room = Room::with('files')->find($roomId);
        return $this->APIResponse($room, null, 200);
    }
    
    public function joinRoom($room_id)
    {
        $requestArray['student_id'] = Auth::guard('student-api')->user()->id ;
        $requestArray['room_id'] = $room_id ;
        StudentRoom::create($requestArray);
        return $this->APIResponse(null, null, 200);
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
}
