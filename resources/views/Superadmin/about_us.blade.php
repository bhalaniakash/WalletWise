<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - WalletWise</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
      scroll-behavior: smooth;
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
    
    .card-hover {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .card-hover:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .section-divider {
      height: 100px;
      background: linear-gradient(to bottom right, var(--light) 0%, var(--light) 50%, transparent 50%, transparent 100%);
    }
    
    .team-member:hover img {
      transform: scale(1.05);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .btn-primary {
      background: linear-gradient(to right, var(--primary), var(--accent));
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(107, 66, 38, 0.2);
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
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }
    
    .floating {
      animation: float 6s ease-in-out infinite;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  @include('Superadmin.nav')

  <!-- Hero Section -->
  <section class="relative overflow-hidden gradient-bg py-28 md:py-36 text-center">
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-20 left-20 w-64 h-64 rounded-full bg-white opacity-20 mix-blend-overlay"></div>
      <div class="absolute bottom-20 right-20 w-64 h-64 rounded-full bg-white opacity-20 mix-blend-overlay"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
      <h1 class="text-4xl md:text-6xl font-bold mb-6 animate__animated animate__fadeInDown">
        <span class="gradient-text">Redefining Financial Freedom</span>
      </h1>
      <p class="text-lg md:text-xl max-w-3xl mx-auto leading-relaxed animate__animated animate__fadeIn animate__delay-1s">
        WalletWise is more than just an app—it's a movement towards transparent, accessible, and stress-free financial management for everyone.
      </p>
      
      {{-- <div class="mt-12 animate__animated animate__fadeIn animate__delay-2s">
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_0yfsb3a1.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin: 0 auto;" loop autoplay class="floating"></lottie-player>
      </div> --}}
    </div>
  </section>

  <!-- Our Story -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-12 md:mb-0 animate__animated animate__fadeInLeft">
          <div class="relative">
            <img src="https://media.istockphoto.com/id/1346853640/photo/saving-money-concept-man-hand-putting-row-and-coin-write-finance-saving-money-concept-man.jpg?s=612x612&w=0&k=20&c=1I48V9GUU0liAJ-dMA4SW-h5LoejkBTlEZJ-0b_vmXE=" 
                 alt="WalletWise origin" 
                 class="rounded-xl shadow-2xl w-full max-w-lg">
            <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-lg shadow-lg w-3/4">
              <h4 class="font-bold text-lg text-gray-800">Born from real needs</h4>
              <p class="text-sm text-gray-600">Created to solve everyday financial challenges</p>
            </div>
          </div>
        </div>
        
        <div class="md:w-1/2 md:pl-16 animate__animated animate__fadeInRight">
          <h2 class="text-3xl md:text-4xl font-bold mb-6">
            <span class="gradient-text">Our Humble Beginnings</span>
          </h2>
          <p class="text-lg leading-relaxed mb-6">
            WalletWise started in a college hostel room, born from the frustration of tracking expenses in notebooks and spreadsheets. What began as a personal solution has grown into a platform helping thousands gain control of their finances.
          </p>
          <p class="text-lg leading-relaxed">
            Today, we're proud to serve students, professionals, and small business owners with intuitive tools that make money management simple and effective.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="py-20 bg-gray-50 relative">
    <div class="section-divider absolute top-0 left-0 right-0"></div>
    
    <div class="container mx-auto px-6 pt-16">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
          <span class="gradient-text">Our Guiding Principles</span>
        </h2>
        <p class="text-lg max-w-2xl mx-auto">
          These core values drive everything we do at WalletWise
        </p>
      </div>
      
      <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-md card-hover animate__animated animate__fadeInUp animate-delay-1">
          <div class="w-16 h-16 bg-gradient-to-r from-amber-100 to-amber-50 rounded-lg flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <h3 class="text-2xl font-bold mb-4 text-gray-800">Our Mission</h3>
          <p class="text-gray-600 leading-relaxed">
            To democratize financial literacy by creating tools that make money management accessible to everyone, regardless of their background or financial knowledge.
          </p>
        </div>
        
        <div class="bg-white p-8 rounded-2xl shadow-md card-hover animate__animated animate__fadeInUp animate-delay-2">
          <div class="w-16 h-16 bg-gradient-to-r from-blue-100 to-blue-50 rounded-lg flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <h3 class="text-2xl font-bold mb-4 text-gray-800">Our Vision</h3>
          <p class="text-gray-600 leading-relaxed">
            A world where financial stress is eliminated through smart, intuitive tools that empower people to make informed decisions about their money.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Who It's For -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
          <span class="gradient-text">Built For Real People</span>
        </h2>
        <p class="text-lg max-w-2xl mx-auto">
          WalletWise adapts to your unique financial situation
        </p>
      </div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-gradient-to-b from-amber-50 to-white p-8 rounded-2xl shadow-md card-hover animate__animated animate__fadeInUp">
          <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-6 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
              {{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" /> --}}
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-4 text-center text-gray-800">Students</h3>
          <p class="text-gray-600 text-center">
            Manage tight budgets, track allowances, and avoid overspending during those crucial college years.
          </p>
        </div>
        
        <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow-md card-hover animate__animated animate__fadeInUp animate-delay-1">
          <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-6 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-4 text-center text-gray-800">Small Businesses</h3>
          <p class="text-gray-600 text-center">
            Keep business finances organized with simple expense tracking and income reports.
          </p>
        </div>
        
        <div class="bg-gradient-to-b from-green-50 to-white p-8 rounded-2xl shadow-md card-hover animate__animated animate__fadeInUp animate-delay-2">
          <div class="w-20 h-20 bg-white rounded-full shadow-md flex items-center justify-center mb-6 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold mb-4 text-center text-gray-800">Professionals</h3>
          <p class="text-gray-600 text-center">
            Stay on top of bills, savings goals, and everyday spending without the headache.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
          <span class="gradient-text">Meet Our Team</span>
        </h2>
        <p class="text-lg max-w-2xl mx-auto">
          The passionate people building WalletWise
        </p>
      </div>
      
      <div class="grid md:grid-cols-3 gap-12 max-w-5xl mx-auto">
        <div class="flex flex-col items-center team-member animate__animated animate__fadeIn">
          <div class="relative mb-6">
            <img src="/img/sir.jpeg" alt="Pratyush Sharma" class="w-40 h-40 rounded-full object-cover shadow-xl border-4 border-white transition-all duration-300">
            <div class="absolute -bottom-3 -right-3 bg-white p-2 rounded-full shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-1">Pratyush Sharma</h3>
          <p class="text-gray-600 mb-4">Project Guide</p>
          <p class="text-gray-500 text-center text-sm">
            Providing expert guidance and mentorship to the WalletWise team.
          </p>
        </div>
        
        <div class="flex flex-col items-center team-member animate__animated animate__fadeIn animate-delay-1">
          <div class="relative mb-6">
            <img src="/img/akash.jpg" alt="Akash" class="w-40 h-40 rounded-full object-cover shadow-xl border-4 border-white transition-all duration-300">
            <div class="absolute -bottom-3 -right-3 bg-white p-2 rounded-full shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-1">Akash</h3>
          <p class="text-gray-600 mb-4">Laravel Developer</p>
          <p class="text-gray-500 text-center text-sm">
            Building the robust backend that powers WalletWise's features.
          </p>
        </div>
        
        <div class="flex flex-col items-center team-member animate__animated animate__fadeIn animate-delay-2">
          <div class="relative mb-6">
            <img src="/img/nishtha.jpg" alt="Nishtha" class="w-40 h-40 rounded-full object-cover shadow-xl border-4 border-white transition-all duration-300">
            <div class="absolute -bottom-3 -right-3 bg-white p-2 rounded-full shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
              </svg>
            </div>
          </div>
          <h3 class="text-xl font-bold mb-1">Nishtha</h3>
          <p class="text-gray-600 mb-4">Laravel Developer</p>
          <p class="text-gray-500 text-center text-sm">
            Crafting the user experience that makes WalletWise intuitive and enjoyable.
          </p>
        </div>
      </div>
    </div>
  </section>

  <
  <!-- CTA Section -->
  @include('Superadmin.CTA')

  <!-- Footer -->
  @include('Superadmin.footer')

  <script>
    // Simple animation trigger on scroll
    document.addEventListener('DOMContentLoaded', function() {
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
</body>
</html>