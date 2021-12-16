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
      <div class="col col-step">
        <div class="step-item">
          <span>1</span>
          <p>
            <strong>Заявка</strong>
            Вы оставляете заявку, мы подбираем оборудование под ваш бюджет.
          </p>
        </div>
      </div>
      <div class="col col-step">
        <div class="step-item">
          <span>2</span>
          <p>
            <strong>Договор</strong>
            Подписываем договор, вы производите оплату.
          </p>
        </div>
      </div>
      <div class="col col-step">
        <div class="step-item">
          <span>3</span>
          <p>
            <strong>Сборка фермы</strong>
            Сборка вашей майнинг-фермы в течение 5-7 дней.
          </p>
        </div>
      </div>
      <div class="col col-step">
        <div class="step-item">
          <span>4</span>
          <p>
            <strong>Доставка и обучение</strong>
            Доставляем вам готовую ферму, обучаем как пользоваться.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container">
  <div class="reviews">
    <h5 class="block-title block-title-center">Отзывы</h5>
    <div class="review-item">
      <div class="review-item-photo" style="background-image: url(https://static.nicehash.com/marketing%2FImage%20from%20iOS%20%282%29.jpg)"></div>
      <div class="review-item-screen" style="background-image: url(https://iriska-show.ru/images/photo-otzivi/006.JPG)"></div>
    </div>
    <button class="btn btn-secondary">Хочу так же</button>

    <div class="arrow-prev"></div>
    <div class="arrow-next"></div>
  </div>
</section>

<section class="contact">
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
          <img src="/img/logo2.svg" alt="Майнинг Маркет" />
          <p>Компания начала свой путь в мае 2017 года и быстро стала лидером рынка по продаже видеокарт и майнинг-ферм.</p>
          <p>Мы профессионально консультируем наших клиентов - инвесторов в какое оборудование лучше инвестировать и преумножать свой капитал.</p>
          <p>Наша миссия - создать пассивный доход 100 000 клиентам  в СНГ и стать компанией номер один в мире по продаже майнинг-оборудования!</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection