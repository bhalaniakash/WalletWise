<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletWise - Super Admin</title>
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      color: #2F1B0C;
    }

    .hero {
      background: linear-gradient(to right, #fbe3c5, #f6d2aa);
    }

    .btn-modern {
      background: linear-gradient(to right, #6B4226, #5a3b20);
      color: white;
      transition: all 0.3s ease-in-out;
    }

    .btn-modern:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    .bg-footer {
            background: linear-gradient(to right, #6B4226, #5a3b20);
        }
    .feature-card {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .section-bg {
      background: #fff6ef;
    }
  </style>
</head>

<body class="bg-[#fffaf7] font-sans">
  <!-- Navbar -->
  @include('Superadmin.nav')

  <!-- Hero -->
  <section class="hero text-center py-20">
    <h1 class="text-5xl font-bold text-[#6B4226] mb-4">Welcome, Super Admin</h1>
    <p class="text-lg text-[#6B4226] mb-6">Your powerful dashboard to manage users, finances, and reports efficiently.</p>
    <a href="{{url('register')}}" class="btn-modern px-6 py-3 rounded-full font-semibold shadow-lg">Get Started</a>
  </section>

  <!-- Features -->
  <section class="section-bg py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-4xl font-bold text-center text-[#6B4226] mb-12">Dashboard Capabilities</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="feature-card p-6 text-center">
          <i class="bi bi-bar-chart text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Analytics & Reports</h3>
          <p class="text-gray-600">View insights on users' financial behaviors and trends.</p>
        </div>
        <div class="feature-card p-6 text-center">
          <i class="bi bi-person-lines-fill text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">User Management</h3>
          <p class="text-gray-600">Control access, verify accounts, and monitor activity.</p>
        </div>
        <div class="feature-card p-6 text-center">
          <i class="bi bi-wallet2 text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Finance Overview</h3>
          <p class="text-gray-600">Get a complete view of incomes, expenses, and reminders.</p>
        </div>
        <div class="feature-card p-6 text-center">
          <i class="bi bi-bell-fill text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Smart Reminders</h3>
          <p class="text-gray-600">Ensure users never miss bill payments or financial goals.</p>
        </div>
        <div class="feature-card p-6 text-center">
          <i class="bi bi-cloud-arrow-up text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Data Sync</h3>
          <p class="text-gray-600">Secure cloud-based storage for user data across devices.</p>
        </div>
        <div class="feature-card p-6 text-center">
          <i class="bi bi-shield-lock text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Privacy & Security</h3>
          <p class="text-gray-600">Bank-level encryption to protect all user information.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-20 text-center bg-gradient-to-r from-[#e6c7a5] to-[#d4b08a]">
    <h2 class="text-4xl font-bold text-[#6B4226] mb-4">Ready to Empower Financial Management?</h2>
    <p class="text-lg text-[#6B4226] mb-6">Monitor everything from one powerful dashboard with WalletWise.</p>
    <a href="#" class="btn-modern px-8 py-3 rounded-full font-semibold shadow-lg">Explore Now</a>
  </section>

  <!-- Footer -->
  <footer class="bg-footer text-white py-6 text-center">
    <p>&copy; 2025 WalletWise. All rights reserved.</p>
</footer>
</body>

</html>