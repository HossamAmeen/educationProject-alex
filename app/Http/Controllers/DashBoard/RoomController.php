<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Room,RoomTeacher};
use Auth;
class RoomController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(Room $model)
    {
        $this->model = $model;
    }

    public function store(Request $request){
        
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'rooms');
        // $requestArray['user_id'] = Auth::user()->id;
        
       $room =  $this->model->create($requestArray);
       if(is_array($request->teacher_id)){

            for($i=0 ; $i<count($request->teacher_id);$i++)
            {
                RoomTeacher::create([
                    'teacher_id' => $request->teacher_id[$i],
                    'room_id' => $room->id]);
            }
            
        }

      
        return $this->APIResponse(null, null, 200);
    }

    public function update($id , Request $request){
       
        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        if(isset($requestArray['file']) )
        $requestArray['image'] =  $this->storeFile($request->file , 'rooms');
        
        // $requestArray['user_id'] = Auth::user()->id;
        
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }

    public function showPrivateRooms()
    {
        $rows = $this->model;
        
        $with = $this->with();
        if (!empty($with))
        {
            $rows = $rows->with($with);
        }
        $attributes = $this->attributes();
        $rows = $rows->where('is_private' , 1)->orderBy('id', 'DESC')->get($attributes);

        return $this->APIResponse($rows, null, 200);
    }
    public function filter($rows)
    {
        $rows = $this->model->where('is_private' , 0);
        return $rows;
    }
    public function withs()
    {
        return ["teacher"];
    }
}
