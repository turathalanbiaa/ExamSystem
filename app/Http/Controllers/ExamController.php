<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:43 AM
 */

namespace App\Http\Controllers;


use App\Enums\QuestionCategory;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ExamController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->query('currentUser'); /* @var $user User */
        $exams = Exam::getAllExamsForUser($user);
        return view('main.main' , ["exams" => $exams , "user" => $user]);
    }

    public function display(Request $request)
    {

        $user = Input::get('currentUser'); /* @var $user User */
        $exam = Input::get("exam"); /* @var $exam Exam */
        $questionWithAnswers = Question::getQuestionsWithAnswersForUser($user , $exam->ID);

        $separatedQuestions = $this->separate($questionWithAnswers);

        return view("exam.exam" ,
            [
                "trueOrFalseQuestions" => $separatedQuestions[QuestionCategory::TRUE_AND_FALSE] ,
                "optionsQuestions" => $separatedQuestions[QuestionCategory::OPTIONS] ,
                "exam" => $exam
            ]);
    }

    private function separate($questions)
    {
        $trueOrFalseQuestions = [];
        $optionsQuestions = [];
        foreach ($questions as $question)
        {
            if($question->Category == QuestionCategory::OPTIONS)
                $optionsQuestions[] = $question;
            else
                $trueOrFalseQuestions[] = $question;
        }

        return [QuestionCategory::OPTIONS => $optionsQuestions , QuestionCategory::TRUE_AND_FALSE => $trueOrFalseQuestions];

    }

}