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

Route::get("/login" , "UserController@showLogin");
Route::get("/register" , "UserController@showRegister");
Route::post("/register" , "UserController@create");
Route::post("/login" , "UserController@login");
Route::get("/logout" , "UserController@logout");

Route::get("/" , "ExamController@index")->middleware('login_auth');
Route::post("/answer" , "AnswerController@answer")->middleware('login_api_auth' , 'answer_guard');
Route::post("/leave" , "AnswerController@leave")->middleware('login_api_auth' , 'answer_guard');
Route::get("/exam/{id}" , "ExamController@display")->middleware('login_auth' , 'exam_check');

Route::get("/result/{id}" , "ResultController@result")->middleware('login_auth');
Route::get("/finish/{id}" , "ResultController@finish")->middleware('login_auth');

Route::get("/my-answer/{id}" , "ResultController@userAnswers")->middleware('login_auth');

