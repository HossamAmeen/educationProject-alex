<?php

namespace App\Http\Controllers\Student;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\{Room,LiveComment};
use App\Models\StudentRoom;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth ,File;
class StudentController extends Controller
{
    use APIResponseTrait;

    public function register(StudentRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  422);
        }
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
                return $this->APIResponse(null, "الباسورد غير صحيح", 422);  
            }
        } else {
            return $this->APIResponse(null, "هذا الحساب غير موجود", 422);
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
    public function updateAccount(StudentRequest $request)
    {        
        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  422);
        }
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

    protected function storeFile($file, $folderName)
    {
            $path = 'uploads/'.$folderName.'/'.date("Y-m-d");
            if(!File::isDirectory($path))
            {
                File::makeDirectory($path, 0777, true, true);
            }
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $name);

            return asset($path .'/'. $name);
       
    }

                    ////////////////// rooms //////////////////
   
    

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
                                             
    
}
