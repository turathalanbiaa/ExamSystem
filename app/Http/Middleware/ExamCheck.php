<?php

namespace App\Http\Middleware;

use App\Models\Exam;
use Closure;

class ExamCheck
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

        $examId = $request->route()->parameter("id");
        $exam  = Exam::find($examId);
        $user = $request->query("currentUser");

        if (!$exam)
        {
            return redirect("/")->withErrors(['EXAM_NOT_EXIST']);
        }
        if ($exam->Status == 0)
        {
            return redirect("/")->withErrors(['EXAM_CLOSED']);
        }

        $alreadyEnrolled = $exam->didEnrolled($user);
        if (!$alreadyEnrolled)
        {
            $exam->enroll($user);
        }

        $request->merge(["exam" => $exam , "alreadyEnrolled" => $alreadyEnrolled]);


        return $next($request);
    }
}
