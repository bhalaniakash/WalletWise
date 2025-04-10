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
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f9f5f0',
              100: '#f0e6d9',
              200: '#e0ccb3',
              300: '#c8a880',
              400: '#b3895a',
              500: '#9d7246',
              600: '#7f5a3a',
              700: '#6B4226',
              800: '#553520',
              900: '#482d1d',
            },
            secondary: {
              50: '#fff9f5',
              100: '#fff1e6',
              200: '#ffe0c7',
              300: '#ffc99a',
              400: '#ffa762',
              500: '#ff8433',
              600: '#ff6b1a',
              700: '#cc4f0d',
              800: '#a33f0f',
              900: '#833613',
            },
          },
          fontFamily: {
            sans: ['Poppins', 'sans-serif'],
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'fade-in': 'fadeIn 1s ease-in-out',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-20px)' },
            },
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            }
          }
        }
      }
    }
  </script>
  <style>
    .gradient-text {
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      background-image: linear-gradient(to right, #9d7246, #6B4226);
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 24px;
      margin: 0 auto 1.5rem;
      background: linear-gradient(135deg, rgba(234, 214, 191, 0.5) 0%, rgba(234, 214, 191, 0.2) 100%);
      box-shadow: 0 8px 32px rgba(107, 66, 38, 0.1);
    }

    .testimonial-card::before {
      content: "" ";
 position: absolute;
      top: 20px;
      left: 20px;
      font-size: 60px;
      color: rgba(107, 66, 38, 0.1);
      font-family: serif;
      line-height: 1;
    }

    .hover-scale {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-scale:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .section-divider {
      height: 80px;
      width: 100%;
      background: linear-gradient(to right bottom, #f9f5f0 49%, #fffaf7 50%);
    }

    .reverse-section-divider {
      height: 80px;
      width: 100%;
      background: linear-gradient(to right bottom, #fffaf7 49%, #f9f5f0 50%);
    }

    .animate-delay-1 {
      animation-delay: 0.2s;
    }

    .animate-delay-2 {
      animation-delay: 0.4s;
    }

    .animate-delay-3 {
      animation-delay: 0.6s;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-15px);
      }
    }

    .floating {
      animation: float 6s ease-in-out infinite;
    }
  </style>
</head>

<body class="bg-gradient-to-b from-primary-50 to-white font-sans">
  <!-- Navbar -->
  @include('Superadmin.nav')

  <!-- Hero Section -->
  <section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary-100 to-primary-200 opacity-20"></div>
    <div class="container mx-auto px-6 py-32 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-5xl md:text-6xl font-bold mb-6">
          <<<<<<< HEAD <span class="gradient-text">WalletWise</span>
            =======
            <span class="gradient-text animate-delay-1">WalletWise</span>
            >>>>>>> c76f2372b5da58f820b56f10d43b00dd0fb8e2f6
        </h1>
        <p class="text-xl md:text-2xl text-primary-700 mb-10 leading-relaxed">
          Advanced financial management dashboard with powerful analytics, multi-user control, and enterprise-grade
          security.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="{{url('register')}}"
            class="px-8 py-4 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
            Get Started Now
          </a>
          <a href="{{ url('/Superadmin/Feature') }}"
            class="px-8 py-4 border-2 border-primary-600 text-primary-700 font-semibold rounded-full hover:bg-primary-50 transition-all duration-300">
            Explore Features
          </a>
        </div>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-white to-transparent"></div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="text-center mb-20">
        <span class="inline-block px-4 py-2 bg-primary-100 text-primary-700 rounded-full font-medium mb-4">Dashboard
          Capabilities</span>
        <h2 class="text-4xl font-bold text-primary-800 mb-6 ">Powerful Financial Management Tools</h2>
        <p class="max-w-2xl mx-auto text-lg text-gray-600">
          WalletWise provides comprehensive tools to monitor, analyze, and optimize financial operations with precision
          and ease.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="glass-card p-8 rounded-2xl hover-scale">
          <div class="feature-icon">
            <i class="bi bi-bar-chart text-4xl text-primary-600"></i>
          </div>
          <h3 class="text-xl font-semibold text-center mb-3 text-primary-800">Advanced Analytics</h3>
          <p class="text-gray-600 text-center">
            Comprehensive financial insights with customizable reports, trend analysis, and predictive forecasting.
          </p>
        </div>

        <!-- Feature 2 -->
        <div class="glass-card p-8 rounded-2xl hover-scale">
          <div class="feature-icon">
            <i class="fas fa-user-shield text-4xl text-primary-600"></i>
          </div>
          <h3 class="text-xl font-semibold text-center mb-3 text-primary-800">Enterprise Security</h3>
          <p class="text-gray-600 text-center">
            Military-grade encryption, multi-factor authentication, and role-based access control for complete data
            protection.
          </p>
        </div>

        <!-- Feature 3 -->
        <div class="glass-card p-8 rounded-2xl hover-scale">
          <div class="feature-icon">
            <i class="bi bi-wallet2 text-4xl text-primary-600"></i>
          </div>
          <h3 class="text-xl font-semibold text-center mb-3 text-primary-800">360° Financial View</h3>
          <p class="text-gray-600 text-center">
            Consolidated dashboard showing all financial metrics, transactions, and account balances at a glance.
          </p>
        </div>

        <!-- Feature 4 -->
        <div class="glass-card p-8 rounded-2xl hover-scale">
          <div class="feature-icon">
            <i class="bi bi-bell-fill text-4xl text-primary-600"></i>
          </div>
          <h3 class="text-xl font-semibold text-center mb-3 text-primary-800">Automated Alerts</h3>
          <p class="text-gray-600 text-center">
            Customizable notifications for unusual activity, budget thresholds, and important financial events.
          </p>
        </div>

        <!-- Feature 5 -->
        <div class="glass-card p-8 rounded-2xl hover-scale">
          <div class="feature-icon">
            <i class="fas fa-bullseye text-4xl text-primary-600"></i>
          </div>
          <h3 class="text-xl font-semibold text-center mb-3 text-primary-800">Goal Tracking</h3>
          <p class="text-gray-600 text-center">
            Set, monitor, and achieve financial objectives with visual progress tracking and milestone celebrations.
          </p>
        </div>

        <!-- Feature 6 -->
        <div class="glass-card p-8 rounded-2xl hover-scale">
          <div class="feature-icon">
            <i class="fa-solid fa-cloud text-4xl text-primary-600"></i>
          </div>
          <h3 class="text-xl font-semibold text-center mb-3 text-primary-800">Cloud Sync</h3>
          <p class="text-gray-600 text-center">
            Real-time data synchronization across all devices with offline capability and automatic backups.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-20 bg-gradient-to-br from-primary-600 to-primary-700 text-white">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="p-6">
          <div class="text-4xl font-bold mb-2" data-count="100">0</div>
          <div class="text-primary-200">Active Institutions</div>
        </div>
        <div class="p-6">
          <div class="text-4xl font-bold mb-2" data-count="500">0</div>
          <div class="text-primary-200">Managed Users</div>
        </div>
        <div class="p-6">
          <div class="text-4xl font-bold mb-2" data-count="99.9">0</div>
          <div class="text-primary-200">Uptime %</div>
        </div>
        <div class="p-6">
          <div class="text-4xl font-bold mb-2" data-count="24">0</div>
          <div class="text-primary-200">Support Response (hrs)</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Section -->
  <section class="py-20 bg-primary-50">
    <div class="container mx-auto px-6">
      <div class="flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2">
          <img
            src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
            alt="Financial Dashboard" class="rounded-2xl shadow-2xl hover-scale transition-all duration-300">
        </div>
        <div class="lg:w-1/2">
          <span class="inline-block px-4 py-2 bg-primary-100 text-primary-700 rounded-full font-medium mb-4">Why
            WalletWise?</span>
          <h2 class="text-4xl font-bold text-primary-800 mb-6">Enterprise-Grade Financial Management</h2>
          <p class="text-lg text-gray-600 mb-8">
            WalletWise is designed for organizations that demand reliability, security, and powerful financial oversight
            capabilities.
          </p>

          <div class="space-y-6">
            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary-100 text-primary-700">
                  <i class="fas fa-shield-alt"></i>
                </div>
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-primary-800">Bank-Level Security</h3>
                <p class="text-gray-600">256-bit encryption, SOC 2 compliance, and regular security audits ensure your
                  data is always protected.</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary-100 text-primary-700">
                  <i class="fas fa-users-cog"></i>
                </div>
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-primary-800">Granular Permissions</h3>
                <p class="text-gray-600">Customizable role-based access controls allow precise management of user
                  capabilities.</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary-100 text-primary-700">
                  <i class="fas fa-project-diagram"></i>
                </div>
              </div>
              <div class="ml-4">
                <h3 class="text-lg font-semibold text-primary-800">Multi-Tier Hierarchy</h3>
                <p class="text-gray-600">Manage organizations, departments, and individual users with our hierarchical
                  structure.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <span
          class="inline-block px-4 py-2 bg-primary-100 text-primary-700 rounded-full font-medium mb-4">Testimonials</span>
        <h2 class="text-4xl font-bold text-primary-800 mb-6">Trusted by Financial Professionals</h2>
        <p class="max-w-2xl mx-auto text-lg text-gray-600">
          Hear from organizations that transformed their financial management with WalletWise.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="bg-white rounded-2xl p-8 shadow-lg relative testimonial-card hover-scale">
          <div class="flex items-center mb-6">
            <img src="/img/nishtha.jpg" alt="Riya Sharma" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold text-primary-800">Riya Sharma</h4>
              <span class="text-sm text-gray-500">CFO, EduTech Solutions</span>
            </div>
          </div>
          <p class="text-gray-600 italic relative z-10">
            "WalletWise has revolutionized our financial reporting. What used to take days now takes minutes with their
            intuitive dashboards and automated reports."
          </p>
          <div class="mt-4 flex text-yellow-400">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="bg-white rounded-2xl p-8 shadow-lg relative testimonial-card hover-scale">
          <div class="flex items-center mb-6">
            <img src="/img/sir.jpeg" alt="Amit Patel" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold text-primary-800">Amit Patel</h4>
              <span class="text-sm text-gray-500">Director, Retail Chain</span>
            </div>
          </div>
          <p class="text-gray-600 italic relative z-10">
            "The multi-store financial consolidation in WalletWise saved us countless hours. Now we can see all
            locations' performance in one dashboard."
          </p>
          <div class="mt-4 flex text-yellow-400">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="bg-white rounded-2xl p-8 shadow-lg relative testimonial-card hover-scale">
          <div class="flex items-center mb-6">
            <img src="/img/nishtha.jpg" alt="Sneha Desai" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold text-primary-800">Sneha Desai</h4>
              <span class="text-sm text-gray-500">Finance Manager, Healthcare</span>
            </div>
          </div>
          <p class="text-gray-600 italic relative z-10">
            "The audit trails and permission controls give me peace of mind knowing exactly who accessed what financial
            data and when."
          </p>
          <div class="mt-4 flex text-yellow-400">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-20 bg-primary-50 text-primary-800">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-6">Ready to Transform Your Financial Management?</h2>
      <p class="text-xl max-w-2xl mx-auto mb-10 text-primary-600">
        Join hundreds of organizations using WalletWise to streamline their financial operations.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{url('register')}}"
          class="px-8 py-4 bg-primary-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
          Start Free Trial
        </a>
        <a href="#"
          class="px-8 py-4 border-2 border-primary-600 text-primary-600 font-semibold rounded-full hover:bg-primary-600 hover:text-white transition-all duration-300">
          Schedule Demo
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('Superadmin.footer')

  <script>
    // Animate counting numbers
    function animateCounters() {
      const counters = document.querySelectorAll('[data-count]');
      const speed = 200;

      counters.forEach(counter => {
        const target = +counter.getAttribute('data-count');
        const count = +counter.innerText;
        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(animateCounters, 1);
        } else {
          counter.innerText = target;
        }
      });
    }

    // Start animation when stats section is in view
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('section.bg-gradient-to-br');
    if (statsSection) {
      observer.observe(statsSection);
    }
  </script>
</body>
<script>
  // Simple animation trigger on scroll
  document.addEventListener('DOMContentLoaded', function () {
    const animateElements = document.querySelectorAll('.animate__animated');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add(entry.target.dataset.animate);
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    animateElements.forEach(element => {
      observer.observe(element);
    });
  });
</script>

</html>