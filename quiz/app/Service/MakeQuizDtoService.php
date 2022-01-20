<?php

namespace App\Service;

use App\DTO\ChoiceDTO;
use App\DTO\QuestionDTO;
use App\DTO\QuizDTO;
use App\Models\Quiz;

class MakeQuizDtoService
{
    protected $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function getQuizDTO()
    {
        $quizDTO = new QuizDTO($this->quiz->uuid, $this->quiz->title);
        $this->quiz->questions->each(function ($question) use ($quizDTO){
            $questionDTO = new QuestionDTO($question->uuid, $question->text);
            $question->choices->each(function ($choice) use($questionDTO) {
                $questionDTO->addChoice(new ChoiceDTO($choice->uuid, $choice->text, $choice->is_correct));
            });
            $quizDTO->addQuestion($questionDTO);
        });
        return $quizDTO;
    }
}
