@extends('layouts.front')
@section('title', $product->name . ' купить в Уфе - Mining Market')
@section('content')

<div class="container product-page">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="product-image-slider">
                <div class="swiper-wrapper">
                    @foreach($product->gallery as $galleryItem)
                        <div class="swiper-slide" style="background-image: url({{ $galleryItem }})"></div>
                    @endforeach
                </div>
                <div class="product-arrow-prev"></div>
                <div class="product-arrow-next"></div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="block-title">{{ $product->name }}</h1>
            <ul class="product-spec">
                <li>Кол-во видеокарт: <strong>{{ $product->gpu_amount }}</strong></li>
                <li>Доходность (мес): <strong>@php echo number_format($product->dohodnost,0,","," "); @endphp руб.</strong></li>
            </ul>
            <span class="product-price">
                @php
                  echo number_format($product->price,0,","," ");
                @endphp
                руб.
            </span>
            <button onclick="open_modal_1()" class="btn btn-primary">Заказать</button>
        </div>
    </div>
</div>
@include('preim')

@include('kak')

@include('reviews')

@include('about')
@endsection
@section('scripts')
<script>
    var swiper_product = new Swiper('.product-image-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        direction: 'horizontal',
        navigation: {
            nextEl: ".product-arrow-next",
            prevEl: ".product-arrow-prev",
        },
    });
</script>
@endsection