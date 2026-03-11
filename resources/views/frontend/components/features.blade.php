<div class="lonyo-section-padding2 position-relative">
  <div class="container">
    <div class="lonyo-section-title center">
      <h2>Features that make spending smarter</h2>
    </div>
    <div class="row">
      @include('frontend.components.feature-card', [
        'title' => 'Expense Tracking',
        'image' => 'feature1.svg',
        'description' => 'Allows users to record and categorize daily transactions such as income, expenses, bills, and savings.',
        'duration' => '500'
      ])

      @include('frontend.components.feature-card', [
        'title' => 'Budgeting Tools',
        'image' => 'feature2.svg',
        'description' => 'Provides visual insights like graphs or pie charts to show how much is spent versus the budgeted amount.',
        'duration' => '700'
      ])

      @include('frontend.components.feature-card', [
        'title' => 'Investment Tracking',
        'image' => 'feature3.svg',
        'description' => 'For users interested in investing, finance apps often provide tools to track stocks, bonds or mutual funds.',
        'duration' => '900'
      ])

      @include('frontend.components.feature-card', [
        'title' => 'Tax Management',
        'image' => 'feature4.svg',
        'description' => 'This tool integrate with tax software to help users prepare for tax season, deduct expenses, and file returns.',
        'duration' => '500'
      ])

      @include('frontend.components.feature-card', [
        'title' => 'Bill Management',
        'image' => 'feature5.svg',
        'description' => 'Tracks upcoming bills, sets reminders for due dates, and enables easy payments via integration with online banking',
        'duration' => '700'
      ])

      @include('frontend.components.feature-card', [
        'title' => 'Security Features',
        'image' => 'feature6.svg',
        'description' => 'Provides bank-level encryption to ensure user data and financial information remain safe, MFA and biometric logins.',
        'duration' => '900'
      ])
    </div>
  </div>
  <div class="lonyo-feature-shape"></div>
</div>
<!-- end features section -->
