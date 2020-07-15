<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileRoom;
use Auth;
class FIleRoomController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(FileRoom $model)
    {
        $this->model = $model;
    }

    public function store(Request $request){
        
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        {
           
            $fileName = $this->storeFile($request->file , 'room-files');
            $requestArray['path'] =  $fileName;
        }
       
        // $requestArray['user_id'] = Auth::user()->id;
        // return $requestArray ;
        $this->model->create($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , Request $request){
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        {
            $fileName = $this->storeFile($request->file , 'room-files');
            $requestArray['path'] =  $fileName;
        }
        
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }
}
