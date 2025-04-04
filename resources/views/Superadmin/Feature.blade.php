<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WalletWise - Features</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .feature-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
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
    
    <!-- Header Section -->
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
      
    <!-- Features Section -->
    <section class="container mx-auto py-16 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white p-6 rounded-lg shadow-lg feature-card text-center">
                <h3 class="text-xl font-bold">Expense Tracking</h3>
                <p class="text-gray-600 mt-2">Monitor your spending with detailed breakdowns and insights.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg feature-card text-center">            
                <h3 class="text-xl font-bold">Smart Reminders</h3>
                <p class="text-gray-600 mt-2">Never miss rent, loans, or subscriptions with auto-reminders.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg feature-card text-center">
                <h3 class="text-xl font-bold">Multi-Currency Support</h3>
                <p class="text-gray-600 mt-2">Manage finances in various currencies effortlessly.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg feature-card text-center">
                <h3 class="text-xl font-bold">Income Reports</h3>
                <p class="text-gray-600 mt-2">Gain valuable insights with monthly & yearly reports.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg feature-card text-center">
                <h3 class="text-xl font-bold">Cloud Sync</h3>
                <p class="text-gray-600 mt-2">Access and manage your budget anytime, anywhere.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg feature-card text-center">
                <h3 class="text-xl font-bold">Secure & Private</h3>
                <p class="text-gray-600 mt-2">Bank-level security ensures your data stays safe.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <div class="bg-blue-600 text-white py-12 text-center">
        <h2 class="text-3xl font-bold">Ready to Take Control of Your Budget?</h2>
        <p class="mt-4 text-lg">Join WalletWise today and start managing your finances better.</p>
        <a href="/register" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold mt-6 inline-block hover:bg-gray-200">Get Started</a>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-6 text-center">
        <p>&copy; 2025 WalletWise. All rights reserved.</p>
    </footer>
</body>
</html>
