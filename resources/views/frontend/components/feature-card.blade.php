<div class="col-xl-4 col-lg-6 col-md-6">
  <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="{{ $duration ?? '500' }}">
    <div class="lonyo-service-title">
      <h4>{{ $title }}</h4>
      <img src="{{ asset('frontend/assets/images/v1/' . $image) }}" alt="">
    </div>
    <div class="lonyo-service-data">
      <p>{{ $description }}</p>
    </div>
  </div>
</div>
