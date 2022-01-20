<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions' => ['required', 'array'],
        ];
    }

    public function formattedQuestions()
    {
        $formattedQuestions = [];
        foreach($this->questions as $item) {
            foreach ($item as $key => $item2){
                $formattedQuestions[$key][] = $item2;
            }
        }
        return $formattedQuestions;
    }
}
