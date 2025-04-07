<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Contact Us - WalletWise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            color: #6B4226;
        }

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

        .gradient-cta {
            background: linear-gradient(to right, #f2e4d5, #e6c7a5);
        }

        .gradient-footer {
            background: linear-gradient(to right, #6B4226, #5a3b20);
        }

        .text-elegant {
            color: #6B4226;
        }
    </style>
</head>

<body class="bg-[#f9f6f2] font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="logo m-2">
                <img src="/img/logo-removebg-preview.png" width="50px" height="50px" />
                <a href="#" class="text-2xl font-bold text-elegant">WalletWise</a>
            </div>

            <div class="hidden lg:flex space-x-6">
                <a href="{{ url('/Superadmin/Feature') }}" class="text-gray-600 hover:text-elegant">Features</a>
                <a href="#" class="text-gray-600 hover:text-elegant">Reminders</a>
                <a href="{{ url('/Superadmin/pricing') }}" class="text-gray-600 hover:text-elegant">Pricing</a>
                <a href="{{ url('/Superadmin/contactus') }}" class="text-gray-600 hover:text-elegant">Contact us</a>
                <a href="{{ url('login') }}" class="text-gray-600 hover:text-elegant">Log In</a>
                <a href="{{ url('register') }}" class="text-gray-600 hover:text-elegant">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold text-center mb-10 text-elegant">Contact Us</h2>
        <!-- Contact Section Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- Contact Info -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-elegant">
                <h3 class="text-xl font-bold mb-4">Get in Touch</h3>
                <p class="mb-2"><strong>Email:</strong> support@walletwise.com</p>
                <p class="mb-2"><strong>Phone:</strong> +91 98765 43210</p>
                <p class="mt-6">Connect with us here also:</p>
                <div class="flex space-x-4 mt-2">
                    <a href="#" class="text-elegant  hover:opacity-70"><i class="bi bi-instagram text-2xl"></i></a>
                    <a href="#" class="text-elegant hover:opacity-70"><i class="bi bi-twitter text-2xl"></i></a>
                    <a href="#" class="text-elegant hover:opacity-70"><i class="bi bi-linkedin text-2xl"></i></a>
                    <a href="#" class="text-elegant hover:opacity-70"><i class="bi bi-facebook text-2xl"></i></a>
                </div>
            </div>

            <!-- Contact Form Column (including success message) -->
            <div>
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                            onclick="this.parentElement.remove();">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 101.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z" />
                            </svg>
                        </button>
                    </div>
                @endif

                <form class="bg-white p-6 rounded-lg shadow-lg" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <input type="text" placeholder="Your Name" name="name"
                        class="w-full mb-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-elegant"
                        required>
                    <input type="email" placeholder="Your Email" name="email"
                        class="w-full mb-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-elegant"
                        required>
                    <textarea placeholder="Your Message" rows="5" name="message"
                        class="w-full mb-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-elegant"
                        required></textarea>
                    <button type="submit"
                        class="btn-elegant px-6 py-2 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">Send
                        Message</button>
                </form>
            </div>

        </div>
        <script>
            setTimeout(() => {
                const alert = document.querySelector('[role="alert"]');
                if (alert) alert.remove();
            }, 2000); // 2 seconds
        </script>

    </section>

    <!-- CTA Section -->
    <div class="gradient-cta text-elegant py-12 text-center">
        <h2 class="text-3xl font-bold">Need Help Managing Your Money?</h2>
        <p class="mt-4 text-lg">WalletWise is here to support your journey. Let’s talk!</p>
        <a href="/register"
            class="btn-elegant px-6 py-3 rounded-full font-semibold mt-6 inline-block hover:shadow-lg">Join Now</a>
    </div>

    <!-- Footer -->
    <footer class="gradient-footer text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 WalletWise. Designed to simplify your finances.</p>
        </div>
    </footer>

</body>

</html>