<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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
        Route::resource('filesrooms' , "FileRoomController");
        Route::post('upload-file', 'UploadFileController@uploadFile');
    });
    
   
});
        /////////// teacher /////////////
Route::prefix('teacher')->namespace('Teacher')->group(function(){

    Route::post('login', 'TeacherController@login');
    Route::post('register', 'TeacherController@register');
    Route::middleware('checkLogin:teacher-api')->group(function () {

        Route::get('get-rooms', 'TeacherController@getRooms');
        Route::post('create-public-room', 'TeacherController@createPublicRoom');
        Route::post('create-room', 'TeacherController@createRoom');
        Route::resource('lives' , "RoomLiveController");
        Route::get('get-lives-room/{room_id}', 'RoomLiveController@getLives');
        Route::post('logout', 'TeacherController@logout');
    });
});

        //////////////// student //////////////
Route::prefix('student')->namespace('Student')->group(function(){
    Route::post('register', 'StudentController@register')->name('student.login');
    Route::post('login', 'StudentController@login')->name('student.login');
    Route::middleware('checkLogin:student-api')->group(function () {
                                ///// show rooms /////
        Route::get('show-public-rooms', 'StudentRoomController@showPublicRooms');
        Route::get('show-private-rooms', 'StudentRoomController@showPrivateRooms');
        Route::get('show-rooms', 'StudentRoomController@showRooms');
                                //// show registered room
        Route::get('get-rooms', 'StudentController@getRooms');    ///////////// show all registered room 
        Route::post('join-public-room/{id}', 'StudentController@joinPublicRoom');
        Route::post('join-room/{id}', 'StudentController@joinRoom');
        Route::get('show-private-room/{id}', 'StudentController@getPrivateRoomDetials');
        Route::get('show-public-room/{id}', 'StudentController@getPublicRoomDetials');

      

        Route::post('add-comment/{liveId}', 'StudentController@addComment');

        Route::post('logout', 'StudentController@logout')->name('student.logout');
    });
});
Route::post('add-comment/{liveId}', 'Student\StudentController@addComment');
Route::get('show-comments/{liveId}', 'Student\StudentController@showComments');