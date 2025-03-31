<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upgrade Plan</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #4c51bf, #6b46c1); /* Elegant gradient */
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Offset */
        .main-content {
            margin-left: 17rem; /* Adjust for sidebar */
            padding: 2rem;
            transition: all 0.3s ease-in-out;
        }

        /* Upgrade Plan Card */
        .page-content {
            max-width: 600px;
            margin: 5rem auto; /* Center horizontally */
            background: white;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
        }

        /* Form Input */
        .form-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            font-size: 1rem;
        }

        .form-input:focus {
            border-color: #6b46c1;
            outline: none;
            box-shadow: 0 0 8px rgba(107, 70, 193, 0.3);
        }

        /* Upgrade Button */
        .btn-upgrade {
            background: linear-gradient(to right, #6b46c1, #4c51bf);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-upgrade:hover {
            background: linear-gradient(to right, #4c51bf, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0px 8px 20px rgba(107, 70, 193, 0.3);
        }

        /* Footer */
        footer {
            margin-left: 17rem; 
            font-size: 0.875rem;
            padding: 1rem;
            text-align: center;
            color: white;
            position: fixed;
            bottom: 0;
            left: auto; /* Align with sidebar */
            width: calc(100% - 17rem); /* Adjust width */
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .page-content {
                margin-top: 3rem;
            }

            footer {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <!-- Main Content with Sidebar Offset -->
    <div class="main-content">
        <div class="page-content">
            <h2 class="text-2xl font-bold text-indigo-700">Upgrade Your Plan</h2>
            <p class="mt-2 text-gray-600 text-sm">
                Get access to premium features. Proceed carefully before making any payments.
            </p>
            
            <form method="POST" action="{{ route('payment') }}" class="mt-6">
                @csrf
                <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Amount</label>
                <input type="text" name="amount" id="amount" value="2000" class="form-input">
                
                <button class="btn-upgrade w-full mt-5">
                    Upgrade Plan
                </button>
            </form>
        </div>
    </div>
        
    <!-- Footer -->
    <footer>
        &copy; 2025 Super Admin Panel | All Rights Reserved
    </footer>

</body>
</html>
