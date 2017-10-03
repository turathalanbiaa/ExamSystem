<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class LoginAPIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = $request->session()->get("USER_ID");

        if (empty($userId))
        {
            return ["success" => false , "login" => false , "CODE" => "USER_NOT_LOGGED_IN"];
        }

        $currentUser = $this->getCurrentUser($userId);
        if (!$currentUser)
            return ["success" => false];

        $request->merge(["currentUser" => $currentUser , "x"=>3]);

        return $next($request);
    }

    private function getCurrentUser($userId)
    {
        $user = User::find($userId);
        return $user;
    }

}
