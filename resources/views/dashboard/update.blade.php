<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upgrade Plan</title>

    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ... (Your existing styles remain the same) ... */
        .plan-box {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
            margin: 2rem auto;
        }

        button[type="submit"] {
            background: #6B4226;
            color: white;
            padding: 8px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.3rem;
            transition: all 0.3s ease-in-out;
            width: 100%;
            border: none;
        }

        button[type="submit"]:hover {
            background: #4E2F1E;
            cursor: pointer;
        }

        .plan-option {
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            width: 45%;
        }

        .current-plan {
            background-color: #f5e4d0;
        }

        .upgrade-plan {
            border: 1px solid #ccc;
            cursor: pointer;
            transition: box-shadow 0.3s ease;
        }

        .upgrade-plan:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .selected {
            border: 2px solid #3b82f6;
        }

        .payment-summary {
            background-color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
            text-align: center;
        }

        .main-content {
            margin-top: 5rem;
            margin-left: 17rem;
        }

        .plan-option {
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .current-plan {
            background-color: #f8f8f8;
            color: #6B4226;
            opacity: 0.5;
            /* Disabled effect */
            pointer-events: none;
            /* Disable clicks */
        }

        .upgrade-plan {
            background-color: #fffbe6;
            border: 2px solid #6B4226;
            cursor: pointer;
        }

        .upgrade-plan:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-[#F3E5D8]">
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <div class="main-content flex justify-center items-center min-h-screen p-6">
        <div class="p-6 rounded-lg shadow-lg max-w-md w-full bg-white">
            <h2 class="text-2xl font-bold text-[#6b4226]">Upgrade Your Plan</h2>
            <p class="mt-2 text-gray-600 text-sm">
                Get access to premium features. Proceed carefully before making any payments.
            </p>

            <div class="plan-box flex justify-center gap-6 mt-6">
                
                <!-- Current Plan (Disabled) -->
                <div
                    class="plan-option current-plan flex flex-col items-center rounded-lg shadow-md bg-gray-200 opacity-60">
                    <p class="text-gray-600 text-sm">CURRENT PLAN</p>
                    <p class="text-lg font-semibold text-[#6B4226]">Single Device</p>
                    <p class="text-xl font-bold">&#8377;0<span class="text-sm">/Month</span></p>
                </div>

                <!-- Upgrade Plan -->
                <div
                    class="plan-option upgrade-plan flex flex-col items-center rounded-lg shadow-md border border-[#6B4226] bg-[#FFFAE6] cursor-pointer transition hover:scale-105 hover:shadow-lg">
                    <p class="text-sm text-blue-600 font-semibold">UPGRADE TO</p>
                    <p class="text-lg font-bold text-[#6B4226]">Premium</p>
                    <p class="text-xl font-bold">&#8377;499<span class="text-sm">/- Month</span></p>
                </div>
            </div>

            <form method="POST" action="{{ route('payment') }}" class="mt-6">
                @csrf
                <div class="bg-white shadow-lg rounded-lg p-6 w-100 mx-auto">
                    <h2 class="text-lg font-semibold text-gray-700">You Pay</h2>
                    <p class="text-3xl font-bold text-[#6B4226] mt-2">&#8377;499</p>
                    <div class="mt-4 text-sm text-gray-600 space-y-1">
                        <p class="flex justify-between">
                            <span>Premium 3-Month Plan Price</span>
                            <span class="font-medium">&#8377;499</span>
                        </p>
                        <p class="flex justify-between text-red-500">
                            <span>Remaining Amount in Your Plan</span>
                            <span>-&#8377;499</span>
                        </p>
                        <hr class="border-gray-300 my-2">
                        <p class="flex justify-between text-gray-900 font-semibold">
                            <span>Amount Payable</span>
                            <span>&#8377;499</span>
                        </p>
                    </div>
                </div>
                <input type="hidden" name="amount" value="499">
                <button type="submit"
                    class="w-full mt-4 bg-[#A08963] text-white py-3 rounded-lg font-semibold hover:bg-[#c8c6b6] hover:shadow-lg transition">
                    Upgrade Now
                </button>
            </form>
        </div>
    </div>
</body>
</html>