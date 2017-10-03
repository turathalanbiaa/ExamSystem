<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:43 AM
 */

namespace App\Http\Controllers;


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
        return view('main.main' , ["exams" => $exams]);
    }

    public function display(Request $request)
    {

        $user = Input::get('currentUser'); /* @var $user User */
        $exam = Input::get("exam"); /* @var $exam Exam */
        $questionWithAnswers = Question::getQuestionsWithAnswersForUser($user , $exam->ID);
        return view("exam.exam" , ["questions" => $questionWithAnswers]);
    }

}