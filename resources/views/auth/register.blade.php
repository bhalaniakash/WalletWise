<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        }
        .container {
            background: white;
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
        .btn {
            background: #333;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: black;
            color: #fff;
        }
    </style>
    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            if (password.length < 8) {
                alert('Password must be at least 8 characters long.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <img src="/img/logo-removebg-preview.png" alt="Logo">
            <h4>WalletWise</h4>
        </div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <h2 class="text-center">Register Yourself</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input id="age" type="number" name="age" min="15" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input id="contact" type="number" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="plan_type">Plan Type</label>
                    <select id="plan_type" name="plan_type">
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="limit">Limit</label>
                    <input id="limit" type="number" name="limit" step="0.01" min="0" required>
                </div>
                <div class="form-group full-width">
                    <label for="profile_picture">Profile Picture</label>
                    <input id="profile_picture" type="file" class="btn btn-primary" name="profile_picture" accept="image/*">
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
