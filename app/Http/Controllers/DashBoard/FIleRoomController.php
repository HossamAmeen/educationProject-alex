<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileRoom;
use Auth;
class FileRoomController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(FileRoom $model)
    {
        $this->model = $model;
    }

    public function store(Request $request){
        
        $requestArray = $request->all();
        // $requestArray['user_id'] = Auth::user()->id;
        // return $requestArray ;
        $this->model->create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , Request $request){
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();        
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }
    public function show($id)
    {
        $item = $this->model->where('room_id' , $id)->get();
        $with = $this->with();
        // return $with;
        if (!empty($with))
        {
            $item = $this->model::with($with)->get()->find($id);
            // $rows = $rows->with($with);
        }
        return $this->APIResponse($item, null, 200);
    }
}
