@extends('layouts.front')
@section('title', 'Политика конфиденциальности')
@section('content')

<div class="container page">
  <h1 class="block-title mb-4">Политика в отношении обработки персональных данных</h1>
  {!! $policy->text !!}
</div>

@endsection