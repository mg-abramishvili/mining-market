@extends('layouts.front')
@section('title', $settings->seo_title)
@section('content')

<section class="hero">
  <div class="container">
    <div class="hero-inner">
      <h1>{{ $hero->title }}</h1>
      @if($hero->list_item_1)
        <ul>
          @if($hero->list_item_1)
            <li>{{ $hero->list_item_1 }}</li>
          @endif
          @if($hero->list_item_2)
            <li>{{ $hero->list_item_2 }}</li>
          @endif
          @if($hero->list_item_3)
            <li>{{ $hero->list_item_3 }}</li>
          @endif
          @if($hero->list_item_4)
            <li>{{ $hero->list_item_4 }}</li>
          @endif
          @if($hero->list_item_5)
            <li>{{ $hero->list_item_5 }}</li>
          @endif
        </ul>
      @endif
      <button onclick="open_modal_1()" class="btn btn-primary">Подобрать ферму</button>
    </div>
    <div class="hero-circle"></div>
  </div>
</section>

<section id="catalog" class="catalog-page bg-white">
  <div class="container">
    <h1 class="block-title">Каталог майнинг-ферм в Уфе</h1>

    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-lg-6">
                <div class="catalog-page-item">
                    <a>
                        @if($product->gallery)
                            <div class="catalog-page-item-image" style="background-image: url({{$product->gallery[0]}})"></div>
                        @else
                            <div class="catalog-page-item-image" style="background-image: url(/img/no-image.jpg)"></div>
                        @endif
                        <div class="catalog-page-item-info">
                            <h3>{{ $product->name }}</h3>
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-7">
                                    <ul>
                                        <li>Кол-во видеокарт: <strong>{{ $product->gpu_amount }}</strong></li>
                                        <li>Доходность (мес): <strong>{{ $product->dohodnost }} руб.</strong></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <span>
                                      @php
                                        echo number_format($product->price,0,","," ");
                                      @endphp
                                      руб.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="catalog-more-button">
      <a href="{{ route('products') }}" class="btn btn-outline-primary">Перейти в каталог</a>
      {{-- <button onclick="open_modal_1()" class="btn btn-outline-secondary">Помощь в выборе</button> --}}
    </div>
  </div>
</section>

<section class="preim">
  <div class="container">
    <h5 class="block-title block-title-white">Преимущества работы с нами</h5>
    <div class="row justify-center">
      @foreach($advantages as $advantage)
        <div class="col preim-item">
          <div class="preim-item-icon" style="background-image: url({{ $advantage->icon }});"></div>
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

<section id="steps" class="steps">
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

    <button onclick="open_modal_1()" class="btn btn-secondary">Хочу так же</button>

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
          {!! $about->text !!}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection