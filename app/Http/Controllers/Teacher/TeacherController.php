<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
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
}
