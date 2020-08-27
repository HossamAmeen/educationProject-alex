<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentLessonCOntroller extends Controller
{
    public function addComment($id)
    {
        LiveComment::create(
            [
                'comment' => request('comment'),
                'user_name'=> "hossam test" ,//Auth::guard('student-api')->user()->user_name,
                'type'=> "students" ,
                'live_id' =>$id,
                'person_id'=>1//Auth::guard('student-api')->user()->id
            ]
            );
            return $this->APIResponse(null, null, 200);
    }
    public function showComments($liveId)
    {
       $comments =  LiveComment::where('live_id',$liveId)->get(['comment' , 'user_name']);
       return $this->APIResponse($comments, null, 200);
    }
}
