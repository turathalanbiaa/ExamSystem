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

Route::get("/all-students" , "ResultController@viewStudents");


Route::get("/aa8363d57c99e7f220c94dea8192dd8c/upload-one" , "UploadController@uploadOne");
Route::post("/aa8363d57c99e7f220c94dea8192dd8c/upload-one" , "UploadController@validateUploadOne");

Route::get("/aa8363d57c99e7f220c94dea8192dd8c/upload-two" , "UploadController@uploadTwo");
Route::post("/aa8363d57c99e7f220c94dea8192dd8c/upload-two" , "UploadController@validateUploadTwo");

Route::get("/aa8363d57c99e7f220c94dea8192dd8c/all-exams" , "ResultController@allExam");
Route::get("/aa8363d57c99e7f220c94dea8192dd8c/statistics/{exam_id}" , "ResultController@statistics");

Route::get("/aa8363d57c99e7f220c94dea8192dd8c/status" , "ResultController@examStatus");
Route::get("/aa8363d57c99e7f220c94dea8192dd8c/all-examed-student" , "ResultController@viewExamedStudent");


Route::get("/aa8363d57c99e7f220c94dea8192dd8c/show-answers" , "ResultController@showAnswers");