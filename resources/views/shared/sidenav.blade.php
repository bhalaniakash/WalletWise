<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Ramaraja:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">


  <base href="/expenseMVC/">
  <script type="text/javascript" src="lib/js/main.js"></script>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');

    body {
      margin: 0;
      color: #6B4226;
      font-family: 'Andada Pro', sans-serif;
    }

    .vertical-nav {
      margin-top: 69px;
      min-width: 16rem;
      width: 16rem;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Soft and subtle shadow */
      transition: all 0.4s;
      color: #6B4226;
      background: #E6C7A5 !important;
      text-decoration: none;
      font-family: 'Arial, sans-serif';
    }


    .text-gray {

      padding: 5px;
      font-size: 25px;
      padding-left: 10px;
    }

    ul li {
      line-height: 40px;
      padding-left: 1px;
      text-decoration: none;

    }


    x-dropdown-link {
      color: black;

      text-decoration: none;
      transition: 0.3s;
    }

    .nav-item {
      background: #E6C7A5;

      /* Primary - Pure Black */
    }

    #sidebar.active {
      margin-left: -16rem;
    }

    x-dropdown-link:hover {
      font-size: 17px;
      padding-left: 10px;
      transition: 0.5s;
      color: #6B4226;
      background: #E6C7A5;
      border-radius: 5px;
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left: -17rem;
      }

      #sidebar.active {
        margin-left: 0;
      }
    }

    li {
      list-style: none;
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 10px 15px;
      font-size: 18px;
      font-weight: 500;
      transition: background-color 0.3s, transform 0.3s, font-size 0.3s, font-weight 0.3s;
      color: #6B4226;
      border-radius: 5px;
    }

    .nav-link:hover {

      color: #6B4226;
      font-weight: 600;
      font-size: 20px;
      transform: translateY(-3px);
    }

    .nav-link i {
      margin-right: 10px;
      font-size: 20px;
      color: #6B4226;
      transition: color 0.3s;
    }

    /* Highlight the active file name */
    .nav-item.active .nav-link {
      color: #6B4226;
      font-weight: 700;
      font-size: 20px;
      border-radius: 5px;
    }

    .span {
      width: 20px;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 10px;
    }
  </style>

<body>
  <!-- Vertical Sidebar -->
  <div class="vertical-nav" id="sidebar"> 
    
    
    <ul class="nav flex-column bg-light mb-0 mt-4" id="navbarNav">
      <li class="nav-item">
        <a href="{{ url('dashboard') }}" class="nav-link">
          <span class="span"><i class="fas fa-home"></i></span> Home
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('dashboard/income') }}" class="nav-link">
          <span class="span"><i class="fas fa-dollar-sign"></i></span> Income
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('dashboard/expense') }}" class="nav-link">
          <span class="span"><i class="fas fa-money-bill-wave"></i></span> Expense
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('dashboard/incomeReport') }}" class="nav-link">
          <span class="span"><i class="fas fa-chart-line"></i></span> Income Log
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('dashboard/expenseReport') }}" class="nav-link">
          <span class="span"><i class="fas fa-receipt"></i></span> Expense Log
        </a>
      </li>

      @if (Auth::user()->plan_type === 'regular')
      <li class="nav-item">
      <a href="{{ url('dashboard/update') }}" class="nav-link">
        {{-- 5267 3181 8797 5449 --}}
        <span class="span"><i class="fas fa-gem"></i></span> Upgrade
      </a>
      </li>
      <li class="nav-item">
      <a href="{{ url('dashboard/update') }}" class="nav-link">
        <span class="span"><i class="fas fa-bell"></i></span> New Reminders
      </a>
      </li>
      <li class="nav-item">
      <a href="{{ url('dashboard/update') }}" class="nav-link">
        <span class="span"><i class="fas fa-coins"></i></span> Budget
      </a>
      </li>
      <li class="nav-item">
      <a href="{{ url('dashboard/update') }}" class="nav-link">
        <span class="span"><i class="fas fa-clipboard-list"></i></span> Reminders
      </a>
      </li>
    @elseif (Auth::user()->plan_type === 'premium')
      <li class="nav-item">
      <a href="{{ url('dashboard/reminder') }}" class="nav-link">
        <span class="span"><i class="fas fa-bell"></i></span> New Reminders
      </a>
      </li>
      <li class="nav-item">
      <a href="{{ url('dashboard/show_reminder') }}" class="nav-link">
        <span class="span"><i class="fas fa-clipboard-list"></i></span>Reminders
      </a>
      </li>
      <li class="nav-item">
      <a href="{{ url('dashboard/budget') }}" class="nav-link">
        <span class="span"><i class="fas fa-coins"></i></span> Budget
      </a>
      </li>
    @endif
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" class="nav-item">
          @csrf
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
            class="nav-link">
            <span class="span"><i class="fas fa-sign-out-alt"></i></span> {{ __('Sign Out') }}
          </a>
        </form>
      </li>
    </ul>
  </div>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Get current URL path
    let currentPath = window.location.pathname;
    // Select all sidebar links
    let navLinks = document.querySelectorAll(".nav-item a");
    navLinks.forEach(link => {
      let linkPath = new URL(link.href).pathname; // Get the path from href
      // Exact match check
      if (currentPath === linkPath) {
        link.parentElement.classList.add("active");
      }
    });
  });
</script>

</html>