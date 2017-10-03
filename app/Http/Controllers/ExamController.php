<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:43 AM
 */

namespace App\Http\Controllers;


use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;


class ExamController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->query('currentUser'); /* @var $user User */
        $exams = Exam::getAllExamsForUser($user);
        return view('main.main' , ["exams" => $exams]);
    }

    public function enroll(Request $request , $examId)
    {
        $user = $request->query('currentUser'); /* @var $user User */
        $exam  = Exam::find($examId);

        if (!$exam)
        {
            return redirect("/")->withErrors(['EXAM_NOT_EXIST']);
        }
        if ($exam->Status == 0)
        {
            return redirect("/")->withErrors(['EXAM_CLOSED']);
        }

        $alreadyEnrolled = $exam->didEnrolled($user);
        if ($alreadyEnrolled)
        {
            return view('exam.exam')->withErrors(['ALREADY_ENROLLED']);
        }

        $exam->enroll($user);
        return view('exam.exam');
    }

}