<section id="reviews" class="reviews">
    <div class="container">
      <h5 class="block-title block-title-center">Отзывы</h5>
      <div class="home-reviews-slider">
        <div class="swiper-wrapper">
      @foreach($reviews as $review)
      <div class="swiper-slide">
        <div class="review-item">
          <div class="review-item-photo" style="background-image: url({{ $review->photo }})"></div>
          <div class="review-item-screen" style="background-image: url({{ $review->screenshot }})"></div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
      <button onclick="open_modal_1()" class="btn btn-secondary">Хочу так же</button>
  
      <div class="reviews-arrow-prev"></div>
      <div class="reviews-arrow-next"></div>
    </div>
  </section>