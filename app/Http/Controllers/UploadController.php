<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    public function uploadOne()
    {
        $exams = Exam::all();
        return view("upload.upload-one")->with("exams", $exams);
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
        $question->Exam_ID = Input::get("examId");
        $question->CorrectAnswer = Input::get("correctAnswer");
        $success = $question->save();

        if (!$success)
            return redirect("/aa8363d57c99e7f220c94dea8192dd8c/upload-one")->with("Message","لم تتم عملية اضافة السؤال");

        return redirect("/aa8363d57c99e7f220c94dea8192dd8c/upload-one?examId=$question->Exam_ID")->with("Message","تمت عملية اضافة السؤال بنجاح.");
    }

    public function uploadTwo()
    {
        $exams = Exam::all();
        return view("upload.upload-two")->with("exams", $exams);
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
        $question->Exam_ID = Input::get("examId");
        $question->CorrectAnswer = $options[Input::get("correctAnswer") - 1];
        $success = $question->save();

        if (!$success)
            return redirect("/aa8363d57c99e7f220c94dea8192dd8c/upload-two")->with("Message","لم تتم عملية اضافة السؤال");

        return redirect("/aa8363d57c99e7f220c94dea8192dd8c/upload-two?examId=$question->Exam_ID")->with("Message","تمت عملية اضافة السؤال بنجاح.");
    }
}
