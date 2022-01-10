@extends('layouts.front')
@section('title', 'Каталог майнинг-ферм в Уфе - Mining Market')
@section('content')

<div class="container catalog-page">
    <h1 class="block-title">Каталог майнинг-ферм в Уфе</h1>

    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-lg-6">
                <div class="catalog-page-item">
                    <a href="#">
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
</div>

@endsection