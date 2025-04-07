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

    .btn-elegant {
      background-color: #6B4226;
      color: white;
    }

    .btn-elegant:hover {
      background-color: #5A3821;
    } 
    </style>
<!-- Navbar -->
 <nav class="shadow-md" style="background: #f5e8db;">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="logo m-2">
        <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
        <a href="/" class="text-2xl font-bold text-elegant">WalletWise</a>
      </div>

      <div class="hidden lg:flex space-x-6">
        <a href="{{ url('/') }}" class="text-gray-600 hover:text-elegant">Home</a>
        <a href="{{ url('/Superadmin/Feature') }}" class="text-gray-600 hover:text-elegant">Features</a>
        <a href="{{ url('/Superadmin/pricing') }}" class="text-gray-600 hover:text-elegant">Pricing</a>
        <a href="{{ url('/Superadmin/contactus') }}" class="text-gray-600 hover:text-elegant">Contact us</a>
        <a href="{{ url('/Superadmin/about_us') }}" class="text-gray-600 hover:text-elegant">About us</a>
        <a href="{{ url('register') }}" class="text-gray-600 hover:text-elegant">Sign Up</a>
        <a href="{{ url('login') }}" class="text-gray-600 hover:text-elegant">Sign In</a>
      </div>
    </div>
  </nav>