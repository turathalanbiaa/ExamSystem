<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamEnrollment extends Model
{
    protected $table = "enrollment";
    protected $primaryKey = "ID";
    public $timestamps = false;
}
