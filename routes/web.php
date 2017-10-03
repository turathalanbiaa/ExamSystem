<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get("/register" , "UserController@create");
Route::get("/login" , "UserController@login");
Route::get("/logout" , "UserController@logout");

Route::get("/" , "ExamController@index")->middleware('login_auth');
Route::get("/enroll/{id}" , "ExamController@enroll")->where(['id' => '[0-9]+'])->middleware('login_auth');

Route::get("/result" , "ResultController@result");



//Route::get('/', function () {
//    return view('exam.exam');
//});

Route::post('/ajax', function () {
    var_dump($_POST);
});
Route::get("/help" , "HelpController@help");
