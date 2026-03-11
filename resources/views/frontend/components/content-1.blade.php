<section class="lonyo-section-padding6">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="lonyo-content-thumb" data-aos="fade-up" data-aos-duration="700">
          <img src="{{ asset('frontend/assets/images/v1/content-thumb.png') }}" alt="">
        </div>
      </div>
      <div class="col-lg-7 d-flex align-items-center">
        <div class="lonyo-default-content pl-50" data-aos="fade-up" data-aos-duration="700">
          <h2>It clarifies all strategic financial decisions</h2>
          <p class="data">With this tool, you can say goodbye to overspending, stay on track with your savings goals, and say goodbye to financial worries. Get ready for a clearer view of your finances like never before!</p>
          <div class="lonyo-faq-wrap1 mt-50">
            @include('frontend.components.faq-item', [
              'title' => 'Real-Time Expense Tracking:',
              'content' => 'Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.',
              'isOpen' => true,
              'duration' => '500'
            ])

            @include('frontend.components.faq-item', [
              'title' => 'Comprehensive Financial Overview:',
              'content' => 'Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.',
              'isOpen' => false,
              'duration' => '700'
            ])

            @include('frontend.components.faq-item', [
              'title' => 'Stress-Reducing Automation:',
              'content' => 'Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.',
              'isOpen' => false,
              'duration' => '900'
            ])
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end content section 1 -->
