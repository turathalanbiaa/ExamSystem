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

        $exams = Exam::all();
        return ["exams" => $exams];

    }

    public function registerOnExam(Request $request , $examId)
    {
        if (!$this->isLogin($request))
        {
            return redirect("/login");
        }

        $userId = $request->session()->get("USER_ID");
        $user = User::find($userId);
        $exam  = Exam::find($examId);

        if (!$exam)
        {
            return ["success" => false , "CODE" => "EXAM_NOT_EXIST"];
        }

        $alreadyEnrolled = $exam->didEnrolled($user);
        if ($alreadyEnrolled)
        {
            return ["success" => false , "CODE" => "ALREADY_ENROLLED"];
        }

        $success = $exam->enroll($user);
        return ["success" => $success];
    }

    private function isLogin(Request $request)
    {
        return !empty($request->session()->get("USER_ID"));
    }

}