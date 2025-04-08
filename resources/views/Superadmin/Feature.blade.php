<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <title>WalletWise - Features</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            color: #6B4226;
            background-color: #f9f6f2;
        }

        .feature-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-elegant {
            background-color: #6B4226;
            color: white;
        }

        .btn-elegant:hover {
            background-color: #5a3b20;
        }

        .gradient-cta {
            background: linear-gradient(to right, #E6C7A5, #d7b693);
        }

        .text-elegant {
            color: #6B4226;
        }

        .bg-footer {
            background: linear-gradient(to right, #6B4226, #5a3b20);
        }

        .card-gradient {
            background: linear-gradient(to bottom right, #ffffff, #f5e8db);
        }

        .gradient-header {
            background: linear-gradient(to right, #E6C7A5, #d7b693);
            color: #6B4226;
        }

        .container {
            background: #f5e8db;
        }
    </style>
</head>

<body class="font-sans">

    <!-- Header Section -->
    @include('Superadmin.nav')


   <!-- Features Section -->
<!-- Features Header -->
<div class="gradient-header text-center py-16">
    <h1 class="text-4xl font-bold mb-4">Your Wallet. Your Way.</h1>
    <p class="text-lg max-w-2xl mx-auto">WalletWise offers a complete toolkit to help you stay on top of your finances, whether you're a student, professional, or entrepreneur. Explore the smart features that make money management simple and effective.</p>
</div>

<section class="container mx-auto py-16 px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-wallet text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Expense Tracking</h3>
            <p class="text-gray-600 mt-2">Log daily expenses with ease, categorize your spendings, and visualize where your money goes. Stay accountable with real-time insights and spending patterns.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-bell text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Smart Reminders</h3>
            <p class="text-gray-600 mt-2">Get timely notifications for recurring payments like rent, bills, and EMIs. Never worry about missing deadlines again.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-coins text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Multi-Currency Support</h3>
            <p class="text-gray-600 mt-2">Easily manage finances in different currencies. Ideal for international students, travelers, and remote professionals dealing with global payments.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-chart-line text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Income Reports</h3>
            <p class="text-gray-600 mt-2">Get detailed monthly, quarterly, and yearly reports to understand your income trends. Export them anytime for financial reviews or tax filings.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-cloud text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Cloud Sync</h3>
            <p class="text-gray-600 mt-2">Your data, always accessible. Sync across multiple devices and platforms to keep track wherever you go.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-shield-alt text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Secure & Private</h3>
            <p class="text-gray-600 mt-2">We prioritize your privacy. Bank-grade encryption keeps your financial data safe, and nothing is shared without your consent.</p>
        </div>

        <!-- Additional Features -->
        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-tags text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Custom Categories</h3>
            <p class="text-gray-600 mt-2">Create and organize your own spending categories to reflect your lifestyle. Whether it's food, travel, or education—you’re in control.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-bullseye text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Goal Setting</h3>
            <p class="text-gray-600 mt-2">Set financial goals and watch your progress in real time. Save for a new laptop, a trip, or simply build an emergency fund.</p>
        </div>

        <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
            <i class="fas fa-sync-alt text-3xl text-brown-600 mb-3"></i>
            <h3 class="text-xl font-bold">Recurring Transactions</h3>
            <p class="text-gray-600 mt-2">Automate weekly or monthly transactions to save time and avoid the hassle of manual entries.</p>
        </div>

    </div>
</section>

<!-- CTA Section -->
<div class="gradient-cta text-elegant py-16 text-center px-6">
    <h2 class="text-3xl font-bold mb-4">Ready to Take Control of Your Budget?</h2>
    <p class="text-lg max-w-2xl mx-auto">Whether you're planning for tomorrow or reviewing yesterday, WalletWise gives you the tools and insights you need. Join a growing community of users who are mastering their money—one transaction at a time.</p>
    <a href="/register" class="btn-elegant px-6 py-3 rounded-full font-semibold mt-6 inline-block hover:shadow-lg">Get Started</a>
</div>

    <!-- Footer -->
    @include('Superadmin.footer')
</body>

</html>