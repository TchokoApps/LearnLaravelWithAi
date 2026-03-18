<!-- Dynamic FAQ Section -->
<section class="lonyo-section-padding6" x-data="faqSection()">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="lonyo-content-thumb" data-aos="fade-up" data-aos-duration="700">
            <img src="assets/images/v1/content-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="lonyo-default-content pl-50" data-aos="fade-up" data-aos-duration="700">
            <h2>It clarifies all strategic financial decisions</h2>
            <p class="data">With this tool, you can say goodbye to overspending, stay on track with your savings goals, and say goodbye to financial worries. Get ready for a clearer view of your finances like never before!</p>
            <div class="lonyo-faq-wrap1 mt-50">
              <template x-for="(faq, index) in faqs" :key="faq.id">
                <div class="lonyo-faq-item" :class="{ 'open': openFaqId === faq.id }"
                     data-aos="fade-up"
                     :data-aos-duration="500 + (index * 200)"
                     @click="toggleFaq(faq.id)"
                     style="cursor: pointer;">
                  <div class="lonyo-faq-header">
                    <h4 x-text="faq.title"></h4>
                    <div class="lonyo-active-icon">
                      <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
                      <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
                    </div>
                  </div>
                  <div class="lonyo-faq-body"
                       x-show="openFaqId === faq.id"
                       x-transition:enter="transition ease-out duration-300"
                       x-transition:enter-start="opacity-0 transform scale-95"
                       x-transition:enter-end="opacity-100 transform scale-100"
                       x-transition:leave="transition ease-in duration-200"
                       x-transition:leave-start="opacity-100 transform scale-100"
                       x-transition:leave-end="opacity-0 transform scale-95">
                    <p x-text="faq.description"></p>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script>
  function faqSection() {
    return {
      faqs: [],
      openFaqId: null,

      async init() {
        try {
          const response = await fetch('/api/faqs');
          this.faqs = await response.json();
          // Open first FAQ by default
          if (this.faqs.length > 0) {
            this.openFaqId = this.faqs[0].id;
          }
        } catch (error) {
          console.error('Error loading FAQs:', error);
        }
      },

      toggleFaq(id) {
        // Toggle: open if closed, close if open
        this.openFaqId = this.openFaqId === id ? null : id;
      }
    }
  }
</script>

<style>
  .lonyo-faq-item {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
  }

  .lonyo-faq-header {
    padding: 15px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .lonyo-active-icon {
    display: flex;
    gap: 10px;
    width: 24px;
    height: 24px;
  }

  .lonyo-faq-item.open .lonyo-faq-header {
    font-weight: 600;
  }

  .lonyo-faq-body {
    padding: 0 0 15px 0;
    overflow: hidden;
  }

  .lonyo-faq-body p {
    margin: 0;
    line-height: 1.6;
    color: #666;
  }
</style>
