<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Quiz;
use App\Service\MakeAnswersDtoService;
use App\Service\MakeQuizDtoService;
use App\Service\QuizResultService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index', ['quizzes' => Quiz::with(['questions', 'questions.choices'])->get()]);
    }

    public function show(Quiz $quiz): view
    {
        $quiz->load(['questions', 'questions.choices']);
        return view('quiz.show', compact('quiz'));
    }

    public function getResult(QuizRequest $request, Quiz $quiz)
    {
        $formattedQuestions = [];
        foreach($request->questions as $item) {
            foreach ($item as $key => $item2){
                $formattedQuestions[$key][] = $item2;
            }
        }
        $quizDTO = (new MakeQuizDtoService($quiz->load(['questions', 'questions.choices'])))->getQuizDTO();
        $answerDTO = (new MakeAnswersDtoService($request->quiz_uuid, $formattedQuestions))->getAnswersDTO();
        $result = (new QuizResultService($quizDTO, $answerDTO))->getResult() * 100;
        return view('quiz.result', compact('result'));

    }
}
