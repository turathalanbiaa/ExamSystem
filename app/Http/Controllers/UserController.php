<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 9/28/17
 * Time: 11:53 AM
 */

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController
{

    public function create()
    {

//        dd(['mysql' => [
//            'driver' => 'mysql',
//            'host' => env('DB_HOST', '127.0.0.1'),
//            'port' => env('DB_PORT', '3306'),
//            'database' => env('DB_DATABASE', 'forge'),
//            'username' => env('DB_USERNAME', 'forge'),
//            'password' => env('DB_PASSWORD', ''),
//            'unix_socket' => env('DB_SOCKET', ''),
//            'charset' => 'utf8mb4',
//            'collation' => 'utf8mb4_unicode_ci',
//            'prefix' => '',
//            'strict' => true,
//            'engine' => null,
//        ]]);


        dd("ali");
        $name = Input::get("name");
        $phone = Input::get("phone");

        if (empty($name) || empty($phone))
        {
            return ["success" => false , "valid" => false];
        }

        return Input::all();

        $users = DB::table("user")->get();
        dd($users);

        $user = new User();

        $user->Name = $name;
        $user->Phone = $phone;
        $user->Code = $user->getRandomCode();
        $user->RegisterDate = date("Y-m-d");

        $success = $user->save();

        return ["success" => $success];
    }

    public function login()
    {
        $code = Input::get("code");
        $user = User::where("Code" , $code)->first();

        if ($user)
        {
            return ["success" => true];
        }

        return ["success" => false];

    }

    public function logout()
    {
        //TODO
    }

}