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
    }
  </style>
</head>

<body class="bg-[#fdfaf6] font-sans">

  {{-- navbar --}}
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="logo m-2">
        <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
        <a href="#" class="text-2xl font-bold text-elegant">WalletWise</a>
      </div>

      <div class="hidden lg:flex space-x-6">
        <a href="{{ url('/Superadmin/Feature') }}" class="text-gray-600 hover:text-elegant">Features</a>
        <a href="{{ url('/Superadmin/pricing') }}" class="text-gray-600 hover:text-elegant">Pricing</a>
        <a href="{{ url('/Superadmin/contactus') }}" class="text-gray-600 hover:text-elegant">Contact us</a>
        <a href="{{ url('login') }}" class="text-gray-600 hover:text-elegant">Log In</a>
        <a href="{{ url('register')}}" class="text-gray-600 hover:text-elegant">Sign Up</a>
      </div>
    </div>
  </nav>

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
        <ul class="mt-4 space-y-2 text-gray-700">
          <li>&#10003; Expense Tracking</li>
          <li>&#10003; Income Reports</li>
          <li>&#10003; Cloud Sync</li>
        </ul>
        <button class="mt-6 w-full btn-elegant py-2 rounded-lg hover:shadow-lg">Get
          Started</button>
      </div>

      <!-- Premium Plan -->
      <div class="bg-white p-8 rounded-lg shadow-md pricing-card">
        <h2 class="text-2xl font-bold text-elegant">Premium User</h2>
        <p class="text-lg text-gray-600 mt-2">₹499 for 3 months</p>
        <ul class="mt-4 space-y-2 text-gray-700">
          <li>&#10003; All Regular Features</li>
          <li>&#10003; Smart Reminders</li>
          <li>&#10003; Budget Planning</li>
          {{-- <li>&#10003; Priority Support</li> --}}
        </ul>
        <button class="mt-6 w-full btn-elegant py-2 rounded-lg hover:shadow-lg">Go Premium</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer-bg text-white py-6 text-center">
    <p>&copy; 2025 WalletWise. Manage your finances smartly.</p>
  </footer>

</body>

</html>