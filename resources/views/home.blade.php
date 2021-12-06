@extends('layouts.front')
@section('content')

<section class="hero">
  <div class="container">
    <div class="hero-inner">
      <h1>Майнинг-фермы <br>под ключ</h1>
      <ul>
        <li>Подтекст 1</li>
        <li>Подтекст 2</li>
        <li>Поддержка 24/7</li>
      </ul>
      <a href="#" class="btn btn-secondary">Рассчитать доход</a>
    </div>
    <div class="hero-circle">
      <img src="/img/rig.png" alt="Майнинг ферма" />
    </div>
  </div>
</section>

<section>
  <div class="container">
    <prof-calc></prof-calc>
  </div>
</section>

@endsection