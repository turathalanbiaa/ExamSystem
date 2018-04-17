<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    public function uploadOne()
    {
        return view("upload.upload-one");
    }

    public function validateUploadOne(Request $request)
    {
        $rules = [
            "question" => "required",
            "correctAnswer" => "required"
        ];

        $this->validate($request, $rules);

        $question = new Question();

        $question->Title = Input::get("question");
        $question->Options = '["صح","خطأ"]';
        $question->Category = 1;
        $question->Exam_ID = 19;
        $question->CorrectAnswer = Input::get("correctAnswer");
        $success = $question->save();

        if (!$success)
            return redirect("/emad/upload-one")->with("Message","لم تتم عملية اضافة السؤال");

        return redirect("/emad/upload-one")->with("Message","تمت عملية اضافة السؤال بنجاح.");
    }

    public function uploadTwo()
    {
        return view("upload.upload-two");
    }

    public function validateUploadTwo(Request $request)
    {
        $rules = [
            "question" => "required",
            "option-1" => "required",
            "option-2" => "required",
            "correctAnswer"   => "required|numeric|between:1,3"
        ];

        $this->validate($request, $rules);

        $options = array();

        if (!is_null(Input::get("option-1")))
            array_push($options, Input::get("option-1"));

        if (!is_null(Input::get("option-2")))
            array_push($options, Input::get("option-2"));

        if (!is_null(Input::get("option-3")))
            array_push($options, Input::get("option-3"));

        $question = new Question();
        $question->Title = Input::get("question");
        $question->Options = json_encode($options ,JSON_UNESCAPED_UNICODE);
        $question->Category = 2;
        $question->Exam_ID = 19;
        $question->CorrectAnswer = $options[Input::get("correctAnswer") - 1];
        $success = $question->save();

        if (!$success)
            return redirect("/emad/upload-two")->with("Message","لم تتم عملية اضافة السؤال");

        return redirect("/emad/upload-two")->with("Message","تمت عملية اضافة السؤال بنجاح.");
    }
}
