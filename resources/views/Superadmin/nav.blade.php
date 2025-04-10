{{-- <script>
  
  document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector("nav");

    // Hide the navbar initially
    navbar.style.transform = "translateY(-100%)";

    // Show the navbar when the mouse is at the top 20% of the screen
    document.addEventListener("mousemove", function (event) {
      if (event.clientY <= window.innerHeight * 0.2) { // 20% of the viewport height    
        navbar.style.transform = "translateY(0)";
      } else {
        navbar.style.transform = "translateY(-100%)";
      }
    });
  });

</script> --}}
<style>
   /* Base Styles */
   :root {
    --primary-color: #6B4226;
    --secondary-color: #f5e8db;
    --accent-color: #8B5A2B;
    --text-dark: #333333;
    --text-light: #f8f9fa;
    --transition-speed: 0.3s;
  }
  
  body {
    padding-top: 90px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }
  
  /* Navbar Container */
  .navbar-fixed {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    width: 100%;
    background: rgba(245, 232, 219, 0.98);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    transition: all var(--transition-speed) ease;
    border-bottom: 1px solid rgba(107, 66, 38, 0.1);
  }
  
  .navbar-scrolled {
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  }
  
  /* Navbar Content */
  .navbar-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0.75rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  /* Logo Styles */
  .logo {
    display: flex;
    align-items: center;
    gap: 12px;
    transition: transform 0.2s ease;
  }
  
  .logo:hover {
    transform: translateY(-2px);
  }
  
  .logo img {
    width: 48px;
    height: 48px;
    object-fit: contain;
    transition: transform 0.3s ease;
  }
  
  .logo:hover img {
    transform: rotate(-5deg) scale(1.05);
  }
  
  .logo-text {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    letter-spacing: -0.5px;
    background: linear-gradient(to right, var(--primary-color), var(--accent-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.3s ease;
  }
  
  /* Navigation Links */
  .nav-links {
    display: flex;
    align-items: center;
    gap: 1.5rem;
  }
  
  .nav-link {
    position: relative;
    color: var(--text-dark);
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.5rem 0;
    transition: all var(--transition-speed) ease;
  }
  
  .nav-link:hover {
    color: var(--primary-color);
  }
  
  .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--primary-color);
    transition: width var(--transition-speed) ease;
  }
  
  .nav-link:hover::after {
    width: 100%;
  }
  
  /* Auth Buttons */
  .auth-buttons {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-left: 1rem;
  }
  
  .btn {
    padding: 0.5rem 1.25rem;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all var(--transition-speed) ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  
  .btn-signin {
    color: var(--primary-color);
    border: 1px solid var(--primary-color);
    background: transparent;
  }
  
  .btn-signin:hover {
    background: rgba(107, 66, 38, 0.05);
    transform: translateY(-1px);
  }
  
  .btn-join {
    background: var(--primary-color);
    color: white;
    border: 1px solid var(--primary-color);
  }
  
  .btn-join:hover {
    background: var(--accent-color);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 90, 43, 0.2);
  }
  
  /* Mobile Menu Toggle */
  .mobile-menu-btn {
    display: none;
    background: none;
    border: none;
    color: var(--primary-color);
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.5rem;
  }
  
  /* Responsive Styles */
  @media (max-width: 1024px) {
    .nav-links, .auth-buttons {
      display: none;
    }
    
    .mobile-menu-btn {
      display: block;
    }
    
    .navbar-container {
      padding: 0.75rem 1.5rem;
    }
  }
</style>

<!-- Navbar -->
<nav class="navbar-fixed shadow-md" style="background: #f5e8db;">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo">
      <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
      <a href="/" class="text-2xl font-bold text-elegant">WalletWise</a>
    </div>
    <div class="hidden lg:flex space-x-6 auth-buttons">
      <a href="{{ url('/Superadmin/Feature') }}" class="nav-link">Tools</a>
      <a href="{{ url('/Superadmin/pricing') }}" class="nav-link">Plans</a>
      <a href="{{ url('/Superadmin/contactus') }}" class="nav-link">Reach us</a>
      <a href="{{ url('/Superadmin/about_us') }}" class="nav-link">About us</a>
      <a href="{{ url('register') }}" class="btn btn-signin">Join us</a>
      <a href="{{ url('login') }}" class="btn btn-join">Sign In</a>
    </div>
  </div>
</nav>
<script>
  // Add scroll effect to navbar
  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('navbar-scrolled');
    } else {
      navbar.classList.remove('navbar-scrolled');
    }
  });
  
  // Mobile menu functionality would go here
  document.getElementById('mobileMenuBtn').addEventListener('click', function() {
    // Implement mobile menu toggle
    console.log('Mobile menu clicked');
  });
</script>