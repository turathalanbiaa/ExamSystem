<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/3/17
 * Time: 8:40 AM
 */

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AnswerController
{

    public function answer(Request $request)
    {

        $user = $request->query('currentUser'); /* @var $user User */

        $questionId = Input::get("questionId");
        $answerValue = Input::get("answer");

        if (empty($answerValue))
        {
            return ["success" => false , "valid" => false , "CODE" => "DATA_NOT_VALID"];
        }

        $answer = Answer::where("Question_ID" , $questionId)->where("User_ID" , $user->ID)->first();
        if (!$answer)
        {
            $answer = new Answer();
        }

        $answer->User_ID = $user->ID;
        $answer->Answer = $answerValue;
        $answer->Question_ID = $questionId;
        $answer->Time = date('Y-m-d H:m:s');

        $success = $answer->save();
        return ["success" => $success];
    }

    public function leave(Request $request)
    {
        $user = $request->query('currentUser'); /* @var $user User */
        $questionId = Input::get("questionId");

        $answer = Answer::where("Question_ID" , $questionId)->where("User_ID" , $user->ID)->first();
        if (!$answer)
        {
            return ["success" => false , "CODE" => "NO_QUESTION"];
        }

        $success = $answer->delete();
        return ["success" => $success];

    }

}