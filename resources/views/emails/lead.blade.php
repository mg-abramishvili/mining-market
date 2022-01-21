@component('mail::message')
# Новая заявка с сайта Mining-Market

Имя:<br>{{ $name }}
<br><br>

Телефон:<br>{{ $tel }}
<br><br>

@if(isset($message))
Сообщение:<br>{{ $message }}
@endif

@if(isset($quiz))
Квиз:<br>
@foreach($quiz as $key => $quizItem)
{{$quizItem['question']}}:
<br>
{{$quizItem['answer']}}
<br>
<br>
@endforeach
@endif

@if(isset($product))
Товар:<br>{{ $product }}
@endif

@endcomponent