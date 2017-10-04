<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $table = "question";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public static function getQuestionsWithAnswersForUser(User $user , $examId)
    {
        $SQL = "SELECT question.ID AS QuestionID , Title , CorrectAnswer , Options , Category , answer.Answer AS UserAnswer 
                FROM question LEFT JOIN answer ON question.ID = answer.Question_ID AND User_ID = ? WHERE Exam_ID = ? ORDER BY QuestionID";
        $questions = DB::select($SQL , [$user->ID , $examId]);
        return $questions;
    }

}
