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
Route::middleware('login_api_auth')->post("/answer" , "AnswerController@answer");
Route::post("/leave" , "AnswerController@leave")->middleware('login_api_auth');
Route::get("/exam/{id}" , "ExamController@display")->middleware('login_auth' , 'exam_check');

Route::get("/result/{id}" , "ResultController@result");
Route::get("/help" , "HelpController@help");