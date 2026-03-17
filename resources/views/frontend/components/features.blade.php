<div class="lonyo-section-padding2 position-relative">
  <div class="container">
    <div class="lonyo-section-title center">
      <h2>{{ $featureSections->first()?->section_title ?? 'Features that make spending smarter' }}</h2>
    </div>
    <div class="row">
      @forelse($featureSections as $index => $feature)
        @include('frontend.components.feature-card', [
          'title' => $feature->feature_title,
          'image' => $feature->feature_icon,
          'description' => $feature->feature_description,
          'duration' => (int)(($feature->display_order % 4) + 1) * 200
        ])
      @empty
        <div class="col-12 text-center">
          <p class="text-muted">No features available at the moment.</p>
        </div>
      @endforelse
    </div>
  </div>
  <div class="lonyo-feature-shape"></div>
</div>
<!-- end features section -->
