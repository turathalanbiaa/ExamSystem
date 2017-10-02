<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/2/17
 * Time: 10:43 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ExamController extends Controller
{

    public function index(Request $request , Response $response)
    {
        if (!$this->isLogin())
        {
            //return $response->red
        }
    }

    private function isLogin(Request $request)
    {
        return !empty($request->session()->get("USER_ID"));
    }

}