<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('corsMiddleware')->group(function () {
Route::prefix('admin')->namespace('DashBoard')->group(function(){

    Route::post('/login', 'APIAuthController@login')->name('admin.login');
    Route::middleware('checkLogin')->group(function () {
        Route::post('/logout', 'APIAuthController@logout')->name('admin.logout');
    });
    // Route::middleware('corsMiddleware')->group(function () {
        Route::get('configration' , "ConfigrationController@getConfigration");
        Route::resource('admins' , "AdminController");
        Route::resource('teachers' , "TeacherController");
        Route::resource('students' , "StudentController");
        Route::resource('rooms' , "RoomController");
        Route::get('show-join-requests/{roomId?}', 'RoomController@showJoinRequests');
        Route::put('change-join-request-status', 'RoomController@changeStatusStudentRoom');
        Route::get('private-rooms' , "RoomController@showPrivateRooms");
        Route::get('show-lessons/{rooom}' , "RoomController@showLessons");
        Route::get('show-files/{rooom}' , "RoomController@showFilesForRoom");
        Route::resource('filesrooms' , "FileRoomController");
        Route::post('upload-file', 'UploadFileController@uploadFile');
    // });
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
        Route::get('show-students/{classRoomId}/{liveId}', 'TeacherRoomController@showStudentsInRoom');
                        /////////// show registered room
        Route::get('get-rooms', 'TeacherRoomController@getRooms');
        // Route::get('join-public-room/{roomId}', 'TeacherRoomController@joinPublicRoom');
        Route::post('create-room', 'TeacherRoomController@createRoom');
        Route::get('show-room/{id}', 'TeacherRoomController@getRoomDetials');
        Route::put('update-room/{id}', 'TeacherRoomController@updateRoom');

                            ////////// teacher with student
         Route::get('show-join-requests', 'TeacherStudentController@showJoinRequests');
         Route::put('change-join-request-status/{studentRoomId}/{status}', 'TeacherStudentController@changeStatusStudentRoom');
         Route::get('show-teacher-students', 'TeacherStudentController@showTeacherStudents');

                            //////////////// lives
        Route::resource('lives' , "RoomLiveController");
        Route::get('get-lives-room/{room_id}', 'RoomLiveController@getLives');
        Route::get('show-comments/{liveId}', 'RoomLiveController@showComments');
        Route::get('show-connects/{liveId}', 'RoomLiveController@showConnects');
        Route::post('upload-file-lesson', 'RoomLiveController@uploadFileLesson');
        Route::put('update-file-lesson/{fileId}', 'RoomLiveController@updateFileLesson');
        Route::delete('delete-file-lesson/{fileId}', 'RoomLiveController@deleteFile');

        Route::get('search', 'TeacherRoomController@search');
        Route::post('logout', 'TeacherController@logout');
    });
});
Route::post('teacher/upload-file', 'DashBoard\UploadFileController@uploadFile');
// Route::post('student/upload-file', 'DashBoard\UploadFileController@uploadFile')->middleware('checkLogin:student-api');

        //////////////// student //////////////
Route::prefix('student')->namespace('Student')->group(function(){
    Route::post('register', 'StudentController@register')->name('student.login');
    Route::post('login', 'StudentController@login')->name('student.login');
    Route::middleware('checkLogin:student-api')->group(function () {

        Route::get('get-account', 'StudentController@getAccount');
        Route::post('update-account', 'StudentController@updateAccount');
                                ///// show rooms /////
        Route::get('show-public-rooms', 'StudentRoomController@showPublicRooms');
        Route::get('show-private-rooms', 'StudentRoomController@showPrivateRooms');
        Route::get('show-rooms', 'StudentRoomController@showRooms');
        Route::get('show-room/{id}', 'StudentRoomController@getRoomDetials');
                                //// show registered room
        Route::get('get-rooms', 'StudentRoomController@getRegisteredRooms');    ///////////// show all registered room
        Route::post('join-room/{id}', 'StudentRoomController@joinRoom');



                                        /////////// student lesson
        Route::get('join-live/{liveId}', 'StudentLessonController@joinLive');
        Route::get('left-live/{liveId}', 'StudentLessonController@leftLive');

        Route::post('add-comment/{liveId}', 'StudentLessonController@addComment');
        Route::get('show-comments/{liveId}', 'StudentLessonController@showComments');

        Route::post('logout', 'StudentController@logout')->name('student.logout');
    });
});

});
