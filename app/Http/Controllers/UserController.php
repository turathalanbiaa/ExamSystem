<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserController
{

    public function showLogin(Request $request)
    {
        $user = $this->loginWithSession($request);
        if ($user)
            return view("main.main" , ["user" => $user]);

        if ($this->isLoggedIn($request))
        {
            return redirect("/");
        }

        return view("main.login");
    }

    public function login(Request $request)
    {
        $code = Input::get("code");
        $user = User::where("Code" , $code)->first();

        if ($user)
        {
            $request->session()->put("USER_ID" , $user->ID);
            $user->Session = md5(uniqid());
            $user->save();
            return redirect("/")->withCookie(cookie("SESSION" , $user->Session));
        }

        return view("main.login");

    }

    private function loginWithSession(Request $request)
    {
        $session = $request->cookie("SESSION");
        $user = User::where("Session" , $session)->where("Session" , "<>" , null)->first();
        if ($user)
        {
            $request->session()->put("USER_ID" , $user->ID);
            return $user;
        }

        return false;
    }

    public function showRegister(Request $request)
    {
        if ($this->isLoggedIn($request))
            return redirect("/");

        return view("main.create_account");
    }


    public function create(Request $request)
    {
        if ($this->isLoggedIn($request))
            return redirect("/");

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
        $session = md5(uniqid());
        $user->Session = $session;

        $user->save();

        //login current user
        $request->session()->put("USER_ID" , $user->ID);
        return redirect("/")->withCookie(cookie("SESSION" , $user->Session));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('USER_ID');
        return
            redirect("/")
                ->withCookie(cookie("SESSION" , null , -1));
    }

    private function isLoggedIn(Request $request)
    {
        return $request->session()->get('USER_ID') ? true : false;
    }

}