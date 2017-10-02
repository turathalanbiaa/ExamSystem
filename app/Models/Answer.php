<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:10 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $table = "answer";
    public $primaryKey = "ID";
    public $timestamps = false;
}