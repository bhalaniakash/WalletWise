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

  .text-elegant {
    color: #6B4226;
  }

  .btn-elegant:hover {
    background-color: #5A3821;
  }

  /* Sticky Navbar */
  .navbar-fixed {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
    width: 100%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  /* Optional: Add padding to body to prevent content overlap */
  body {
    padding-top: 80px;
    /* Adjust based on navbar height */
  }
</style>

<!-- Navbar -->
<nav class="navbar-fixed shadow-md" style="background: #f5e8db;">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo m-2">
      <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
      <a href="/" class="text-2xl font-bold text-elegant">WalletWise</a>
    </div>
    <div class="hidden lg:flex space-x-6">
      <a href="{{ url('/Superadmin/Feature') }}" class="text-gray-600 hover:text-elegant">Tools</a>
      <a href="{{ url('/Superadmin/pricing') }}" class="text-gray-600 hover:text-elegant">Plans</a>
      <a href="{{ url('/Superadmin/contactus') }}" class="text-gray-600 hover:text-elegant">Reach us</a>
      <a href="{{ url('/Superadmin/about_us') }}" class="text-gray-600 hover:text-elegant">About us</a>
      <a href="{{ url('register') }}" class="text-gray-600 hover:text-elegant">Join us</a>
      <a href="{{ url('login') }}" class="text-gray-600 hover:text-elegant">Sign In</a>
    </div>
  </div>
</nav>