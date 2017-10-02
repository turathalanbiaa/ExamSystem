<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = "exam";
    public $primaryKey = "ID";
    public $timestamps = false;

    public function questions()
    {
        return $this->hasMany('App\Models\Question' , "Exam_ID" , "ID");
    }
}
