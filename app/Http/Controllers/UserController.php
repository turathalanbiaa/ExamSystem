<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 9/28/17
 * Time: 11:53 AM
 */

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController
{

    public function create(Request $request)
    {
        if ($request->session()->get('USER_ID'))
        {
            return ["success" => false , "ERROR_CODE" => "ALREADY_LOGGED_IN"];
        }


        $name = Input::get("name");
        $phone = Input::get("phone");

        if (empty($name) || empty($phone))
        {
            return ["success" => false , "valid" => false];
        }

        $user = new User();

        $user->Name = $name;
        $user->Phone = $phone;
        $user->Code = $user->getRandomCode();
        $user->RegisterDate = date("Y-m-d");

        $success = $user->save();

        //login current user
        $request->session()->put("USER_ID" , $user->ID);

        return ["success" => $success , "Code" => $user->Code , "ID" => $user->ID];
    }

    public function login(Request $request)
    {
        $code = Input::get("code");
        $user = User::where("Code" , $code)->first();

        if ($user)
        {
            $request->session()->put("USER_ID" , $user->ID);
            return ["success" => true];
        }

        return ["success" => false];

    }

    public function logout(Request $request)
    {
        $request->session()->forget('USER_ID');
        return ["success" => true];
    }

}