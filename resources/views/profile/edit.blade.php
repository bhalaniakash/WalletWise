<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
      
        /* body {
            font-family: 'Poppins', sans-serif;
            background-color: #000; 
            color: white;
            margin: 0;
            padding-top: 70px; 
        } */

        /* Navbar Styling */
        .navbar {
            z-index: 1000;
        }

        /* Container Styling */
        .container {
            margin-top: 30px;
            position: relative;
        }

        /* Card Styling */
        .card {
            background-color: #fff; /* White cards */
            color: black;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(255, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(255, 0, 0, 0.3);
        }

        /* Ensure Cards are Same Height */
        .equal-height {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

       
        /* Button Styling */
        .btn-custom {
            background-color: #ff0000; 
            color: #fff; /* White text */
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 15px;
            transition: 0.3s ease;
        }

        .btn-custom:hover {
            background-color: black;
            color: white;
            border: 1px solid red;
        }
    </style>
</head>
<body>

    <!-- Include Sidebar & Header -->
    @include('shared.sidenav');
    @include('shared.header');

    <!-- Page Layout -->
    <x-app-layout>
        <div class="container mt-5">
            <h2 class="font-semibold text-xl mb-4">Profile</h2>
            
            <div class="row">
                
                <!-- Update Password Form -->
                <div class="col-md-6">
                    <div class="card p-4 mb-4 shadow-lg equal-height">
                        <h4 class="mb-3">Change Password</h4>
                        @include('profile.partials.update-password-form')
                        
                    </div>
                </div>
                
                <!-- Profile Update Form -->
                <div class="col-md-6">
                    <div class="card p-4 mb-4 shadow-lg equal-height">
                        <h4 class="mb-3">Update Profile Information</h4>
                        @include('profile.partials.update-profile-information-form')
                        
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="col-md-12">
                    <div class="card p-4 mb-4 shadow-lg">
                        <h4 class="mb-3 text-danger">Delete Account</h4>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>