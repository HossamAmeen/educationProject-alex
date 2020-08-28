<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->namespace('DashBoard')->group(function(){

    Route::post('/login', 'APIAuthController@login')->name('admin.login');
    Route::middleware('checkLogin')->group(function () {
        Route::post('/logout', 'APIAuthController@logout')->name('admin.logout');
    });
    Route::middleware('cors')->group(function () {
        Route::resource('admins' , "AdminController");
        Route::resource('teachers' , "TeacherController");
        Route::resource('students' , "StudentController");
        Route::resource('rooms' , "RoomController");
        Route::get('private-rooms' , "RoomController@showPrivateRooms");
        Route::get('show-lessons/{rooom}' , "RoomController@showLessons");
        Route::get('show-files/{rooom}' , "RoomController@showFilesForRoom");
        Route::resource('filesrooms' , "FileRoomController");
        Route::post('upload-file', 'UploadFileController@uploadFile');
    });
});
        /////////// teacher /////////////
Route::prefix('teacher')->namespace('Teacher')->group(function(){

    Route::post('login', 'TeacherController@login');
    Route::post('register', 'TeacherController@register');
    Route::middleware('checkLogin:teacher-api')->group(function () {

        Route::get('get-account', 'TeacherController@getAccount');
        Route::put('update-account', 'TeacherController@updateAccount');

                            ////////////// show rooms 
        Route::get('show-public-rooms', 'TeacherRoomController@showPublicRooms');
        Route::get('show-private-rooms', 'TeacherRoomController@showPrivateRooms');
        Route::get('show-rooms', 'TeacherRoomController@showRooms');
        Route::get('join-room/{roomId}', 'TeacherRoomController@joinRoom');
                            /////////// show registered room
        Route::get('get-rooms', 'TeacherRoomController@getRooms');
        Route::post('create-room', 'TeacherRoomController@createRoom');
        Route::get('show-room/{id}', 'TeacherRoomController@getRoomDetials');
        Route::put('update-room/{id}', 'TeacherRoomController@updateRoom');
                            ////////// teacher with student
         Route::get('show-join-requests', 'TeacherStudentController@showJoinRequests');  
         Route::put('change-join-request-status/{studentRoomId}/{status}', 'TeacherStudentController@changeStatusStudentRoom');  
                          
                            //////////////// lives
        Route::resource('lives' , "RoomLiveController");
        Route::get('get-lives-room/{room_id}', 'RoomLiveController@getLives');
        Route::get('show-comments/{liveId}', 'RoomLiveController@showComments');
        Route::get('show-connects/{liveId}', 'RoomLiveController@showConnects');
                        
        Route::post('logout', 'TeacherController@logout');
    });
});

        //////////////// student //////////////
Route::prefix('student')->namespace('Student')->group(function(){
    Route::post('register', 'StudentController@register')->name('student.login');
    Route::post('login', 'StudentController@login')->name('student.login');
    Route::middleware('checkLogin:student-api')->group(function () {
           
        Route::get('get-account', 'StudentController@getAccount');
        Route::put('update-account', 'StudentController@updateAccount');
                                ///// show rooms /////
        Route::get('show-public-rooms', 'StudentRoomController@showPublicRooms');
        Route::get('show-private-rooms', 'StudentRoomController@showPrivateRooms');
        Route::get('show-rooms', 'StudentRoomController@showRooms');
        Route::get('show-room/{id}', 'StudentRoomController@getRoomDetials');
                                //// show registered room
        Route::get('get-rooms', 'StudentRoomController@getRegisteredRooms');    ///////////// show all registered room 
        Route::post('join-room/{id}', 'StudentRoomController@joinRoom');
      
        

                                        /////////// student lesson

        Route::post('add-comment/{liveId}', 'StudentLessonCOntroller@addComment');
        Route::post('show-comments/{liveId}', 'StudentLessonCOntroller@showComment');

        Route::post('logout', 'StudentController@logout')->name('student.logout');
    });
});
Route::post('add-comment/{liveId}', 'Student\StudentController@addComment');
