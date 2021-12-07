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

<section class="preim">
  <div class="container">
    <h5 class="block-title block-title-center">С нами надежно и выгодно</h5>
    <div class="row justify-center">
      <div class="col preim-item">
        <div class="preim-item-icon" style="background-image: url(/img/preim1.svg);"></div>
        <p>Больше 500 <br>довольных клиентов</p>
      </div>
      <div class="col preim-item">
        <div class="preim-item-icon" style="background-image: url(/img/preim1.svg);"></div>
        <p>Больше 500 <br>довольных клиентов</p>
      </div>
      <div class="col preim-item">
        <div class="preim-item-icon" style="background-image: url(/img/preim1.svg);"></div>
        <p>Больше 500 <br>довольных клиентов</p>
      </div>
    </div>
  </div>
</section>

<section class="prof-calc">
  <div class="container">
    <h5 class="block-title block-title-center">Рассчитайте доход</h5>
    <prof-calc></prof-calc>
    <div class="prof-calc-more-button">
      <a href="#" class="btn btn-primary">Оставить заявку</a>
    </div>
  </div>
</section>

<section class="catalog">
  <div class="container">
    <h5 class="block-title block-title-center">Популярные майнинг-фермы</h5>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="catalog-item">
          <a href="#">
            <div class="catalog-item-image-wrapper">
              <div class="catalog-item-image" style="background-image: url(/img/rig0.png)"></div>
            </div>
            <span>от 190 000 ₽</span>
            <p>Название фермы 1</p>
          </a>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="catalog-item">
          <a href="#">
            <div class="catalog-item-image-wrapper">
              <div class="catalog-item-image" style="background-image: url(/img/rig0.png)"></div>
            </div>
            <span>от 190 000 ₽</span>
            <p>Название фермы 2</p>
          </a>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="catalog-item">
          <a href="#">
            <div class="catalog-item-image-wrapper">
              <div class="catalog-item-image" style="background-image: url(/img/rig0.png)"></div>
            </div>
            <span>от 190 000 ₽</span>
            <p>Название фермы 3</p>
          </a>
        </div>
      </div>
    </div>
    <div class="catalog-more-button">
      <a href="#" class="btn btn-secondary">Перейти в каталог</a>
    </div>
  </div>
</section>

@endsection