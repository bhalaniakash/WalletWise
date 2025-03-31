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
            background: #C9B194;
            border-radius: 12px;
            box-shadow: 0px 10px 30px #d3d2c5(0, 0, 0, 0.1);
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
            border-color: burlywood;
            outline: none;
            box-shadow: 0 0 8px burlywood;
        }

        /* Upgrade Button */
        .btn-upgrade {
            background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-upgrade:hover {
            background: ##c8c6b6;
            transform: translateY(-2px);
            box-shadow: 0px 8px 20px #3a392c;
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
    
</body>
</html>
