<?php

namespace App\Http\Controllers;

use App\Business\CalculateResult;
use App\Enums\ExamStatus;
use App\Enums\FinishStatus;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Facades\Input;

class ResultController extends Controller
{

    public function result($examId)
    {

        $user = Input::get('currentUser'); /* @var $user User */
        $examination = Exam::getUserExamination($user , $examId);

        if (!$examination)
            return redirect("/");

        //all closed situations
        if ($examination->ExamStatus == ExamStatus::EXAM_CLOSED)
            return redirect("/");

        //Exam Opened And User Didn't Finish The Exam
        if ($examination->ExamStatus == ExamStatus::EXAM_OPEN && $examination->FinishStatus == FinishStatus::NOT_FINISH)
            return redirect("/exam/" . $examination->ID)->withErrors(["RESULT@EXAM_NOT_FINISHED"]);


        if ($examination->FinishStatus == FinishStatus::NOT_FINISH)
            return $this->finish($examination->ID);

        return view('result.result' , ["examination" => $examination]);
    }

    public function  userAnswers($examId)
    {
        $exam = Exam::find($examId);
        if (!$exam || $exam->Status == ExamStatus::EXAM_CLOSED)
        {
            return redirect("/");
        }

        $user = Input::get("currentUser");
        $answers = Answer::getUserAnswers($user , $examId);

        return view('result.review_result' , ["answers" => $answers]);

    }
    public function finish($examId)
    {
        $user = Input::get('currentUser'); /* @var $user User */
        $exam = Exam::find($examId); /* @var $exam Exam */

        if (!$exam || !$exam->didEnrolled($user))
            return redirect("/");

        $answers = Answer::getUserAnswers($user , $exam->ID);

        $resultCalculator = new CalculateResult($answers , $exam->CategoryTwo , $exam->CategoryOne);
        $mark = $resultCalculator->getMyResult();

        $exam->finish($user , $mark);
        return $this->result($examId);
    }
}
