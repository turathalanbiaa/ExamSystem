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
        $SQL = "SELECT question.ID AS ID , CorrectAnswer , Category , answer.Answer AS UserAnswer 
                FROM question JOIN answer ON question.ID = answer.Question_ID WHERE User_ID = ? AND Exam_ID = ?";
        $answers = DB::select($SQL , [$user->ID , $examId])->orderBy("ID");
        return $answers;
    }

}
