<?php

namespace App\Http\Controllers;

use App\Business\CalculateResult;
use App\Enums\ExamStatus;
use App\Enums\FinishStatus;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\User;

use Faker\Provider\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ResultController extends Controller
{

    public function result($examId)
    {

        $user = Input::get('currentUser');
        /* @var $user User */
        $examination = Exam::getUserExamination($user, $examId);

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

        return view('result.result', ["examination" => $examination]);
    }

    public function userAnswers($examId)
    {
        $exam = Exam::find($examId);
        if (!$exam || $exam->Status == ExamStatus::EXAM_CLOSED) {
            return redirect("/");
        }

        $user = Input::get("currentUser");
        $answers = Answer::getUserAnswers($user, $examId);

        return view('result.review_result', ["answers" => $answers]);

    }

    public function finish($examId)
    {
        $user = Input::get('currentUser');
        /* @var $user User */
        $exam = Exam::find($examId);
        /* @var $exam Exam */

        if (!$exam || !$exam->didEnrolled($user))
            return redirect("/");

        $answers = Answer::getUserAnswers($user, $exam->ID);

        $resultCalculator = new CalculateResult($answers, $exam->CategoryTwo, $exam->CategoryOne);
        $mark = $resultCalculator->getMyResult();

        $exam->finish($user, $mark);
        return $this->result($examId);
    }

    public function viewStudents()
    {

        $all_student = Answer::getAllStudent();

        return view("result.all-student", ["students" => $all_student]);

    }


    public function statistics($exam_id)
    {
        $exam = DB::table('exam')->find($exam_id);
        $enrolled_students = DB::table('enrollment')->where("Exam_ID", $exam_id)->orderBy('ID', 'desc')->get();
        $examed_students = DB::table('enrollment')->where("Exam_ID", $exam_id)->where("Mark", "<>", "null")->orderBy('ID', 'desc')->get();
        $seccessed_students = DB::table('enrollment')->where("Exam_ID", $exam_id)->where("Mark", ">", "49")->orderBy('ID', 'desc')->get();

        return view("result.statistics", ["exam" => $exam, "enrolled_students" => $enrolled_students, "examed_students" => $examed_students, "seccessed_students" => $seccessed_students]);

    }

    public function allExam()
    {
        $exams = DB::table('exam')->orderBy('Date', 'desc')->get();

        return view("result.all-exams", ["exams" => $exams]);

    }

    public function examStatus()
    {
        $exam_id = Input::get("examID");

        $status = Input::get("status");
        $exam = Exam::find($exam_id);
        $exam->Status = $status;
        $seccess = $exam->save();
        $exams = DB::table('exam')->orderBy('Date', 'desc')->get();
        return view("result.all-exams", ["exams" => $exams]);
    }

    public function viewExamedStudent()
    {
        $exam_id = Input::get("examID");
        $type = Input::get("type");
        $exam = Exam::find($exam_id);


      switch ($type)
      {
          case (0): $SQL = "SELECT enrollment.ID AS ID  , Mark , `user`.Name as username ,  `user`.Code as code ,  `user`.ID as user_id
                FROM enrollment , `user`  WHERE  enrollment.User_ID = `user`.ID  AND Exam_ID = ?  ORDER BY enrollment.ID DESC ";
              $students = DB::select($SQL,[$exam_id]);
              break;
          case (1):  $SQL = "SELECT enrollment.ID AS ID  , Mark , `user`.Name as username ,  `user`.Code as code ,  `user`.ID as user_id
                FROM enrollment , `user`  WHERE  enrollment.User_ID = `user`.ID  AND Exam_ID = ? AND Mark <> ? ORDER BY `user`.Name  ASC ";
              $students = DB::select($SQL,[$exam_id , "null"]);
                break;
          case (2):
              $SQL = "SELECT enrollment.ID AS ID  , Mark , `user`.Name as username ,  `user`.Code as code ,  `user`.ID as user_id
                FROM enrollment , `user`  WHERE  enrollment.User_ID = `user`.ID  AND Exam_ID = ? AND Mark > ? ORDER BY   Mark   DESC ";
              $students = DB::select($SQL,[$exam_id , "49"]);
              break;

      }



        return view("result.all-examed-student", ["students" => $students ,"exam" => $exam ]);

    }


    public function showAnswers()
    {


        $id= Input::get("user_id");
        $examID= Input::get("examID");


        $SQL = "SELECT  question.ID AS ID , CorrectAnswer , Category , answer.Answer AS UserAnswer , Title  
                FROM question JOIN answer ON question.ID = answer.Question_ID  WHERE User_ID = ? AND Exam_ID = ? ORDER BY ID";
        $answers = DB::select($SQL , [$id , $examID]);

        return view('result.all-answers', ["answers" => $answers]);

    }



}
