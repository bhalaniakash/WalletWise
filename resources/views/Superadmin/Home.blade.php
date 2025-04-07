<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletWise</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      color: #6B4226;
    }

    .rounded-lg {
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .rounded-lg:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    a:hover {
      text-decoration: none;
      text-shadow: 1px 1px 2px rgba(107, 66, 38, 0.4);
    }

    .btn-elegant {
      background-color: #6B4226;
      color: white;
    }

    .btn-elegant:hover {
      background-color: #5A3821;
    }

    .gradient-hero {
      background: linear-gradient(135deg, #E6C7A5 0%, #D4B08A 100%);
    }

    .gradient-section {
      background: linear-gradient(to right, #f2e4d5, #e6c7a5);
    }

    .gradient-footer {
      background: linear-gradient(to right, #6B4226, #5a3b20);
    }

    .card-gradient {
      background: linear-gradient(to bottom right, #ffffff, #f5e8db);
    }

    .text-elegant {
      color: #6B4226;
    }
  </style>
</head>

<body class="bg-[#f9f6f2] font-sans">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="logo m-2">
        <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
        <a href="" class="text-2xl font-bold text-elegant">WalletWise</a>
      </div>

      <div class="hidden lg:flex space-x-6">
        <a href="{{ url('/Superadmin/Feature') }}" class="text-gray-600 hover:text-elegant">Features</a>
        <a href="{{ url('/Superadmin/pricing') }}" class="text-gray-600 hover:text-elegant">Pricing</a>
        <a href="{{ url('/Superadmin/contactus') }}" class="text-gray-600 hover:text-elegant">Contact us</a>
        <a href="{{ url('login') }}" class="text-gray-600 hover:text-elegant">Log In</a>
        <a href="{{ url('register') }}" class="text-gray-600 hover:text-elegant">Sign Up</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="gradient-hero text-elegant text-center py-20">
    <h1 class="text-5xl font-bold mb-4">Take Control of Your Budget</h1>
    <p class="text-lg mb-6">Track expenses, set reminders, and manage finances with WalletWise</p>
    <a href="#" class="btn-elegant px-6 py-3 rounded-full font-semibold shadow-md">GET STARTED</a>
    <p class="mt-6 text-sm">Available on <i class="bi bi-apple"></i> <i class="bi bi-android"></i></p>
  </div>

  <!-- Features Section -->
  <div class="gradient-section py-16">
    <div class="container text-center">
      <h2 class="text-3xl font-bold mb-6 text-elegant">Why Choose WalletWise?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-5">
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Expense Tracking</h3>
          <p>Monitor where your money goes with detailed breakdowns.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Smart Reminders</h3>
          <p>Never miss rent, loan payments, or subscriptions.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Multi-Currency Support</h3>
          <p>Manage finances in multiple currencies for international expenses.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Income Reports</h3>
          <p>Generate insightful reports to analyze your spending habits.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Cloud Sync</h3>
          <p>Access your budget from anywhere, anytime.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Secure & Private</h3>
          <p>Your financial data is encrypted and protected.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- How It Works Section -->
  <div class="gradient-hero text-elegant py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-6">How It Works</h2>
      <p class="text-lg mb-8">WalletWise helps you plan and track expenses with a simple, intuitive interface.</p>
      <a href="#" class="btn-elegant px-6 py-3 rounded-full font-semibold shadow-md">LEARN MORE</a>
    </div>
  </div>

  <!-- Footer -->
  <footer class="gradient-footer text-white py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2025 WalletWise. Built for students, small businesses, and professionals.</p>
    </div>
  </footer>

</body>

</html>