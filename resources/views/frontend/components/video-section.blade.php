<div class="lonyo-section-padding bg-heading position-relative sectionn">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="lonyo-video-thumb">
          <img src="{{ asset('frontend/assets/images/v1/video-thumb.png') }}" alt="">
          <a class="play-btn video-init" href="https://www.youtube.com/watch?v=fgZc7mAYIY8">
            <img src="{{ asset('frontend/assets/images/v1/play-icon.svg') }}" alt="">
            <div class="waves wave-1"></div>
            <div class="waves wave-2"></div>
            <div class="waves wave-3"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-7 d-flex align-items-center">
        <div class="lonyo-default-content lonyo-video-section pl-50" data-aos="fade-up" data-aos-duration="500">
          <h2>Its usability is simple and intuitive for users</h2>
          <p>It's a cloud-based accounting tool ideal for individuals & businesses to easily manage finances, invoices & payroll. Unlock the 3-step path to enhanced financial control. </p>
          <div class="mt-50" data-aos="fade-up" data-aos-duration="700">
            <a class="lonyo-default-btn video-btn" href="contact-us.html">Download the app</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      @include('frontend.components.process-card', [
        'number' => 'n1',
        'title' => 'Connect Your Accounts',
        'description' => 'Link your bank, credit card or investment accounts to automatically track transactions and get a complete financial overview',
        'duration' => '500'
      ])

      @include('frontend.components.process-card', [
        'number' => 'n2',
        'title' => 'Set Budgets & Goals',
        'description' => 'Define your spending limits and savings goals for categories like groceries, bills or future investments to stay on track.',
        'duration' => '700'
      ])

      @include('frontend.components.process-card', [
        'number' => 'n3',
        'title' => 'Monitor & Automate',
        'description' => 'Check your financial dashboard for regular updates and set up automatic payments or savings to simplify management.',
        'duration' => '900'
      ])

      <div class="border-bottom" data-aos="fade-up" data-aos-duration="500"></div>
    </div>
  </div>
</div>
<div class="lonyo-content-shape1">
  <img src="{{ asset('frontend/assets/images/shape/shape3.svg') }}" alt="">
</div>
<!-- end video section -->
