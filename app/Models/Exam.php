<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:05 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = "exam";
    public $primaryKey = "ID";
    public $timestamps = false;
}