<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletWise - Smart Budget Tracking</title>
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
  <style>
    .logo {
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 10px;
        }
  </style>
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-white shadow-md">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo m-2">
      <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
      <a href="#" class="text-2xl font-bold text-gray-800">WalletWise</a>
    </div>
   
    <div class="hidden lg:flex space-x-6">
      <a href="#" class="text-gray-600 hover:text-gray-800">Features</a>
      <a href="#" class="text-gray-600 hover:text-gray-800">Reminders</a>
      <a href="#" class="text-gray-600 hover:text-gray-800">Pricing</a>
      <a href="{{ url('login') }}" class="text-gray-600 hover:text-gray-800">Log In</a>
      <a href="{{ url('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Sign Up</a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white text-center py-20">
  <h1 class="text-5xl font-bold mb-4">Take Control of Your Budget</h1>
  <p class="text-lg mb-6">Track expenses, set reminders, and manage finances with WalletWise</p>
  <a href="#" class="bg-white text-gray-800 px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-gray-100">GET STARTED</a>
  <p class="mt-6 text-sm">Available on <i class="bi bi-apple"></i> <i class="bi bi-android"></i></p>
</div>

<!-- Features Section -->
<div class="bg-gray-100 py-16">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-6">Why Choose WalletWise?</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-2">Expense Tracking</h3>
        <p>Monitor where your money goes with detailed breakdowns.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-2">Smart Reminders</h3>
        <p>Never miss rent, loan payments, or subscriptions.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-2">Multi-Currency Support</h3>
        <p>Manage finances in multiple currencies for international expenses.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-2">Income Reports</h3>
        <p>Generate insightful reports to analyze your spending habits.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-2">Cloud Sync</h3>
        <p>Access your budget from anywhere, anytime.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-bold mb-2">Secure & Private</h3>
        <p>Your financial data is encrypted and protected.</p>
      </div>
    </div>
  </div>
</div>


<!-- How It Works Section -->
<div class="bg-gray-800 text-white py-16">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-6">How It Works</h2>
    <p class="text-lg mb-8">WalletWise helps you plan and track expenses with a simple, intuitive interface.</p>
    <a href="#" class="bg-yellow-500 text-gray-800 px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-yellow-400">LEARN MORE</a>
  </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-6">
  <div class="container mx-auto text-center">
    <p>&copy; 2025 WalletWise. Built for students, small businesses, and professionals.</p>
  </div>
</footer>

</body>
</html>
