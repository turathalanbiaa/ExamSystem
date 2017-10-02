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

}
