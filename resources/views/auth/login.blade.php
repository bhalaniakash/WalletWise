<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>WalletWise Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #E6C7A5;
            height: 100vh;
        }

        .container {
            color: #6b4226;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
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

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        label {
            color: #555;
        }

        .remember-me {
            display: flex;
            /* justify-content: space-between; */
            align-items: center;

        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;

        }

        .form-footer a {
            margin-bottom: 10px;
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

        a {
            text-decoration: none;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-header">
            <img src="/img/logo-removebg-preview.png" alt="Logo">
            <h4>WalletWise</h4>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Sign in</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class=" remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>
            <div class="form-footer">
                <a href="{{ route('register') }}">Register here</a>
                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</body>

</html>