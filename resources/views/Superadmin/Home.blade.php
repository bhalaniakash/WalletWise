<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WalletWise - Super Admin</title>
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Font Awesome 6 CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    <style>body {
      color: #2F1B0C;
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
    }

    .hero {
      background: linear-gradient(to right, #fbe3c5, #f6d2aa);
      padding: 4rem 0;
    }

    .btn-modern {
      background: linear-gradient(to right, #6B4226, #5a3b20);
      color: white;
      transition: all 0.3s ease-in-out;
      padding: 0.75rem 1.5rem;
      border-radius: 50px;
      font-size: 1rem;
    }

    .btn-modern:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .bg-footer {
      background: linear-gradient(to right, #6B4226, #5a3b20);
      color: white;
      padding: 2rem 0;
    }

    .feature-card {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
      padding: 2rem;
      text-align: center;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .feature-card i {
      font-size: 3rem;
      color: #6B4226;
      margin-bottom: 1rem;
    }

    .card-gradient {
      background: linear-gradient(to bottom right, #ffffff, #f5e8db);
    }

    .section-bg {
      background: #fff6ef;
      padding: 4rem 0;
    }

    .section-bg h2 {
      font-size: 2.5rem;
      margin-bottom: 2rem;
      color: #6B4226;
    }

    .section-bg p {
      color: #555;
      margin-bottom: 1.5rem;
    }

    .cta-section {
      background: linear-gradient(to right, #e6c7a5, #d4b08a);
      padding: 4rem 0;
      text-align: center;
    }

    .cta-section h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: #6B4226;
    }

    .cta-section p {
      font-size: 1.125rem;
      color: #6B4226;
      margin-bottom: 2rem;
    }

    .testimonials {
      background: #fceede;
      padding: 4rem 0;
      text-align: center;
    }

    .testimonials h2 {
      font-size: 2.5rem;
      margin-bottom: 2rem;
      color: #6B4226;
    }

    .testimonials .testimonial-card {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      transition: all 0.3s ease-in-out;
    }

    .testimonials .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .testimonials .testimonial-card p {
      font-style: italic;
      color: #555;
      margin-bottom: 1rem;
    }

    .testimonials .testimonial-card h4 {
      font-size: 1.125rem;
      color: #6B4226;
      margin-bottom: 0.5rem;
    }

    .testimonials .testimonial-card span {
      font-size: 0.875rem;
      color: #888;
    }

    /* Add subtle animations */
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

  </style>
</head>

<body class="bg-[#fffaf7] font-sans">
  <!-- Navbar -->
  @include('Superadmin.nav')

  <!-- Hero -->
  <section class="hero text-center py-20">
    <h1 class="text-5xl font-bold text-[#6B4226] mb-4">WalletWise</h1>
    <p class="text-lg text-[#6B4226] mb-6">Your powerful dashboard to manage finances and reports efficiently.
    </p>
    <a href="{{url('register')}}" class="btn-modern px-6 py-3 rounded-full font-semibold shadow-lg">Get Started</a>
  </section>

  <!-- Features -->
  <section class="section-bg py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-4xl font-bold text-center text-[#6B4226] mb-12">Dashboard Capabilities</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="feature-card p-6 text-center card-gradient">
          <i class="bi bi-bar-chart text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Analytics & Reports</h3>
          <p class="text-gray-600">
            Dive deep into personalized financial insights, track spending patterns, and evaluate income vs. expense
            trends effortlessly through visually intuitive charts and reports.
          </p>
        </div>

        <div class="feature-card p-6 text-center card-gradient">
          <i class="fas fa-user-shield text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Privacy First</h3>
          <p class="text-gray-600">
            Your trust is our top priority. We use industry-standard encryption and security practices to safeguard your
            financial data, ensuring your privacy is never compromised.
          </p>
        </div>

        <div class="feature-card p-6 text-center card-gradient">
          <i class="bi bi-wallet2 text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Finance Overview</h3>
          <p class="text-gray-600">
            Gain a complete picture of your financial life in one place. WalletWise lets you monitor income streams,
            track expenses, and stay updated with your reminders and goals.
          </p>
        </div>

        <div class="feature-card p-6 text-center card-gradient">
          <i class="bi bi-bell-fill text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Smart Reminders</h3>
          <p class="text-gray-600">
            Never miss another bill, EMI, or saving goal. Set custom reminders and get timely alerts to stay financially
            organized and stress-free every month.
          </p>
        </div>

        <div class="feature-card p-6 text-center card-gradient">
          <i class="fas fa-bullseye text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Set Budget Goals</h3>
          <p class="text-gray-600">
            Create monthly budgets based on your lifestyle and goals. Get notified when you're close to overspending and
            make smarter financial decisions with ease.
          </p>
        </div>

        <div class="feature-card p-6 text-center card-gradient">
          <i class="fa-solid fa-cloud text-4xl text-[#6B4226] mb-4"></i>
          <h3 class="text-xl font-semibold mb-2">Access Anywhere</h3>
          <p class="text-gray-600">
            Take your financial data wherever you go. With secure cloud syncing, access your WalletWise account
            seamlessly across mobile, tablet, and desktop devices.
          </p>
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

  <!-- Why Choose WalletWise -->
  <section class="section-bg py-20 text-center">
    <div class="container mx-auto px-6">
      <h2 class="text-4xl font-bold text-[#6B4226] mb-8">Why Choose WalletWise?</h2>
      <p class="text-lg max-w-3xl mx-auto text-gray-700 mb-12">
        WalletWise isn’t just another finance tool — it’s a complete ecosystem designed to help users take control of
        their financial lives. Built with simplicity and power in mind, WalletWise provides real-time insights,
        personalized budgeting tools, and automated tracking — all from one secure platform. Here’s what makes us stand
        out:
      </p>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-left max-w-4xl mx-auto">
        <div>
          <h3 class="text-xl font-semibold text-[#6B4226] mb-2">📊 Real-Time Analytics</h3>
          <p class="text-gray-600 mb-4">Stay updated with the latest financial data — instantly. Our analytics engine
            visualizes income, expenses, and savings trends to help users make better decisions.</p>

          <h3 class="text-xl font-semibold text-[#6B4226] mb-2">🔐 Enterprise-Grade Security</h3>
          <p class="text-gray-600 mb-4">We use best-in-class encryption and security protocols to ensure your data is
            safe, private, and never compromised.</p>

          <h3 class="text-xl font-semibold text-[#6B4226] mb-2">📱 Seamless Access</h3>
          <p class="text-gray-600 mb-4">Access your dashboard from mobile, tablet, or desktop — anytime, anywhere.
            WalletWise is fully responsive and cloud-enabled.</p>
        </div>
        <div>
          <h3 class="text-xl font-semibold text-[#6B4226] mb-2">🧠 Smart Suggestions</h3>
          <p class="text-gray-600 mb-4">Our AI-driven suggestions help users cut down unnecessary expenses, manage
            recurring bills, and boost savings.</p>

          <h3 class="text-xl font-semibold text-[#6B4226] mb-2">📅 Financial Planning Tools</h3>
          <p class="text-gray-600 mb-4">From daily budgets to annual goals, WalletWise helps users create achievable
            plans and stick to them with visual progress tracking.</p>

          <h3 class="text-xl font-semibold text-[#6B4226] mb-2">🌍 Multi-User Support</h3>
          <p class="text-gray-600 mb-4">Super Admins can manage multiple users, roles, and permissions with ease, making
            it perfect for institutions, families, and teams.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-20 bg-[#fceede] text-center">
    <div class="container mx-auto px-6">
      <h2 class="text-4xl font-bold text-[#6B4226] mb-10">What Our Users Say</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="italic text-gray-600 mb-4">"WalletWise helped me stay on top of my hostel expenses. Now I always
            know where my money goes!"</p>
          <h4 class="font-bold text-[#6B4226]">Riya Sharma</h4>
          <span class="text-sm text-gray-500">Student, Ahmedabad</span>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="italic text-gray-600 mb-4">"As a small business owner, I needed something simple but powerful.
            WalletWise is just that."</p>
          <h4 class="font-bold text-[#6B4226]">Amit Patel</h4>
          <span class="text-sm text-gray-500">Entrepreneur</span>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <p class="italic text-gray-600 mb-4">"Reminders, analytics, and smooth UI — it’s everything I wanted in a
            financial tool."</p>
          <h4 class="font-bold text-[#6B4226]">Sneha Desai</h4>
          <span class="text-sm text-gray-500">IT Professional</span>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  @include('Superadmin.footer')

</body>

</html>