<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{StudentRoom};
use Auth;
class TeacherStudentController extends Controller
{
    use APIResponseTrait;
    public function showJoinRequests()
    { 
        $rows = StudentRoom::with(['student' , 'room'])
        ->select('student_rooms.*')
        ->join('room_teachers', 'student_rooms.room_id', '=', 'room_teachers.room_id')
        ->where('room_teachers.teacher_id', Auth::guard('teacher-api')->user()->id)
        ->where('room_teachers.is_private', 1)
        ->where('student_rooms.approvement', 'under_revision')
        ->get();
        return $this->APIResponse($rows, null, 200);
    }
    public function changeStatusStudentRoom($roomStudentId , $status)
    {
        $row =StudentRoom::find($roomStudentId);
        $row->update([
            'approvement' =>  $status , 
            'block_reason'=>request('block_reason')
        ]);
        return $this->APIResponse(null, null, 200);
    }
}
