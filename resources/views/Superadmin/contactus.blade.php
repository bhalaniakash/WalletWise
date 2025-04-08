<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - WalletWise</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      color: #6B4226;
    }

    .btn-elegant {
      background-color: #6B4226;
      color: white;
    }

    .btn-elegant:hover {
      background-color: #5A3821;
    }

    .gradient-header {
      background: linear-gradient(to right, #E6C7A5, #D4B08A);
    }

    .gradient-cta {
      background: linear-gradient(to right, #f2e4d5, #e6c7a5);
    }

    .gradient-footer {
      background: linear-gradient(to right, #6B4226, #5a3b20);
    }

    .contact-card:hover {
      transform: translateY(-6px);
      transition: all 0.3s ease-in-out;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .container-bg {
      background-color: #f5e8db;
    }

    input:focus,
    textarea:focus {
      outline: none;
      border-color: #6B4226;
      box-shadow: 0 0 0 3px rgba(107, 66, 38, 0.2);
    }
  </style>
</head>

<body class="bg-[#f9f6f2] font-sans">

  <!-- Navbar -->
  @include('Superadmin.nav')

  <!-- Hero Header -->
  <header class="gradient-header text-center py-20 px-4">
    <h1 class="text-5xl font-extrabold mb-4">Let’s Connect</h1>
    <p class="text-lg max-w-2xl mx-auto">Got a question or just want to say hello? We’d love to hear from you.</p>
  </header>

  <!-- Contact Section -->
  <section class="container-bg py-20 px-6 md:px-20">
    <div class="grid md:grid-cols-2 gap-12 max-w-7xl mx-auto">

      <!-- Contact Info Card -->
      <div class="bg-white p-8 rounded-2xl shadow-md contact-card">
        <h2 class="text-2xl font-bold mb-6">Reach Out</h2>
        <p class="mb-3"><strong>Email:</strong> <a href="mailto:support@walletwise.com"
            class="underline hover:text-[#5A3821]">support@walletwise.com</a></p>
        <p class="mb-6"><strong>Phone:</strong> +91 98765 43210</p>
        <p class="mb-4">Connect with us on social media:</p>
        <div class="flex gap-6 mt-2 text-2xl">
          <a href="#" class="hover:text-[#5A3821]"><i class="bi bi-instagram"></i></a>
          <a href="#" class="hover:text-[#5A3821]"><i class="bi bi-twitter"></i></a>
          <a href="#" class="hover:text-[#5A3821]"><i class="bi bi-linkedin"></i></a>
          <a href="#" class="hover:text-[#5A3821]"><i class="bi bi-facebook"></i></a>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="bg-white p-8 rounded-2xl shadow-md contact-card">
        @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
        onclick="this.parentElement.remove();">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20">
          <title>Close</title>
          <path
          d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 101.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z" />
        </svg>
        </button>
      </div>
    @endif

        <form method="POST" action="{{ route('contact.store') }}">
          @csrf
          <input type="text" name="name" placeholder="Your Name" required
            class="w-full mb-4 p-3 border border-gray-300 rounded-lg" />
          <input type="email" name="email" placeholder="Your Email" required
            class="w-full mb-4 p-3 border border-gray-300 rounded-lg" />
          <textarea name="message" rows="5" placeholder="Your Message" required
            class="w-full mb-4 p-3 border border-gray-300 rounded-lg"></textarea>
          <button type="submit"
            class="btn-elegant px-6 py-3 rounded-full w-full font-semibold transition duration-300 shadow hover:shadow-lg">Send
            Message</button>
        </form>
      </div>

    </div>
    <script>
      setTimeout(() => {
        const alert = document.querySelector('[role="alert"]');
        if (alert) alert.remove();
      }, 2000);
    </script>
  </section>

  <!-- CTA Section -->
  <section class="gradient-cta py-16 text-center">
    <h2 class="text-3xl md:text-4xl font-bold">Need Help Managing Your Money?</h2>
    <p class="mt-4 text-lg max-w-xl mx-auto">WalletWise is here to support your journey. Let’s talk!</p>
    <a href="/register"
      class="btn-elegant mt-6 inline-block px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transition">Join
      Now</a>
  </section>

   <!-- Footer -->
   @include('Superadmin.footer')
</body>

</html>