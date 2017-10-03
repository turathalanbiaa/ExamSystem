<?php
namespace App\Commands;
use App\Enums\QuestionCategory;
use App\Models\Exam;
use App\Models\User;

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/3/17
 * Time: 2:30 PM
 * @property array questions
 */

class CalculateResult
{


    /**
     * CalculateResult constructor.
     * @param $questions array
     */
    public function __construct($questions)
    {
        $this->questions = $questions;
    }

    public function execute()
    {
        
    }

    private function separate()
    {
        $options = [];
        $trueOrFalse = [];

        foreach ($this->questions as $question)
        {
            if ($question->Category == QuestionCategory::OPTIONS)
                $options[] = $question;
            else
                $trueOrFalse[] = $question;
        }

        return [
            QuestionCategory::TRUE_AND_FALSE => $trueOrFalse ,
            QuestionCategory::OPTIONS => $options
        ];
    }

}