<div class="lonyo-section-padding2 position-relative">
  <div class="container">
    @php
      $sectionTitle = $sections->first()?->section_title ?? 'Features that make spending smarter';
    @endphp

    <div class="lonyo-section-title center">
      <h2>{{ $sectionTitle }}</h2>
    </div>

    <div class="row">
      @forelse($sections as $section)
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="{{ ($loop->index * 200) + 500 }}">
            <div class="lonyo-service-title">
              <h4>{{ $section->feature_title }}</h4>
              @if($section->feature_icon)
                <img src="{{ asset('frontend/assets/images/v1/' . $section->feature_icon) }}" alt="{{ $section->feature_title }}">
              @endif
            </div>
            <div class="lonyo-service-data">
              <p>{{ $section->feature_description }}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p class="text-muted">No features available at the moment.</p>
        </div>
      @endforelse
    </div>
  </div>
  <div class="lonyo-feature-shape"></div>
</div>
<!-- end smart financial section -->
