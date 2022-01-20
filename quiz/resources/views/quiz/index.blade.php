@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">{{__('Перечень тестов')}}</div>
            <div class="card-body text-center">
                <ul class="list-group">
                    @forelse($quizzes as $quiz)
                        <li class="list-group-item"><a href="{{route('quiz.show', $quiz->id)}}">{{$quiz->title}}</a></li>
                    @empty
                        <li class="list-group-item">{{ __('Нет доступных тестов') }}</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection
