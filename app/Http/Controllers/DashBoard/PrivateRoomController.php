<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PrivateRoom,PrivateRoomTeacher};
use Auth;
class PrivateRoomController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(PrivateRoom $model)
    {
        $this->model = $model;
    }
    public function update($id , Request $request){
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['image']) )
        {
            $fileName = $this->uploadImage($request );
            $requestArray['image'] =  $fileName;
        }
        
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }
}
