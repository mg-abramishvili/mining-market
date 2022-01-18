@extends('layouts.admin')
@section('title', 'Заявка #' . $lead->id)
@section('content')
<div class="w-100">
    <div class="box px-4 py-4">
        <p>
            <strong>Имя:</strong>
            {{ $lead->name }}
        </p>
        <p>
            <strong>Телефон:</strong>
            {{ $lead->tel }}
        </p>

        @if(isset($lead->message))
            <p>
                <strong>Сообщение:</strong>
                {{ $lead->message }}
            </p>
        @endif

        @if(isset($lead->quiz))
            @foreach($lead->quiz as $key => $quizItem)
                <strong>{{$quizItem['question']}}:</strong>
                <br>
                {{$quizItem['answer']}}
                <br>
                <br>
            @endforeach
        @endif
    </div>
</div>
@endsection