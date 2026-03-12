<div class="lonyo-hero-section light-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 d-flex align-items-center">
        <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">
          @forelse ($heroSections as $hero)
            <h1 class="hero-title">{{ $hero->title }}</h1>
            <p class="text">{{ $hero->description }}</p>
            <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
              <a href="{{ $hero->button_url }}" class="lonyo-default-btn hero-btn">{{ $hero->button_text }}</a>
            </div>
          @empty
            <h1 class="hero-title">Manage your finances more effectively</h1>
            <p class="text">Track your daily finances automatically. Manage your money in a friendly & flexible way, making it easy to spend guilt-free.</p>
            <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
              <a href="sign-up.html" class="lonyo-default-btn hero-btn">Create a free account</a>
            </div>
          @endforelse
        </div>
      </div>
      <div class="col-lg-5">
        <div class="lonyo-hero-thumb" data-aos="fade-left" data-aos-duration="700">
          @forelse ($heroSections as $hero)
            @if ($hero->hero_image && \Storage::disk('public')->exists($hero->hero_image))
              <img src="{{ asset('storage/' . $hero->hero_image) }}" alt="">
            @else
              <img src="{{ asset('frontend/assets/images/v1/hero-thumb.png') }}" alt="">
            @endif
          @empty
            <img src="{{ asset('frontend/assets/images/v1/hero-thumb.png') }}" alt="">
          @endforelse
          <div class="lonyo-hero-shape">
            @forelse ($heroSections as $hero)
              @if ($hero->hero_shape && \Storage::disk('public')->exists($hero->hero_shape))
                <img src="{{ asset('storage/' . $hero->hero_shape) }}" alt="">
              @else
                <img src="{{ asset('frontend/assets/images/shape/hero-shape1.svg') }}" alt="">
              @endif
            @empty
              <img src="{{ asset('frontend/assets/images/shape/hero-shape1.svg') }}" alt="">
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end hero -->
<div class="lonyo-content-shape1">
  <img src="{{ asset('frontend/assets/images/shape/shape1.svg') }}" alt="">
</div>
