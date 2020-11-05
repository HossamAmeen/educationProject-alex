<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Teacher,RoomTeacher};
use App\Http\Requests\Teacher\TeacherRequest;
use Illuminate\Support\Facades\Hash;

class TeacherController extends CRUDController
{
    public function __construct(Teacher $model)
    {
        $this->model = $model;
    }

    public function store(TeacherRequest $request){

        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  422);
        }
        $requestArray = $request->all();
        // return $requestArray;
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'teachers');
        // $requestArray['user_id'] = Auth::user()->id;
        $requestArray['is_private'] = true ;
        $this->model->create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , TeacherRequest $request){


        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  422);
        }

        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'teachers');
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }
    public function deleteRelatedItems($rowId)
    {
        // RoomTeacher::where('teacher_id' , $rowId)->delete();
    }
}
