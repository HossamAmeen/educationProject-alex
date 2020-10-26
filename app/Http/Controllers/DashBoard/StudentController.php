<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{Student,StudentRoom};
class StudentController extends CRUDController
{
    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function store(StudentRequest $request){
        
        if (isset($request->validator) && $request->validator->fails())
        {
            return $this->APIResponse(null , $request->validator->messages() ,  422);
        }
        $requestArray = $request->all();
        
        if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);
       
       
        // $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , StudentRequest $request){
       
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
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }
    public function deleteRelatedItems($rowId)
    {
        StudentRoom::where('student_id' , $rowId)->delete();
    }
}
