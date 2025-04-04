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
  </style>
</head>
<body class="bg-gray-100 font-sans">

    {{-- navbar --}}

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
          <div class="logo m-2">
            <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
            <a href="#" class="text-2xl font-bold text-gray-800">WalletWise</a>
          </div>
         
          <div class="hidden lg:flex space-x-6">
            <a href="{{ url('/Superadmin/Feature') }}" class="text-gray-600 hover:text-gray-800">Features</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Reminders</a>
            <a href="#" class="text-gray-600 hover:text-gray-800">Pricing</a>
            <a href="{{ url('login') }}" class="text-gray-600 hover:text-gray-800">Log In</a>
            <a href="{{ url('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Sign Up</a>
          </div>
        </div>
      </nav>

<!-- Pricing Header -->
<div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white text-center py-16">
  <h1 class="text-4xl font-bold mb-4">Choose Your Plan</h1>
  <p class="text-lg">Affordable plans to manage your budget effectively.</p>
</div>

<!-- Pricing Section -->
<div class="container mx-auto px-6 py-12">
  <div class="grid md:grid-cols-2 gap-6">
    
    <!-- Free Plan -->
    <div class="bg-white p-8 rounded-lg shadow-md pricing-card">
      <h2 class="text-2xl font-bold text-gray-800">Regular User</h2>
      <p class="text-lg text-gray-600 mt-2">Free forever</p>
      <ul class="mt-4 space-y-2">
        <li>&#10003; Expense Tracking</li>
        <li>&#10003; Income Reports</li>
        <li>&#10003; Cloud Sync</li>
      </ul>
      <button class="mt-6 w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-700">Get Started</button>
    </div>
    
    <!-- Premium Plan -->
    <div class="bg-white p-8 rounded-lg shadow-md border-2 border-blue-500 pricing-card">
      <h2 class="text-2xl font-bold text-blue-600">Premium User</h2>
      <p class="text-lg text-gray-600 mt-2">₹499 for 3 months</p>
      <ul class="mt-4 space-y-2">
        <li>&#10003; All Regular Features</li>
        <li>&#10003; Smart Reminders</li>
        <li>&#10003; Budget Planning</li>
        <li>&#10003; Priority Support</li>
      </ul>
      <button class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-500">Go Premium</button>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-6 text-center">
  <p>&copy; 2025 WalletWise. Manage your finances smartly.</p>
</footer>

</body>
</html>
