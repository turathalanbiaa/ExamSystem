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
        if (!$this->isLogin($request))
        {
            return redirect("/login");
        }

        $userId = $request->session()->get("USER_ID");
        $user = User::find($userId);
        $exams = Exam::getAllExamsForUser($user);

        return view('main.main' , ["exams" => $exams]);
    }

    public function enroll(Request $request , $examId)
    {
        if (!$this->isLogin($request))
        {
            return redirect("/login")->withErrors(['NOT_LOGGED_IN']);
        }

        $userId = $request->session()->get("USER_ID");
        $user = User::find($userId);
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
            return view('exam.exam');
        }

        $exam->enroll($user);
        return view('exam.exam');
    }

    private function isLogin(Request $request)
    {
        return !empty($request->session()->get("USER_ID"));
    }

}