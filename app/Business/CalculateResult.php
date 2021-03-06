<?php
namespace App\Business;
use App\Enums\QuestionCategory;

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/3/17
 * Time: 2:30 PM
 * @property array $answers
 * @property int optionCount
 * @property int trueAndFalseCount
 */

class CalculateResult
{


    /**
     * CalculateResult constructor.
     * @param $answers array
     * @param $optionCount
     * @param $trueAndFalseCount
     */
    public function __construct($answers , $optionCount , $trueAndFalseCount)
    {
        $this->answers = $answers;
        $this->optionCount = $optionCount;
        $this->trueAndFalseCount = $trueAndFalseCount;
    }

    public function getMyResult()
    {
        $questions = $this->separate();
        $optionsQuestions = $questions[QuestionCategory::OPTIONS];
        $trueAndFalseQuestions = $questions[QuestionCategory::TRUE_AND_FALSE];

        return $this->calculate($trueAndFalseQuestions , $optionsQuestions);
    }

    private function separate()
    {
        $options = [];
        $trueOrFalse = [];

        foreach ($this->answers as $question)
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

    private function calculate($trueAndFalseQuestions , $optionsQuestions)
    {
        $grade = 0;
        $correctAnswers = 0;

        for ($counter = 0 ; $counter < count($trueAndFalseQuestions) ; $counter++)
        {
            $question = $trueAndFalseQuestions[$counter];
            if (strcmp(trim($question->CorrectAnswer) , trim($question->UserAnswer)) == 0 )
            {
                $grade = $grade + 4;
                $correctAnswers++;
            }

            if ($correctAnswers == $this->trueAndFalseCount)
            {
                break;
            }
        }

        $correctAnswers = 0;
        for ($counter = 0 ; $counter < count($optionsQuestions) ; $counter++)
        {
            $question = $optionsQuestions[$counter];
            if (strcmp(trim($question->CorrectAnswer) , trim($question->UserAnswer)) == 0)
            {
                $grade = $grade + 4;
            }

            if ($correctAnswers == $this->optionCount)
            {
                break;
            }
        }

        if($grade>100)
            $grade=100;
        return $grade;

    }

}