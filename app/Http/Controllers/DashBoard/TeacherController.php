<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherController extends CRUDController
{
    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

    public function store(Request $request){
        
        $requestArray = $request->all();
        // return $requestArray;
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);       
        // $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , Request $request){
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }        
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }

}
