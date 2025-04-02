<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
            border-radius: 8px;
            margin: 2rem auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          
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
        }
    </style>
</head>

<body class="bg-[#F3E5D8]">
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <div class="main-content p-6">
        <div class="page-content p-6 rounded-lg shadow-lg max-w-md w-full mx-auto">

            <h2 class="text-2xl font-bold text-[#6b4226]">Upgrade Your Plan</h2>
            <p class="mt-2 text-gray-600 text-sm">
                Get access to premium features. Proceed carefully before making any payments.
            </p>

            <style>
                .plan-box {
                    display: flex;
                    gap: 20px;
                    justify-content: center;
                }
            
                .plan-option {
                    width: 220px;
                    padding: 20px;
                    border-radius: 12px;
                    text-align: center;
                    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s, box-shadow 0.3s;
                }
            
                .current-plan {
                    background-color: #f8f8f8;
                    color: #6B4226;
                    opacity: 0.5; /* Disabled effect */
                    pointer-events: none; /* Disable clicks */
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
            
            <div class="plan-box">
                <!-- Current Plan (Disabled) -->
                <div class="plan-option current-plan">
                    <p class="text-gray-600 text-sm">CURRENT PLAN</p>
                    <p class="text-lg font-semibold text-[#6B4226]">Single Device</p>
                    <p class="text-xl font-bold">&#8377;0<span class="text-sm">/Month</span></p>
                </div>
            
                <!-- Upgrade Plan -->
                <div class="plan-option upgrade-plan">
                    <p class="text-sm text-blue-600 font-semibold">UPGRADE TO</p>
                    <p class="text-lg font-bold text-[#6b4226]">Premium</p>
                    <p class="text-xl font-bold">&#8377;2000<span class="text-sm">/Months</span></p>
                </div>
            </div>
            
            <form method="POST" action="{{ route('payment') }}" class="mt-6">
                @csrf
                <div class="payment-summary">
                    <p class="text-gray-700">You Pay</p>
                    <p class="text-2xl font-bold text-[#6B4226]">&#8377;2000</p>
                    <p class="text-sm text-gray-500">
                        Premium 3 Month Plan Price &#8377;2000 <br>
                        Remaining amount in your current plan -&#8377;2000 <br>
                        Amount Payable &#8377;2000
                    </p>
                </div>

                <input type="hidden" name="amount" value="2000">

                <button type="submit" class="w-full mt-5 bg-[#A08963] text-white py-3 rounded-lg font-semibold hover:bg-[#c8c6b6] hover:shadow-lg transition">
                    Upgrade Now
                </button>
            </form>
        </div>
    </div>
       
</body>
</html>