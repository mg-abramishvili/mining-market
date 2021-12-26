@extends('layouts.front')
@section('content')

<section class="hero">
  <div class="container">
    <div class="hero-inner">
      <h1>{{ $settings->main_title }}</h1>
      <ul>
        <li>{{ $settings->main_list_1 }}</li>
        <li>{{ $settings->main_list_2 }}</li>
        <li>{{ $settings->main_list_3 }}</li>
      </ul>
      <a href="#prof-calc" class="btn btn-secondary">Рассчитать доход</a>
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
      @foreach($advantages as $advantage)
        <div class="col preim-item">
          <div class="preim-item-icon" style="background-image: url(/img/preim1.svg);"></div>
          <p>{{ $advantage->text }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section id="prof-calc" class="prof-calc">
  <div class="container">
    <h5 class="block-title block-title-center">Рассчитайте доход</h5>
    <quiz></quiz>
  </div>
</section>

<section class="container">
  <div class="catalog">
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
      <a href="#" class="btn btn-outline-secondary">Помощь в выборе</a>
    </div>
  </div>
</section>

<section class="steps">
  <div class="container">
    <h5 class="block-title block-title-center">Как мы работаем</h5>
    <div class="row row-steps">
      @foreach($schemes as $scheme)
      <div class="col col-step">
        <div class="step-item">
          <span>{{ $scheme->id }}</span>
          <p>
            <strong>{{ $scheme->name }}</strong>
            {{ $scheme->text }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="reviews" class="container">
  <div class="reviews">
    <h5 class="block-title block-title-center">Отзывы</h5>
    @foreach($reviews as $review)
      <div class="review-item">
        <div class="review-item-photo" style="background-image: url({{ $review->photo }})"></div>
        <div class="review-item-screen" style="background-image: url({{ $review->screenshot }})"></div>
      </div>
    @endforeach

    <button class="btn btn-secondary">Хочу так же</button>

    <div class="arrow-prev"></div>
    <div class="arrow-next"></div>
  </div>
</section>

<section id="contact" class="contact">
  <div class="container">
    <h5 class="block-title block-title-center">Есть вопрос?</h5>
    <div class="row align-items-center">
      <div class="col-12 col-lg-6">
        <div class="contact-form">
          <div class="mb-4">
            <label class="form-label">Имя</label>
            <input type="text" class="form-control" placeholder="Алексей">
          </div>
          <div class="mb-4">
            <label class="form-label">Телефон</label>
            <input type="text" class="form-control" placeholder="+7 (999) 123-45-67">
          </div>
          <div class="mb-4">
            <label class="form-label">Сообщение</label>
            <textarea rows="7" class="form-control"></textarea>
          </div>
          <div class="text-center">
            <button class="btn btn-primary">Отправить</button>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="contact-info">
          <img src="{{ $settings->logo_2 }}" alt="Майнинг Маркет" />
          {!! $settings->about_text !!}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection