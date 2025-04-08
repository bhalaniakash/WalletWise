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
        <p class="text-lg">Explore features built for effortless financial control and clarity.</p>
    </div>

    <section class="container mx-auto py-16 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
                <i class="fas fa-wallet text-3xl text-brown-600 mb-3"></i>
                <h3 class="text-xl font-bold">Expense Tracking</h3>
                <p class="text-gray-600 mt-2">Monitor your spending with detailed breakdowns and insights.</p>
            </div>

            <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
                <i class="fas fa-bell text-3xl text-brown-600 mb-3"></i>
                <h3 class="text-xl font-bold">Smart Reminders</h3>
                <p class="text-gray-600 mt-2">Never miss rent, loans, or subscriptions with auto-reminders.</p>
            </div>

            <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
                <i class="fas fa-coins text-3xl text-brown-600 mb-3"></i>
                <h3 class="text-xl font-bold">Multi-Currency Support</h3>
                <p class="text-gray-600 mt-2">Manage finances in various currencies effortlessly.</p>
            </div>

            <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
                <i class="fas fa-chart-line text-3xl text-brown-600 mb-3"></i>
                <h3 class="text-xl font-bold">Income Reports</h3>
                <p class="text-gray-600 mt-2">Gain valuable insights with monthly & yearly reports.</p>
            </div>

            <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
                <i class="fas fa-cloud text-3xl text-brown-600 mb-3"></i>
                <h3 class="text-xl font-bold">Cloud Sync</h3>
                <p class="text-gray-600 mt-2">Access and manage your budget anytime, anywhere.</p>
            </div>

            <div class="card-gradient p-6 rounded-lg shadow-lg feature-card text-center">
                <i class="fas fa-shield-alt text-3xl text-brown-600 mb-3"></i>
                <h3 class="text-xl font-bold">Secure & Private</h3>
                <p class="text-gray-600 mt-2">Bank-level security ensures your data stays safe.</p>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <div class="gradient-cta text-elegant py-12 text-center">
        <h2 class="text-3xl font-bold">Ready to Take Control of Your Budget?</h2>
        <p class="mt-4 text-lg">Join WalletWise today and start managing your finances better.</p>
        <a href="/register"
            class="btn-elegant px-6 py-3 rounded-full font-semibold mt-6 inline-block hover:shadow-lg">Get
            Started</a>
    </div>

    <!-- Footer -->
    <footer class="bg-footer text-white py-6 text-center">
        <p>&copy; 2025 WalletWise. All rights reserved.</p>
    </footer>
</body>

</html>