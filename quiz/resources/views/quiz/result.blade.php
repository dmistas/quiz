@extends('layout')

@section('content')
    <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title">{{__('Ваш результат в тесте:')}}</h5>
                <p class="card-text">{{ $result }}%</p>
                <a href="{{ route('quiz.index') }}" class="btn btn-primary">{{__('На главную')}}</a>
            </div>
            <div class="card-footer text-muted"></div>
        </div>
    </div>
@endsection
