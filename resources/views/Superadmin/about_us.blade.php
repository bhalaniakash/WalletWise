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
      background: #f5e8db;
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
    .bg-footer {
            background: linear-gradient(to right, #6B4226, #5a3b20);
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
   
        .gradient-bg {
      background: linear-gradient(to right, #E6C7A5, #D4B08A);
    }

    .section-bg {
      background: #f5e8db;
    }
  </style>
</head>

<body class="bg-[#f9f6f2] font-sans">

  <!-- Navbar -->
  @include('Superadmin.nav')


  <!-- Hero Section -->
  <section class="gradient-bg py-20 text-center">
    <div class="container mx-auto px-6">
      <h1 class="text-5xl font-bold mb-4">Who We Are</h1>
      <p class="text-lg max-w-2xl mx-auto">At WalletWise, we believe in empowering individuals to take full control of their finances with simplicity, clarity, and confidence.</p>
    </div>
  </section>

   <!-- Our Mission & Vision -->
   <section class="section-bg py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-6">Our Mission & Vision</h2>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold mb-3">Our Mission</h3>
          <p>To make personal finance management accessible and stress-free for students, professionals, and small businesses across the globe.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold mb-3">Our Vision</h3>
          <p>We envision a world where everyone can track their income, expenses, and financial goals—all in one place, effortlessly and securely.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->

  <section class="gradient-hero py-20 text-elegant text-center">
  
      <h1 class="text-5xl font-bold mb-4">About WalletWise</h1>
      <p class="text-lg max-w-3xl mx-auto">
        WalletWise was born from a hostel room and a common problem—managing daily expenses. Created by a student who
        struggled to track their own spending, WalletWise is now a reliable financial companion for students, small
        business owners, corporate employees, and anyone wanting to take control of their finances.
      </p>
   
  </section>



  
  <!-- Who It's For Section -->
  <section class="gradient-section py-16 text-center">

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
   
  </section>
 <!-- Team Section -->
 <section class="py-16 bg-white text-center">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold mb-8">Meet the Brains Behind WalletWise</h2>
    <div class="flex flex-col md:flex-row items-center " style="justify-content: space-between; margin:2rem">
      <div class="flex flex-col items-center">
        <img src="/img/akash.jpg" alt="Founder" class="w-32 h-32 rounded-full object-cover shadow-lg">
        <div>
          <h3 class="text-xl font-bold">Akash</h3>
          <p class="text-sm text-gray-600">Founder & Developer</p>
          <p class="mt-2 max-w-xl mx-auto">Inspired by hostel life struggles, Akash built WalletWise as a modern tool to empower students and everyday users to manage their finances smartly.</p>
        </div>
      </div>
      <div class="flex flex-col items-center">
        <img src="/img/nishtha.jpg" alt="Co-Founder" class="w-32 h-32 rounded-full object-cover shadow-lg">
        <div>
          <h3 class="text-xl font-bold">nishtha </h3>
          <p class="text-sm text-gray-600">Co-Founder & Strategist</p>
          <p class="mt-2 max-w-xl mx-auto">With a passion for innovation and strategy, nishtha  joined WalletWise to help shape its vision and bring financial clarity to a wider audience.</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ------------------------------------------------------------------------------------------------------------ --}}

 {{-- This is code for single Super Admin --}}

 {{-- <section class="py-16 bg-white text-center">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-bold mb-8">Meet the Brain Behind WalletWise</h2>
    <div class="flex flex-col items-center gap-6">
      <img src="/img/akash.jpg" alt="Founder" class="w-32 h-32 rounded-full object-cover shadow-lg">
      <div>
        <h3 class="text-xl font-bold">Akash</h3>
        <p class="text-sm text-gray-600">Founder & Developer</p>
        <p class="mt-2 max-w-xl mx-auto">Inspired by hostel life struggles, Akash built WalletWise as a modern tool to empower students and everyday users to manage their finances smartly.</p>
      </div>
    </div>
  </div>
</section> --}}

{{-- ------------------------------------------------------------------------------------------------------------ --}}

<!-- Call to Action -->
<section class="gradient-bg py-16 text-center text-elegant">
  <h2 class="text-3xl font-bold">Ready to take control of your money?</h2>
  <p class="mt-4 text-lg">Join WalletWise today and start your journey toward smarter budgeting and spending.</p>
  <a href="/register" class="btn-elegant px-6 py-3 mt-6 inline-block rounded-full font-semibold shadow-md">Join Now</a>
</section>

<!-- Footer -->
<footer class="bg-footer text-white py-6 text-center">
  <p>&copy; 2025 WalletWise. All rights reserved.</p>
</footer>
</body>

</html>