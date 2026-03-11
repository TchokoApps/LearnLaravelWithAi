<div class="col-xl-4 col-md-6">
  <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="{{ $duration ?? '500' }}">
    <div class="lonyo-process-number">
      <img src="{{ asset('frontend/assets/images/v1/' . $number . '.svg') }}" alt="">
    </div>
    <div class="lonyo-process-title">
      <h4>{{ $title }}</h4>
    </div>
    <div class="lonyo-process-data">
      <p>{{ $description }}</p>
    </div>
  </div>
</div>
