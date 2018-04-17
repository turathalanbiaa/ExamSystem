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
            "question" => "required"
        ];

        $this->validate($request, $rules);

        $question = new Question();

        $question->Title = Input::get("question");
        $question->Options = '["صح","خطأ"]';
        $question->Category = 1;
        $question->Exam_ID = 19;
        $question->CorrectAnswer = Input::get("CorrectAnswer");
        $success = $question->save();

        if (!$success)
            return redirect("/emad/upload-one")->with("Message","لم تتم عملية اضافة السؤال");

        return redirect("/emad/upload-one")->with("Message","تمت عملية اضافة السؤال بنجاح.");
    }
}
