<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WalletWise - Features</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
        </script>
    <style>
        
        :root {
            --primary: #6B4226;
            --secondary: #E6C7A5;
            --accent: #8B5A2B;
            --light: #F9F5F0;
            --dark: #2A2118;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background-color: var(--light);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--secondary) 0%, #D4B08A 100%);
        }
        
        .feature-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .icon-wrapper {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            margin: 0 auto 20px;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--accent));
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(107, 66, 38, 0.2);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        .tab-button {
            transition: all 0.3s ease;
        }
        
        .tab-button.active {
            background: rgba(107, 66, 38, 0.1);
            border-left: 4px solid var(--primary);
        }
        
        .animate-delay-1 {
            animation-delay: 0.2s;
        }
        
        .animate-delay-2 {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('Superadmin.nav')

    <!-- Hero Section -->
    <section class="relative overflow-hidden gradient-bg py-24 text-center">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-64 h-64 rounded-full bg-white opacity-20 mix-blend-overlay"></div>
            <div class="absolute bottom-20 right-20 w-64 h-64 rounded-full bg-white opacity-20 mix-blend-overlay"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="gradient-text">Powerful Features</span>
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Discover how WalletWise gives you complete control over your finances with intuitive tools designed for real life
            </p>
            
            {{-- <div class="mt-12">
                <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_5tkpblhp.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin: 0 auto;" loop autoplay class="floating"></lottie-player>
            </div> --}}
        </div>
    </section>

    <!-- Features Navigation -->
    <section class="py-12 bg-white sticky top-0 z-10 shadow-sm">
        <div class="container mx-auto px-6">
            <div class="flex overflow-x-auto space-x-4 pb-2">
                <button class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap active" data-tab="all">
                    All Features
                </button>
                <button class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap" data-tab="tracking">
                    Tracking
                </button>
                <button class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap" data-tab="planning">
                    Planning
                </button>
                <button class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap" data-tab="security">
                    Security
                </button>
                <button class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap" data-tab="reports">
                    Reports
                </button>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Expense Tracking -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="tracking">
                    <div class="icon-wrapper bg-amber-100">
                        <i class="fas fa-wallet text-2xl text-amber-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Expense Tracking</h3>
                    <p class="text-gray-600 text-center">
                        Log daily expenses with ease, categorize your spendings, and visualize where your money goes with beautiful charts and insights.
                    </p>
                </div>

                <!-- Smart Reminders -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="planning">
                    <div class="icon-wrapper bg-blue-100">
                        <i class="fas fa-bell text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Smart Reminders</h3>
                    <p class="text-gray-600 text-center">
                        Never miss a payment again with customizable reminders for bills, subscriptions, and other recurring expenses.
                    </p>
                </div>

                <!-- Multi-Currency -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="tracking">
                    <div class="icon-wrapper bg-purple-100">
                        <i class="fas fa-coins text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Multi-Currency</h3>
                    <p class="text-gray-600 text-center">
                        Manage finances in multiple currencies with automatic exchange rate updates. Perfect for travelers and global citizens.
                    </p>
                </div>

                <!-- Income Reports -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="reports">
                    <div class="icon-wrapper bg-green-100">
                        <i class="fas fa-chart-line text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Income Reports</h3>
                    <p class="text-gray-600 text-center">
                        Generate detailed reports of your income streams with visualizations to help you understand your earning patterns.
                    </p>
                </div>

                <!-- Cloud Sync -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="security">
                    <div class="icon-wrapper bg-red-100">
                        <i class="fas fa-cloud text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Cloud Sync</h3>
                    <p class="text-gray-600 text-center">
                        Access your financial data from any device with secure, encrypted cloud synchronization that works seamlessly.
                    </p>
                </div>

                <!-- Security -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="security">
                    <div class="icon-wrapper bg-indigo-100">
                        <i class="fas fa-shield-alt text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Bank-Level Security</h3>
                    <p class="text-gray-600 text-center">
                        Your data is protected with AES-256 encryption, the same standard used by financial institutions worldwide.
                    </p>
                </div>

                <!-- Custom Categories -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="tracking">
                    <div class="icon-wrapper bg-pink-100">
                        <i class="fas fa-tags text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Custom Categories</h3>
                    <p class="text-gray-600 text-center">
                        Create personalized spending categories that match your lifestyle and financial priorities.
                    </p>
                </div>

                <!-- Goal Setting -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="planning">
                    <div class="icon-wrapper bg-teal-100">
                        <i class="fas fa-bullseye text-2xl text-teal-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Goal Setting</h3>
                    <p class="text-gray-600 text-center">
                        Set and track financial goals with progress visualizations and milestone celebrations to keep you motivated.
                    </p>
                </div>

                <!-- Recurring Transactions -->
                <div class="bg-white p-8 rounded-2xl feature-card" data-category="planning">
                    <div class="icon-wrapper bg-cyan-100">
                        <i class="fas fa-sync-alt text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Recurring Transactions</h3>
                    <p class="text-gray-600 text-center">
                        Automate your regular income and expenses to save time and maintain accurate financial records effortlessly.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Spotlight -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                {{-- <div class="md:w-1/2 mb-12 md:mb-0">
                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_isdnju3w.json" background="transparent" speed="1" style="width: 100%; height: 400px;" loop autoplay></lottie-player>
                </div> --}}
                
                <div class="md:pl-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">
                        <span class="gradient-text">Real-Time Insights</span>
                    </h2>
                    <p class="text-lg leading-relaxed mb-6">
                        Our dashboard gives you an instant overview of your financial health with beautiful, interactive visualizations that update in real-time.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-500 mt-1 mr-3"></i>
                            <span>See spending trends across customizable time periods</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-500 mt-1 mr-3"></i>
                            <span>Compare income vs. expenses with intuitive charts</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-amber-500 mt-1 mr-3"></i>
                            <span>Identify your top spending categories at a glance</span>
                        </li>
                    </ul>
                    <a href="/register" class="btn-primary text-white px-8 py-3 rounded-lg inline-block font-semibold shadow hover:shadow-lg transition">
                        Try It Yourself
                    </a>
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
        <a href="{{url('register')}}" class="px-8 py-4 bg-primary-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
          Start Free Trial
        </a>
        <a href="#" class="px-8 py-4 border-2 border-primary-600 text-primary-600 font-semibold rounded-full hover:bg-primary-600 hover:text-white transition-all duration-300">
          Schedule Demo
        </a>
      </div>
    </div>
  </section>

    <!-- Footer -->
    @include('Superadmin.footer')

    <script>
        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', function() {
                // Update active tab
                document.querySelectorAll('.tab-button').forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
                
                // Filter features
                const category = this.dataset.tab;
                document.querySelectorAll('.feature-card').forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Simple animation trigger on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.feature-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
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
</body>
</html>