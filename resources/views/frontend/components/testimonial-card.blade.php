<div class="lonyo-t-wrap wrap2 light-bg">
  <div class="lonyo-t-ratting">
    <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
  </div>
  <div class="lonyo-t-text">
    <p>"{{ $text }}"</p>
  </div>
  <div class="lonyo-t-author">
    <div class="lonyo-t-author-thumb">
      @if ($image && \Storage::disk('public')->exists($image))
        {{-- New uploaded images --}}
        <img src="{{ asset('storage/' . $image) }}" alt="{{ $name }}">
      @elseif ($image && file_exists(public_path('frontend/assets/images/v1/' . $image)))
        {{-- Old images from assets folder --}}
        <img src="{{ asset('frontend/assets/images/v1/' . $image) }}" alt="{{ $name }}">
      @else
        {{-- No image fallback --}}
        <div style="height: 60px; width: 60px; background: #f0f0f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
          <span style="color: #999; font-size: 12px;">No Image</span>
        </div>
      @endif
    </div>
    <div class="lonyo-t-author-data">
      <p>{{ $name }}</p>
      <span>{{ $title }}</span>
    </div>
  </div>
</div>
