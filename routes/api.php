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
    
    Route::resource('admins' , "AdminController");
    Route::resource('teachers' , "TeacherController");
    Route::resource('students' , "StudentController");
    Route::resource('rooms' , "RoomController");

    
   
});
        /////////// teacher /////////////
Route::prefix('teacher')->namespace('Teacher')->group(function(){
    Route::post('login', 'TeacherController@login')->name('teacher.login');
    Route::get('get-rooms', 'TeacherController@getRooms')->name('teacher.logout');
    Route::post('create-room', 'TeacherController@createRoom');
    Route::post('logout', 'TeacherController@logout')->name('teacher.logout');
});

        //////////////// student //////////////
Route::prefix('student')->namespace('Student')->group(function(){
    Route::post('register', 'StudentController@register')->name('student.login');
    Route::post('login', 'StudentController@login')->name('student.login');
    Route::get('get-rooms', 'StudentController@getRooms');
    Route::post('join-room/{id}', 'StudentController@joinRoom');
    Route::get('show-room/{id}', 'StudentController@getRoomDetials');
    Route::post('logout', 'StudentController@logout')->name('student.logout');
});

Route::get('test' , function ()
{
    return "test";
});