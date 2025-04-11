<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>WalletWise Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #E6C7A5;
        }

        .container {
            color: #6b4226;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header img {
            width: 80px;
            height: auto;
            border: 3px solid #111010;
            border-radius: 50%;
        }

        .form-header h4 {
            font-size: 24px;
            margin-top: 10px;
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            width: 48%;
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        label {
            color: #555;
        }

        .full-width {
            width: 100%;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #555;
            text-decoration: none;
        }

        button[type="submit"] {
            background: #6b4226;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            border: none;
        }

        button[type="submit"]:hover {
            background: #3b2314;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .card-gradient {
            background: linear-gradient(to bottom right, #ffffff, #f5e8db);
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text);
            font-size: 0.9rem;
        }

         /* File input styling */
         .file-input-container {
            position: relative;
            margin-top: 0.5rem;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1rem;
            background-color: #f9f9f9;
            border: 1px dashed var(--border);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            background-color: #f0f0f0;
            border-color: var(--primary);
        }

        .file-input-label svg {
            width: 20px;
            height: 20px;
            fill: var(--primary);
        }

        .file-input-text {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        #profile_picture {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--text-light);
            display: none;
        }


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }

            .form-group {
                width: 100%;
            }
        }

         /* Animation */
         @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            animation: fadeIn 0.4s ease forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .form-group:nth-child(7) { animation-delay: 0.7s; }
    </style>
</head>

<body>
    <div class="container card-gradient">
        <div class="form-header">
            <img src="/img/logo-removebg-preview.png" alt="WalletWise Logo">
            <h4>WalletWise</h4>
            <p>Take control of your finances with our smart budgeting tools</p>
        </div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            {{-- <input type="hidden" name="plan_type" value="regular"> --}}
            {{-- <input type="hidden" name="role" value="user"> --}}
            @csrf
            <h2 class="text-center">Register Yourself</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="name" placeholder="John Doe" required>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="john@example.com" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" required>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input id="age" type="number" name="age" min="15" placeholder="18" required>
                    @error('age') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="contact">Phone Number</label>
                    <input id="contact" type="tel" name="contact" placeholder="+1 234 567 8900" required>
                    @error('contact') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group full-width">
                    <label>Profile Picture</label>
                    <div class="file-input-container">
                        <label for="profile_picture" class="file-input-label">
                          
                            <span class="file-input-text">Choose a file or drag & drop here</span>
                        </label>
                        <input id="profile_picture" type="file" name="profile_picture" accept="image/*">
                        <div class="file-name" id="file-name">No file chosen</div>
                    </div>
                    @error('profile_picture') <span class="error">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="form-footer">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit" class="btn">Register</button>
            </div>
        </form>
    </div>
</body>

</html>