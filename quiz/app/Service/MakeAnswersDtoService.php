<?php

namespace App\Service;

use App\DTO\AnswerDTO;
use App\DTO\AnswersDTO;
use Illuminate\Support\Str;

class MakeAnswersDtoService
{
    private array $questions;
    private AnswersDTO $answersDTO;

    public function __construct(string $quizUUID, array $questions)
    {
        $this->questions = $questions;
        $this->answersDTO = new AnswersDTO($quizUUID);
    }

    public function getAnswersDTO()
    {
        foreach ($this->questions as $questionUUID => $answers) {
            $answerDTO = new AnswerDTO(Str::after($questionUUID, 'question_'));
            foreach ($answers as $answerUUID) {
                $answerDTO->addChoiceUUID($answerUUID);
            }
            $this->answersDTO->addAnswer($answerDTO);
        }
        return $this->answersDTO;
    }

    public function makeAnswersDTO()
    {

    }
}
