<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:10 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = "question";
    public $primaryKey = "ID";
    public $timestamps = false;
}