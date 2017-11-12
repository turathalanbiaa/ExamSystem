<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    public $table = "exam";
    public $primaryKey = "ID";
    public $timestamps = false;

    public function questions()
    {
        return $this->hasMany('App\Models\Question' , "Exam_ID" , "ID");
    }


    public function enroll(User $user)
    {
        $enrollment = new ExamEnrollment();
        $enrollment->Exam_ID = $this->ID;
        $enrollment->User_ID = $user->ID;
        $enrollment->Mark = null;
        $enrollment->Status = 0;
        return $enrollment->save();
    }

    public function didEnrolled(User $user)
    {
        $enrollment = ExamEnrollment::where("Exam_ID" , $this->ID)->where("User_ID" , $user->ID)->first();
        if ($enrollment)
            return true;

        return false;
    }

    public function getFinishState(User $user)
    {
        $enrollment = ExamEnrollment::where("Exam_ID" , $this->ID)->where("User_ID" , $user->ID)->first();
        if (!$enrollment)
            return null;

        return $enrollment->Status;
    }

    public function finish(User $user , $mark)
    {
        $enrollment = ExamEnrollment::where("Exam_ID" , $this->ID)->where("User_ID" , $user->ID)->first();
        $enrollment->Status = 1;
        $enrollment->Mark = $mark;
        $enrollment->save();
    }

    public static function getAllExamsForUser(User $user)
    {
        $SQL = "SELECT exam.ID , Name , Date , exam.Status AS ExamStatus , Mark , enrollment.Status AS FinishState 
                FROM exam LEFT JOIN enrollment ON enrollment.Exam_ID = exam.ID AND User_ID = ? ORDER BY exam.ID DESC";
        $result = DB::select($SQL , [$user->ID]);
        return $result;
    }

    public static function getUserExamination(User $user , $examId)
    {
        $SQL = "SELECT exam.ID , Name , User_ID , exam.Status AS ExamStatus , enrollment.Status AS FinishStatus , enrollment.Mark 
                FROM exam JOIN enrollment ON exam.ID = enrollment.Exam_ID
                WHERE exam.ID = ? AND User_ID = ?";

        $result = DB::select($SQL , [$examId , $user->ID]);
        if (count($result) > 0)
            return $result[0];

        return null;
    }

}
