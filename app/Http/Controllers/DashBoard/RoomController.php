<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Room,PublicRoomTeacher};
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
        if(isset($requestArray['image']) )
        {
            $fileName = $this->uploadImage($request );
            $requestArray['image'] =  $fileName;
        }
        // $requestArray['user_id'] = Auth::user()->id;
       $room =  $this->model->create($requestArray);
       if(is_array($request->teacher_id)){
        for($i=0 ; $i<count($request->teacher_id);$i++)
        {
            PublicRoomTeacher::create([
                'teacher_id' => $request->teacher_id[$i],
                'room_id' => $room->id]);
        }
       }
       else
       {
        $room->teacher_id = $request->teacher_id ;
        $room->save();
        PublicRoomTeacher::create([
            'teacher_id' => $request->teacher_id,
            'room_id' => $room->id]);
       }
      
        return $this->APIResponse(null, null, 200);
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
    
    public function withs()
    {
        return ["teacher"];
    }
}
