<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/4/17
 * Time: 1:52 PM
 */

namespace App\Http\Middleware;


use App\Enums\ExamStatus;
use App\Enums\FinishStatus;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Input;

class AnswerGuard
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
        $user = Input::get('currentUser'); /* @var $user User */
        $questionId = Input::get("questionId");

        $question = Question::find($questionId);
        if ($question)
        {
            $exam = Exam::find($question->Exam_ID); /* @var $exam Exam*/
            if ($exam && $exam->Status = ExamStatus::EXAM_OPEN && $exam->getFinishState($user) == FinishStatus::NOT_FINISH)
            {
                return $next($request);
            }
        }

        return ["success" => false];

    }

}