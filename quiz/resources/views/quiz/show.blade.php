@extends('layout')

@section('content')
    <div class="container">
        <h3 class="text-center my-3"><span class="text-muted">Тест: </span>{{ $quiz->title }}</h3>
        <form action="{{ route('quiz.result', $quiz->id) }}" method="post">
            @csrf
            <input type="hidden" name="quiz_uuid" value="{{ $quiz->uuid }}">
            <div class="accordion" id="accordionExample">
                @foreach($quiz->questions as $question)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button @if(!$loop->first)collapsed @endif" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $loop->iteration }}"
                                    @if($loop->first)
                                    aria-expanded="true"
                                    @else
                                    aria-expanded="false"
                                    @endif
                                    aria-controls="collapse{{ $loop->iteration }}">
                                {{__('Вопрос №')}}{{ $loop->iteration }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->iteration }}"
                             class="accordion-collapse collapse @if($loop->first) show @endif"
                             aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="mb-3"><strong>{{ $question->text }}</strong></p>

                                @foreach($question->choices as $choice)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               name="questions[][{{$question->uuid}}]" value="{{$choice->uuid}}" id="choice-{{$choice->uuid}}">
                                        <label class="form-check-label" for="choice-{{$choice->uuid}}">
                                            {{ $choice->text }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($errors->has('questions'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{__('Необходимо выбрать варианты ответов')}}
                </div>
            @endif
            <button type="submit" class="btn btn-secondary mt-3">Проверить тест</button>
        </form>
    </div>
@endsection
