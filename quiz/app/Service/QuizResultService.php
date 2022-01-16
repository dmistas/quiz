<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;

use Exception;
use phpDocumentor\Reflection\Types\Boolean;

class QuizResultService
{
    private QuizDTO $quiz;
    private AnswersDTO $answers;

    public function __construct(QuizDTO $quiz, AnswersDTO $answers)
    {
        $this->quiz = $quiz;
        $this->answers = $answers;
    }

    public function getResult(): float
    {
        $countQuestions = 0;
        $countRightAnswers = 0;
        foreach ($this->quiz->getQuestions() as $question) {
            $countQuestions += 1;
            if ($this->checkAnswer($question)) {
                $countRightAnswers += 1;
            }
        }
        return $countRightAnswers / $countQuestions;
    }

    private function checkAnswer(QuestionDTO $question): bool
    {
        $result = false;
        foreach ($this->answers->getAnswers() as $answer) {
            if ($question->getUUID() !== $answer->getQuestionUUID()) {
                continue;
            }
            $correctAnswers = collect($question->getChoices())->filter(function (ChoiceDTO $choice) {
                return $choice->isCorrect();
            })->map(function ($choice) {
                return $choice->getUUID();
            });
            if ($correctAnswers->count() !== count($answer->getСhoices())) {
                break;
            }
            if (!$correctAnswers->diff($answer->getСhoices())->count()) {
                break;
            }
            $result = true;
            break;
        }
        return $result;
    }
}
