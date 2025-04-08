<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletWise - Pricing</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .pricing-card {
      transition: transform 0.3s ease-in-out;
    }

    .pricing-card:hover {
      transform: scale(1.05);
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
    }

    .btn-elegant:hover {
      background-color: #5a3b20;
    }

    .text-elegant {
      color: #6B4226;
    }

    .bg-elegant {
      background-color: #E6C7A5;
    }

    .gradient-header {
      background: linear-gradient(to right, #E6C7A5, #d7b693);
      color: #6B4226;
    }

    .footer-bg {
      background: linear-gradient(to right, #6B4226, #5a3b20);
      z-index: 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .bg-footer {
      background: linear-gradient(to right, #6B4226, #5a3b20);
    }


    .container {
      background: #f5e8db;

    }
  </style>
</head>

<body class="bg-[#fdfaf6] font-sans">

  {{-- navbar --}}
  @include('Superadmin.nav')


  <!-- Pricing Header -->
  <div class="gradient-header text-center py-16">
    <h1 class="text-4xl font-bold mb-4">Choose Your Plan</h1>
    <p class="text-lg">Affordable plans to manage your budget effectively.</p>
  </div>

  <!-- Pricing Section -->
  <div class="container mx-auto px-6 py-12">
    <div class="grid md:grid-cols-2 gap-6">

      <!-- Free Plan -->
      <div class="bg-white p-8 rounded-lg shadow-md pricing-card">
        <h2 class="text-2xl font-bold text-elegant">Regular User</h2>
        <p class="text-lg text-gray-600 mt-2">Free forever</p>
        <p class="mt-2 text-sm text-gray-500">
          Ideal for students or casual users looking to keep track of their day-to-day finances without spending a
          penny.
        </p>
        <ul class="mt-4 space-y-2 text-gray-700">
          <li>&#10003; Track your daily expenses with ease</li>
          <li>&#10003; Generate basic income and expense reports</li>
          <li>&#10003; Sync data securely across devices</li>
        </ul>
        {{-- <button class="mt-6 w-full btn-elegant py-2 rounded-lg hover:shadow-lg">Get Started</button> --}}
      </div>


      <!-- Premium Plan -->
      <div class="bg-white p-8 rounded-lg shadow-md pricing-card">
        <h2 class="text-2xl font-bold text-elegant">Premium User</h2>
        <p class="text-lg text-gray-600 mt-2">₹499 for 3 months</p>
        <p class="mt-2 text-sm text-gray-500">
          Unlock powerful tools and smart features to elevate your financial planning. Designed for users who want more
          control and insights.
        </p>
        <ul class="mt-4 space-y-2 text-gray-700">
          <li>&#10003; All features included in the Regular plan</li>
          <li>&#10003; Set reminders for bills & expenses</li>
          <li>&#10003; Plan budgets and monitor spending limits</li>
          {{-- <li>&#10003; Priority Support from our team</li> --}}
        </ul>
        {{-- <button class="mt-6 w-full btn-elegant py-2 rounded-lg hover:shadow-lg">Go Premium</button> --}}
      </div>

    </div>
  </div>

  <!-- Footer -->
  @include('Superadmin.footer')

</body>

</html>