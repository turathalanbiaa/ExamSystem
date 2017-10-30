<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{

    protected $table = "answer";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public static function getUserAnswers(User $user , $examId)
    {
        $SQL = "SELECT question.ID AS ID , CorrectAnswer , Category , answer.Answer AS UserAnswer , Title  
                FROM question JOIN answer ON question.ID = answer.Question_ID  WHERE User_ID = ? AND Exam_ID = ? ORDER BY ID";
        $answers = DB::select($SQL , [$user->ID , $examId]);
        return $answers;
    }
    public static function getAllStudent()
    {
        $SQL = "SELECT enrollment.ID AS ID  , Mark , `user`.Name as username , exam.Name ,  `user`.Code as code
                FROM enrollment , `user` , exam WHERE  enrollment.User_ID = `user`.ID AND enrollment.Exam_ID = exam.ID 
                ORDER BY code";
        $answers = DB::select($SQL);
        return $answers;
    }

}
