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