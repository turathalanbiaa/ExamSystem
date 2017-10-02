<?php

Route::get("/register" , "UserController@create");
Route::get("/login" , "UserController@login");
Route::get("/logout" , "UserController@logout");

Route::get("/" , "ExamController@index");
Route::get("/enroll/{id}" , "ExamController@enroll")->where(['id' => '[0-9]+']);

Route::get("/result" , "ResultController@result");

Route::get("/help" , "HelpController@help");
