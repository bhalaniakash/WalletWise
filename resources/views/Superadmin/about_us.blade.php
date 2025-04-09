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

    .card-gradient {
      background: linear-gradient(to bottom right, #ffffff, #f5e8db);
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
      <h1 class="text-5xl font-extrabold mb-6">Who We Are</h1>
      <p class="text-lg max-w-3xl mx-auto leading-relaxed">
        At WalletWise, we believe that managing money shouldn't be complicated. Born out of real-world challenges faced
        by students and everyday individuals, WalletWise is more than just a budgeting tool—it's a financial partner
        designed to simplify, educate, and empower. We’re a team of passionate developers, designers, and
        problem-solvers committed to transforming how people view and manage their finances.
      </p>
    </div>
  </section>

  <!-- Our Mission & Vision -->
  <section class="section-bg py-16">
    <div class="container mx-auto px-6 text-center">
      <div class="grid md:grid-cols-2 gap-12">
        <div
          class="bg-gradient-to-r from-[#f9f6f2] to-[#e6c7a5] p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <h3 class="text-3xl font-bold mb-4 text-elegant">Our Mission</h3>
          <p class="text-gray-700 leading-relaxed">
            Our mission is simple yet powerful—to make personal finance management accessible, intuitive, and
            stress-free for everyone.
            We aim to break down complex financial concepts and offer a platform that helps users build better money
            habits, avoid overspending, and reach their financial goals with confidence.
            WalletWise is committed to offering insightful analytics, timely reminders, and smart tracking tools that
            put you in control of your money—without the need for a financial degree.
          </p>
        </div>
        <div
          class="bg-gradient-to-r from-[#f9f6f2] to-[#e6c7a5] p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <h3 class="text-3xl font-bold mb-4 text-elegant">Our Vision</h3>
          <p class="text-gray-700 leading-relaxed">
            We envision a future where financial well-being is not a privilege, but a universal standard.
            Our goal is to become a trusted companion for anyone who wants to gain clarity over their finances—whether
            it’s tracking income, controlling expenses, planning savings, or simply becoming more mindful about
            spending.
            Through continuous innovation and user feedback, WalletWise aspires to evolve into a global platform that
            nurtures financial independence, transparency, and growth.
          </p>
        </div>
      </div>
      <div
        class="bg-gradient-to-r from-[#f9f6f2] to-[#e6c7a5] p-8 rounded-lg shadow-lg mt-12 hover:shadow-xl transition-shadow duration-300">
        <p class="text-gray-700 leading-relaxed">
          At WalletWise, we don’t just build tools—we build trust. We’re here to support your financial journey every
          step of the way. Whether you're budgeting for a semester, planning your first investment, or managing a team’s
          expenses, we’re committed to helping you do it with clarity and ease.
        </p>
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
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ms-4">
      <div class="card-gradient p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-2">Students</h3>
        <p>Manage hostel life, daily spending, and stay ahead of bills and rent.</p>
      </div>
      <div class="card-gradient p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-bold mb-2">Small Businesses</h3>
        <p>Track business expenses, analyze income reports, and optimize operations.</p>
      </div>
      <div class="card-gradient p-6 rounded-lg shadow-lg me-4">
        <h3 class="text-xl font-bold mb-2">Working Professionals</h3>
        <p>Stay financially aware with reminders, summaries, and analytics.</p>
      </div>
    </div>

  </section>
  <!-- Team Section -->
  <section class="card-gradient py-16 bg-white text-center">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold mb-8">Meet the Brains Behind WalletWise</h2>
      <div class="flex flex-col md:flex-row items-center " style="justify-content: space-around; margin:2rem">
        <div class="flex flex-col items-center">
          <img src="/img/sir.jpeg" alt="Co-Founder" class="w-32 h-32 rounded-full object-cover shadow-lg">
          <div>
            <h3 class="text-xl font-bold">Pratyush Sharma</h3>
            <p class="text-sm text-gray-600">Project Guide</p>
          </div>
        </div>
        <div class="flex flex-col items-center">
          <img src="/img/akash.jpg" alt="Founder" class="w-32 h-32 rounded-full object-cover shadow-lg">
          <div>
            <h3 class="text-xl font-bold">Akash</h3>
            <p class="text-sm text-gray-600">Laravel Intern at Brainerhub</p>
          </div>
        </div>
        <div class="flex flex-col items-center">
          <img src="/img/nishtha.jpg" alt="Co-Founder" class="w-32 h-32 rounded-full object-cover shadow-lg">
          <div>
            <h3 class="text-xl font-bold">Nishtha</h3>
            <p class="text-sm text-gray-600">Laravel Intern at Brainerhub</p>
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
          <p class="mt-2 max-w-xl mx-auto">Inspired by hostel life struggles, Akash built WalletWise as a modern tool to
            empower students and everyday users to manage their finances smartly.</p>
        </div>
      </div>
    </div>
  </section> --}}

  {{-- ------------------------------------------------------------------------------------------------------------ --}}

  <!-- Call to Action -->
  <section class="gradient-bg py-16 text-center text-elegant">
    <h2 class="text-3xl font-bold">Ready to take control of your money?</h2>
    <p class="mt-4 text-lg">Join WalletWise today and start your journey toward smarter budgeting and spending.</p>
    <a href="/register" class="btn-elegant px-6 py-3 mt-6 inline-block rounded-full font-semibold shadow-md">Join
      Now</a>
  </section>
  <!-- Footer -->
  @include('Superadmin.footer')
</body>

</html>