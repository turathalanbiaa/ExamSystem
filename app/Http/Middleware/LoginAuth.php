<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class LoginAuth
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
            return redirect("/login");
        }

        $currentUser = $this->getCurrentUser($userId);
        if (!$currentUser)
            return redirect("/login");

        $request->merge(["currentUser" => $currentUser]);

        return $next($request);
    }

    private function getCurrentUser($userId)
    {
        $user = User::find($userId);
        return $user;
    }


}
