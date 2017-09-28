<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 9/28/17
 * Time: 11:50 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{

    public $table = "user";
    public $primaryKey = "Id";
    public $timestamps = false;


    public function getRandomCode()
    {
        $randomCode = rand(10000 , 99999);
        $user = DB::table("user")->where("Code" , $randomCode)->get();
        while ($user)
        {
            dd($user);
            $randomCode = rand(10000 , 99999);
            $user = DB::table("user")->where("Code" , $randomCode)->get();
        }
        return $randomCode;
    }

}