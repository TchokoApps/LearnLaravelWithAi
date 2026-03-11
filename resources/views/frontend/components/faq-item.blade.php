<div class="lonyo-faq-item {{ $isOpen ? 'open' : '' }}" data-aos="fade-up" data-aos-duration="{{ $duration ?? '500' }}">
  <div class="lonyo-faq-header">
    <h4>{{ $title }}</h4>
    <div class="lonyo-active-icon">
      <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
      <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
    </div>
  </div>
  <div class="lonyo-faq-body">
    <p>{{ $content }}</p>
  </div>
</div>
