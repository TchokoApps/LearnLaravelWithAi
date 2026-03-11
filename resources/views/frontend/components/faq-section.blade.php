<div class="lonyo-section-padding4">
  <div class="container">
    <div class="lonyo-section-title center">
      <h2>Find answers to all questions below</h2>
    </div>
    <div class="lonyo-faq-shape"></div>
    <div class="lonyo-faq-wrap1">
      @include('frontend.components.faq-item', [
        'title' => 'Is my financial data safe and secure?',
        'content' => 'Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.',
        'isOpen' => true,
        'duration' => '500'
      ])

      @include('frontend.components.faq-item', [
        'title' => 'Can I link multiple bank accounts and credit cards?',
        'content' => 'Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.',
        'isOpen' => false,
        'duration' => '700'
      ])

      @include('frontend.components.faq-item', [
        'title' => 'How does the app help me stick to my budget?',
        'content' => 'Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.',
        'isOpen' => false,
        'duration' => '900'
      ])

      @include('frontend.components.faq-item', [
        'title' => 'Can I track my investments with the app?',
        'content' => 'Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.',
        'isOpen' => false,
        'duration' => '1100'
      ])

      @include('frontend.components.faq-item', [
        'title' => 'Is the app free, or are there subscription fees?',
        'content' => 'Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.',
        'isOpen' => false,
        'duration' => '1300'
      ])
    </div>
    <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
      <a class="lonyo-default-btn faq-btn2" href="faq.html">Can't find your answer</a>
    </div>
  </div>
</div>
<div class="lonyo-content-shape3">
  <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
</div>
<!-- end faq section -->
