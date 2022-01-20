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