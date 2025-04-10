<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletWise - Pricing</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f5f0;
    }

    .pricing-card {
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px -5px rgba(107, 66, 38, 0.1);
    }

    .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px -5px rgba(107, 66, 38, 0.2);
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .btn-elegant {
      background-color: #6B4226;
      color: white;
      transition: all 0.3s ease;
      letter-spacing: 0.5px;
    }

    .btn-elegant:hover {
      background-color: #5a3b20;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(107, 66, 38, 0.3);
    }

    .text-elegant {
      color: #6B4226;
    }

    .bg-elegant {
      background-color: #E6C7A5;
    }

    .gradient-header {
      background: linear-gradient(135deg, #E6C7A5 0%, #d7b693 100%);
      color: #6B4226;
      position: relative;
      overflow: hidden;
    }

    .gradient-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236b4226' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
      opacity: 0.3;
    }

    .footer-bg {
      background: linear-gradient(135deg, #6B4226 0%, #5a3b20 100%);
      z-index: 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .bg-footer {
      background: linear-gradient(135deg, #6B4226 0%, #5a3b20 100%);
    }

    .card-gradient {
      background: linear-gradient(135deg, #ffffff 0%, #f5e8db 100%);
      border: 1px solid rgba(107, 66, 38, 0.1);
    }

    .price-tag {
      font-size: 2.5rem;
      font-weight: 700;
      position: relative;
      display: inline-block;
    }

    .price-tag::before {
      content: '₹';
      font-size: 1.5rem;
      position: absolute;
      left: -1rem;
      top: 0.5rem;
    }

    .feature-list li {
      position: relative;
      padding-left: 1.75rem;
      margin-bottom: 0.75rem;
    }

    .feature-list li::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0.5rem;
      width: 1rem;
      height: 1rem;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%236B4226'%3E%3Cpath d='M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
    }

    .highlight-badge {
      position: absolute;
      /* top: 1rem; */
      right: 1.5rem;
      background: #6B4226;
      color: white;
      padding: 0.25rem 1.5rem;
      border-radius: 9999px;
      font-size: 0.875rem;
      font-weight: 600;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      transform: rotate(5deg);
    }

    .pricing-section {
      position: relative;
    }

    .pricing-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 100px;
      background: linear-gradient(to bottom, #f9f5f0, rgba(249, 245, 240, 0));
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding:1.5rem;
    }

    @media (min-width: 1024px) {
      .pricing-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 2rem;
      }
    }
  </style>
</head>

<body class="font-sans">

  {{-- navbar --}}
  @include('Superadmin.nav')

  <!-- Pricing Header -->
  <section class="gradient-header text-center py-20 md:py-24 animate__animated animate__fadeIn">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Choose Your Perfect Plan</h1>
      <p class="text-lg md:text-xl max-w-2xl mx-auto">Simple, transparent pricing to help you take control of your finances.</p>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="pricing-section pb-24">
    <div class="container ">
      <div class="pricing-grid grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

        <!-- Free Plan -->
        <div class="pricing-card relative card-gradient bg-white p-8 rounded-lg">
          <div class="flex flex-col h-full">
            <div class="mb-6">
              <h2 class="text-2xl font-bold text-elegant">Regular User</h2>
              <p class="text-gray-600 mt-2">Perfect for getting started</p>
            </div>
            
            <div class="mb-6">
              <div class="price-tag text-elegant">0</div>
              <p class="text-gray-500 mt-1">forever</p>
            </div>
            
            <p class="text-gray-600 mb-6">
              Ideal for students or casual users looking to keep track of their day-to-day finances without spending a penny.
            </p>
            
            <ul class="feature-list flex-grow space-y-3 text-gray-700">
              <li>Track your daily expenses with ease</li>
              <li>Generate basic income and expense reports</li>
              <li>Sync data securely across devices</li>
              <li>Basic budgeting tools</li>
            </ul>
            
            <div class="mt-8">
              <button class="btn-elegant w-full py-3 rounded-lg font-medium">
                Get Started for Free
              </button>
            </div>
          </div>
        </div>

        <!-- Premium Plan -->
        <div class="pricing-card relative card-gradient bg-white p-8 rounded-lg border-2 border-elegant transform scale-[1.02]">
          <div class="highlight-badge animate__animated animate__pulse animate__infinite">
            Popular
          </div>
          <div class="flex flex-col h-full">
            <div class="mb-6">
              <h2 class="text-2xl font-bold text-elegant">Premium User</h2>
              <p class="text-gray-600 mt-2">For serious financial management</p>
            </div>
            
            <div class="mb-6">
              <div class="price-tag text-elegant">499</div>
              <p class="text-gray-500 mt-1">for 3 months</p>
            </div>
            
            <p class="text-gray-600 mb-6">
              Unlock powerful tools and smart features to elevate your financial planning with advanced insights.
            </p>
            
            <ul class="feature-list flex-grow space-y-3 text-gray-700">
              <li>All Regular User features included</li>
              <li>Set reminders for bills & expenses</li>
              <li>Advanced budget planning tools</li>
              <li>Spending analytics & reports</li>
              <li>Export data to CSV/Excel</li>
            </ul>
            
            <div class="mt-8">
              <button class="btn-elegant w-full py-3 rounded-lg font-medium">
                Upgrade to Premium
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Comparison -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center text-elegant mb-12">Plan Comparison</h2>
      
      <div class="overflow-x-auto">
        <table class="w-full max-w-4xl mx-auto">
          <thead>
            <tr class="border-b-2 border-elegant">
              <th class="text-left pb-4 font-semibold text-elegant">Features</th>
              <th class="text-center pb-4 font-semibold text-elegant">Regular</th>
              <th class="text-center pb-4 font-semibold text-elegant">Premium</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b border-gray-200">
              <td class="py-4">Expense Tracking</td>
              <td class="text-center py-4">✓</td>
              <td class="text-center py-4">✓</td>
            </tr>
            <tr class="border-b border-gray-200">
              <td class="py-4">Basic Reports</td>
              <td class="text-center py-4">✓</td>
              <td class="text-center py-4">✓</td>
            </tr>
            <tr class="border-b border-gray-200">
              <td class="py-4">Cross-device Sync</td>
              <td class="text-center py-4">✓</td>
              <td class="text-center py-4">✓</td>
            </tr>
            <tr class="border-b border-gray-200">
              <td class="py-4">Bill Reminders</td>
              <td class="text-center py-4">-</td>
              <td class="text-center py-4">✓</td>
            </tr>
            <tr class="border-b border-gray-200">
              <td class="py-4">Advanced Budgeting</td>
              <td class="text-center py-4">-</td>
              <td class="text-center py-4">✓</td>
            </tr>
            <tr class="border-b border-gray-200">
              <td class="py-4">Data Export</td>
              <td class="text-center py-4">✓</td>
              <td class="text-center py-4">✓</td>
            </tr>
            <tr>
              <td class="py-4">Spending Analytics</td>
              <td class="text-center py-4">✓</td>
              <td class="text-center py-4">✓</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
{{-- 
  <!-- FAQ Section -->
  <section class="py-16 bg-[#f9f5f0]">
    <div class="container mx-auto px-4 max-w-4xl">
      <h2 class="text-3xl font-bold text-center text-elegant mb-12">Frequently Asked Questions</h2>
      
      <div class="space-y-6">
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="font-semibold text-lg text-elegant">Can I switch plans later?</h3>
          <p class="mt-2 text-gray-600">Yes, you can upgrade or downgrade your plan at any time from your account settings.</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="font-semibold text-lg text-elegant">Is there a free trial for Premium?</h3>
          <p class="mt-2 text-gray-600">We offer a 7-day free trial for the Premium plan so you can test all features before committing.</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="font-semibold text-lg text-elegant">What payment methods do you accept?</h3>
          <p class="mt-2 text-gray-600">We accept all major credit/debit cards, UPI, and net banking payments.</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="font-semibold text-lg text-elegant">Can I cancel anytime?</h3>
          <p class="mt-2 text-gray-600">Absolutely. You can cancel your Premium subscription anytime, and you'll retain access until the end of your billing period.</p>
        </div>
      </div>
    </div>
  </section> --}}



  <!-- Footer -->
  @include('Superadmin.footer')

  <script>
    // Simple animation trigger
    document.addEventListener('DOMContentLoaded', function() {
      const pricingCards = document.querySelectorAll('.pricing-card');
      
      pricingCards.forEach((card, index) => {
        setTimeout(() => {
          card.classList.add('animate__animated', 'animate__fadeInUp');
        }, index * 200);
      });
    });
  </script>
</body>

</html>