@extends('layouts.front')
@section('content')

<div class="container page">
  <h1 class="block-title mb-4">Политика в отношении обработки персональных данных</h1>
  {!! $settings->policy !!}
</div>

@endsection