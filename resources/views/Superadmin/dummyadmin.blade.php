<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { 
          font-family: Arial, sans-serif;
          background: #E6C7A5}

        .hero-section { 
          text-align: center; 
          padding: 80px 20px;
          color: #6b4226; 
          background: #E6C7A5; }
          
        .hero-section h1 { 
          color: #6b4226; 
          font-weight: bold; }

        .cta-button { 
          background-color: #6b4226; 
          color: #E6C7A5; 
          padding: 10px 20px; 
          border-radius: 20px; 
          font-weight: bold; }

        .how-it-works { 
          background-color: #6b4226; 
          color: #E6C7A5;
          padding: 60px 20px; 
          text-align: center; }

   
        .nav-link {
          display: flex;
          align-items: center;
          padding: 10px 15px;
          font-size: 18px;
          color: #6B4226;
          border-radius: 5px;
        }

        .nav-link:hover {
          color: #6B4226;
          font-weight: 600;
          font-size: 20px;
          transform: translateY(-3px);
        } 
      
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light  shadow-sm">
    <div class="container">
        <a class="navbar-brand " href="#">Wallet Wise</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="margin:0%;">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link " href="#">How It Works</a></li>
                <li class="nav-item"><a class="nav-link " href="#">What You Get</a></li>
                <li class="nav-item"><a class="nav-link " href="#">Pricing</a></li>
                <li class="nav-item"><a class="nav-link " href="http://127.0.0.1:8000/login">Log In</a></li>
                <li class="nav-item"><a class="nav-link" href="http://127.0.0.1:8000/register">Sign Up</a></li>
               
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <h1>Budget with a Why</h1>
    <p>Spend, save, and give toward what's important in life</p>
    <a href="#" class="cta-button text-decoration-none">CREATE YOUR BUDGET</a>
    <p class="mt-3">Budget tracking app available on <i class="bi bi-apple"></i> <i class="bi bi-android"></i></p>
</div>

<!-- How It Works Section -->
<div class="how-it-works">
    <h2>How it works</h2>
    <p>Goodbudget is a budget tracker for the modern age. Say no more to carrying paper envelopes. This virtual budget program keeps you on track with family and friends using the time-tested envelope budgeting method.</p>
    <a href="#" class="btn btn-light">LEARN MORE</a>
</div>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
