<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\APIResponseTrait;
use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{LiveComment , LiveConnect};
use Auth;
class StudentLessonController extends Controller
{
    use APIResponseTrait;
    public function addComment($id)
    {
         LiveComment::create(
            [
                'comment' => request('comment'),
                'user_name'=>Auth::guard('student-api')->user()->user_name ,//Auth::guard('student-api')->user()->user_name,
                'type'=> "students" ,
                'live_id' =>$id,
                'person_id'=>Auth::guard('student-api')->user()->id //Auth::guard('student-api')->user()->id
            ]
            );
        $this->sendToFirebase($id , request('comment') , Auth::guard('student-api')->user()->full_name); 
    //    return $this->sendToFirebase($id , request('comment')); 
        return $this->APIResponse(null, null, 200);
    }
    public function showComments($liveId)
    {
        
       $comments =  LiveComment::where('live_id',$liveId)->orderBy('id', 'DESC')->get(['comment' , 'user_name']);
       return $this->APIResponse($comments, null, 200);
    }

    public function sendToFirebase($liveId , $comment = " " ,$studentName="student" )
    {
        // return __DIR__ ;
        $path = app_path('Http/Controllers/egslive-282521-firebase-adminsdk-znco6-eacb195870.json');

        $serviceAccount = ServiceAccount::fromJsonFile($path);
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://egslive-282521.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        // $database->getReference('/deliveries') // this is the root reference
        // ->update(['1' => 55 ]);

        $reference = $database->getReference('/comments');

        $snapshot = $reference->getSnapshot()->getValue();
        //    return  $snapshot;
        // $ids =   $database->getReference('/deliveries')->getChildKeys();

        // return  $database->getReference('/deliveries')->getChildKeys();

        // $database->getReference('deliveries')->remove();
        // for($i=0;$i<count($snapshot);$i++){
        //     if($snapshot[$i] == null)
        //     unset($snapshot[$i]);
        // }
        $snapshot[$liveId] = $comment . ":" . $studentName;
        $newPost = $database
            ->getReference('/comments')
            ->update($snapshot);

        // return $database->getChild() ;
        // $newPost = $database
        // ->getReference('/')
        // ->push([
        //     $id => $id2
        // ]);

        //   echo '<pre>';
        //   print_r($newPost->getvalue() );
    }

    public function joinLive($liveId)
    {
        
        $connect = LiveConnect::where(['live_id' => $liveId , 'student_id' => Auth::guard('student-api')->user()->id ])->first();
        if(isset($connect)){
            $connect->update(['in_out' => 1]);
           
        }
        else
        {
            // return "test";
            LiveConnect::create([
                'live_id' => $liveId ,
                'student_id' => Auth::guard('student-api')->user()->id
            ]);
        }
        

        // $path = app_path('Http/Controllers/egslive-282521-firebase-adminsdk-znco6-eacb195870.json');

        // $serviceAccount = ServiceAccount::fromJsonFile($path);
        // $firebase = (new Factory)
        //     ->withServiceAccount($serviceAccount)
        //     ->withDatabaseUri('https://egslive-282521.firebaseio.com/')
        //     ->create();

        // $database = $firebase->getDatabase();

        // // $database->getReference('/deliveries') // this is the root reference
        // // ->update(['1' => 55 ]);

        // $reference = $database->getReference('/connects');

        // $snapshot = $reference->getSnapshot()->getValue();
        // //    return  $snapshot;
       
        // return  $snapshot;
        // // $ids =   $database->getReference('/deliveries')->getChildKeys();

        // // return  $database->getReference('/deliveries')->getChildKeys();

        // // $database->getReference('deliveries')->remove();
        // $snapshot[$liveId] = $studentName."?".$studentId.':'.$action;


        $this->sendToFirebaseJoinLive($liveId , 1 ,Auth::guard('student-api')->user()->full_name , Auth::guard('student-api')->user()->id );
        return $this->APIResponse(null, null, 200);
       
    }

    public function leftLive($liveId)
    {
        $connect = LiveConnect::where(['live_id' => $liveId , 'student_id' => Auth::guard('student-api')->user()->id ])->first();
        // return $connect;
        if(isset($connect)){
            $connect->update(['in_out' => 0]);
            $this->sendToFirebaseJoinLive($liveId , 0 ,Auth::guard('student-api')->user()->full_name , Auth::guard('student-api')->user()->id );
            return $this->APIResponse(null, null, 200);
        }
        return $this->APIResponse(null, "الطلب غير مسجل حضور من قبل في الدرس", 400);
       
    }

    public function sendToFirebaseJoinLive($liveId , $action = 1,$studentName="student" ,$studentId)
    {
        // return __DIR__ ;
        $path = app_path('Http/Controllers/egslive-282521-firebase-adminsdk-znco6-eacb195870.json');

        $serviceAccount = ServiceAccount::fromJsonFile($path);
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://egslive-282521.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        // $database->getReference('/deliveries') // this is the root reference
        // ->update(['1' => 55 ]);

        $reference = $database->getReference('/connects');

        $snapshot = $reference->getSnapshot()->getValue();
        //    return  $snapshot;
        // $ids =   $database->getReference('/deliveries')->getChildKeys();

        // return  $database->getReference('/deliveries')->getChildKeys();

        // $database->getReference('deliveries')->remove();
        // for($i=0;$i<count($snapshot);$i++){
        //     if($snapshot[$i] == null)
        //        unset($snapshot[$i]);
        // }
        
        $snapshot[$liveId] = $studentName."?".$studentId.':'.$action;
        $newPost = $database
            ->getReference('/connects')
            ->update($snapshot);

        // return $database->getChild() ;
        // $newPost = $database
        // ->getReference('/')
        // ->push([
        //     $id => $id2
        // ]);

        //   echo '<pre>';
        //   print_r($newPost->getvalue() );
    }
}
