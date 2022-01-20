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
                <div class="catalog-page-item" style="cursor:pointer;">
                    <a href="{{ route('product', ['id' => $product->id]) }}">
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
                                        <li>Доходность (мес): <strong>@php echo number_format($product->dohodnost,0,","," "); @endphp руб.</strong></li>
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

@include('preim')

<section id="prof-calc" class="prof-calc">
  <div class="container">
    <h5 class="block-title block-title-center">Рассчитайте доход</h5>
    <quiz></quiz>
  </div>
</section>

@include('kak')

@include('reviews')

@include('about')

@endsection