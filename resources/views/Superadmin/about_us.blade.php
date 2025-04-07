<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - WalletWise</title>
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

    .text-elegant {
      color: #6B4226;
    }
  </style>
</head>

<body class="bg-[#f9f6f2] font-sans">

  <!-- Navbar -->
  @include('Superadmin.nav')

  <!-- About Section -->

<section class="gradient-hero py-20 text-white">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-5xl font-bold mb-4">About WalletWise</h1>
      <p class="text-lg max-w-3xl mx-auto">
        WalletWise was born from a hostel room and a common problem—managing daily expenses. Created by a student who
        struggled to track their own spending, WalletWise is now a reliable financial companion for students, small
        business owners, corporate employees, and anyone wanting to take control of their finances.
      </p>
    </div>
  </section>

  <!-- Mission Section -->
  <section class="gradient-section py-16">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold mb-6 text-elegant">Our Mission</h2>
      <p class="max-w-3xl mx-auto text-lg">
        Our mission is to make personal finance simple, smart, and accessible. Whether you're budgeting monthly
        expenses, monitoring income, or setting reminders for rent and loan payments—WalletWise ensures your financial
        well-being is always in check.
      </p>
    </div>
  </section>

  <!-- Who It's For Section -->
  <section class="py-16">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold mb-6 text-elegant">Who Is It For?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Students</h3>
          <p>Manage hostel life, daily spending, and stay ahead of bills and rent.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Small Businesses</h3>
          <p>Track business expenses, analyze income reports, and optimize operations.</p>
        </div>
        <div class="card-gradient p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-bold mb-2">Working Professionals</h3>
          <p>Stay financially aware with reminders, summaries, and analytics.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="gradient-footer text-white py-6">
    <div class="container mx-auto text-center">
      <p>&copy; 2025 WalletWise. Developed with guidance from Pratyush Sharma  and supported by 
        <a href="https://www.brainerhub.com/"> <u>BrainerHub Solution.</u></a></p>
    </div>
  </footer>

</body>

</html>
