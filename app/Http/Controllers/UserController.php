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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController
{

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ], [
            'name.required' => "اسم الطالب الثلاثي فارغ.",
            'phone.required' => "رقم الهاتف او البريد فارغ."
        ]);

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