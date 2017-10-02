<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:11 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $table = "option";
    public $primaryKey = "ID";
    public $timestamps = false;
}