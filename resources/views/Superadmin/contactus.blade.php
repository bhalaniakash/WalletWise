<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - WalletWise</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    
    .contact-card {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    .contact-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .input-focus:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(107, 66, 38, 0.2);
    }
    
    .btn-primary {
      background: linear-gradient(to right, var(--primary), var(--accent));
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(107, 66, 38, 0.2);
    }
    
    .social-icon {
      transition: all 0.3s ease;
    }
    
    .social-icon:hover {
      transform: scale(1.2);
    }
    
    .floating {
      animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
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
        <span class="gradient-text">We're Here to Help</span>
      </h1>
      <p class="text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
        Whether you have questions about features, need support, or want to provide feedback - our team is ready to assist you.
      </p>
      
      {{-- <div class="mt-12">
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_5tkpblhp.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin: 0 auto;" loop autoplay class="floating"></lottie-player>
      </div> --}}
    </div>  
  </section>

  <!-- Contact Section -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
        <!-- Contact Info -->
        <div class="bg-gradient-to-b from-amber-50 to-white p-10 rounded-2xl contact-card animate__animated animate__fadeInLeft">
          <h2 class="text-2xl font-bold mb-6">Get in Touch</h2>
          <p class="mb-8 text-gray-600 leading-relaxed">
            Our support team is committed to providing timely and helpful responses to all your inquiries. Choose your preferred method of contact below.
          </p>
          
          <div class="space-y-6">
            <div class="flex items-start">
              <div class="bg-amber-100 p-3 rounded-lg mr-4">
                <i class="fas fa-envelope text-amber-600 text-xl"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-800">Email Us</h3>
                <a href="mailto:support@walletwise.com" class="text-gray-600 hover:text-amber-700 transition">support@walletwise.com</a>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="bg-amber-100 p-3 rounded-lg mr-4">
                <i class="fas fa-phone-alt text-amber-600 text-xl"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-800">Call Us</h3>
                <p class="text-gray-600">+91 98765 43210</p>
                <p class="text-sm text-gray-500 mt-1">Mon-Fri, 9AM-6PM IST</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="bg-amber-100 p-3 rounded-lg mr-4">
                <i class="fas fa-map-marker-alt text-amber-600 text-xl"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-800">Visit Us</h3>
                <p class="text-gray-600">123 Financial Street, Money District</p>
                <p class="text-gray-600">New Delhi, India 110001</p>
              </div>
            </div>
          </div>
          
          <div class="mt-10">
            <h3 class="font-semibold text-gray-800 mb-4">Follow Us</h3>
            <div class="flex space-x-4">
              <a href="#" class="social-icon text-gray-600 hover:text-amber-600 text-xl"><i class="fab fa-instagram"></i></a>
              <a href="#" class="social-icon text-gray-600 hover:text-amber-600 text-xl"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon text-gray-600 hover:text-amber-600 text-xl"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="social-icon text-gray-600 hover:text-amber-600 text-xl"><i class="fab fa-facebook-f"></i></a>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-gradient-to-b from-amber-50 to-white p-10 rounded-2xl contact-card animate__animated animate__fadeInRight">
          <h2 class="text-2xl font-bold mb-6">Send a Message</h2>
          <p class="mb-8 text-gray-600 leading-relaxed">
            Fill out the form below and we'll get back to you within 24 hours. For immediate assistance, please call our support line.
          </p>

          @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-sm text-green-700">
                    {{ session('success') }}
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-100 inline-flex h-8 w-8" onclick="this.parentElement.parentElement.parentElement.remove();">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                      </svg>
                    </button>
                  </p>
                </div>
              </div>
            </div>
          @endif

          <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
            @csrf
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
              <input type="text" id="name" name="name" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                placeholder="John Doe">
            </div>
            
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <input type="email" id="email" name="email" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                placeholder="you@example.com">
            </div>
            
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Message</label>
              <textarea id="message" name="message" rows="5" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                placeholder="How can we help you?"></textarea>
            </div>
            
            <button type="submit" class="btn-primary text-white px-6 py-3 rounded-lg w-full font-semibold shadow hover:shadow-lg transition">
              Send Message <i class="fas fa-paper-plane ml-2"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
          <span class="gradient-text">Frequently Asked Questions</span>
        </h2>
        <p class="text-lg max-w-2xl mx-auto text-gray-600">
          Quick answers to common questions about WalletWise
        </p>
      </div>
      
      <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded-xl shadow-sm">
          <h3 class="font-semibold text-lg mb-2 flex items-center">
            <i class="fas fa-question-circle text-amber-500 mr-3"></i>
            How do I reset my password?
          </h3>
          <p class="text-gray-600">
            You can reset your password by clicking on "Profile".
          </p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm">
          <h3 class="font-semibold text-lg mb-2 flex items-center">
            <i class="fas fa-question-circle text-amber-500 mr-3"></i>
            Is WalletWise free to use?
          </h3>
          <p class="text-gray-600">
            Yes! WalletWise offers a free plan with all essential features. We also have premium plans with additional capabilities for power users.
          </p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm">
          <h3 class="font-semibold text-lg mb-2 flex items-center">
            <i class="fas fa-question-circle text-amber-500 mr-3"></i>
            How secure is my financial data?
          </h3>
          <p class="text-gray-600">
           WalletWise integrates Laravel's built-in security features such as CSRF protection, input validation, and secure password hashing to ensure your data remains safe.
          </p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm">
          <h3 class="font-semibold text-lg mb-2 flex items-center">
            <i class="fas fa-question-circle text-amber-500 mr-3"></i>
            Can I use WalletWise for business finances?
          </h3>
          <p class="text-gray-600">
            Absolutely! Many small businesses use WalletWise to track expenses and income. We're working on dedicated business features.
          </p>
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
    // Simple animation trigger on scroll
    document.addEventListener('DOMContentLoaded', function() {
      const animateElements = document.querySelectorAll('.animate__animated');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate__fadeIn');
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