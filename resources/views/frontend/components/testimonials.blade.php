<div class="lonyo-section-padding position-relative overflow-hidden">
  <div class="container">
    <div class="lonyo-section-title">
      <div class="row">
        <div class="col-xl-8 col-lg-8">
          <h2>Don't take our word for it, check user reviews</h2>
        </div>
        <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
          <div class="lonyo-title-btn">
            <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="lonyo-testimonial-slider-init">
    @php
      $testimonials = \App\Models\Testimonial::all();
    @endphp

    @forelse($testimonials as $testimonial)
      @include('frontend.components.testimonial-card', [
        'text' => $testimonial->text,
        'image' => $testimonial->image,
        'name' => $testimonial->name,
        'title' => $testimonial->title
      ])
    @empty
      <div class="alert alert-info">No testimonials available at this time.</div>
    @endforelse
  </div>
  <div class="lonyo-t-overlay2">
    <img src="{{ asset('frontend/assets/images/v2/overlay.png') }}" alt="">
  </div>
</div>
<!-- end testimonials section -->
