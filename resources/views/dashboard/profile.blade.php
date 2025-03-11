<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <base href="/expenseMVC/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="link/link.css">
    <script type="text/javascript" src="lib/js/main.js"></script>
    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f8f9fa; /* Light background color */
            color: #343a40; /* Dark text color */
            font-family: Arial, sans-serif; /* Font family */
            margin: 0;
            padding: 0;
        }
        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            padding: 2rem;
              color: #000;
            background-color: white;
        }
        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .container-fluid {
            color: #000;
        }
        .card {
            background-color: #ffffff; /* White background for cards */
            border: 1px solid #dee2e6; /* Light border */
            border-radius: 0.25rem; /* Rounded corners */
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); /* Subtle shadow */
            margin-bottom: 1rem;
        }
        .card h5, .card p, .card label {
            color: #343a40; /* Dark text color */
        }
        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff; /* Bootstrap primary color */
            color: #fff; /* White text */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
            border-color: #0056b3; /* Darker shade on hover */
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        header h5 {
            margin-bottom: 1rem;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        .text-center {
            text-align: center;
        }
        .pt-2 {
            padding-top: 0.5rem;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }
        .pl-2 {
            padding-left: 0.5rem;
        }
        .pr-2 {
            padding-right: 0.5rem;
        }
        .shadow {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>
</head>
<body>
@include('shared.sidenav')
@include('shared.header')
    <div class="page-content" id="content">
        <br>
        <div class="container-fluid shadow" style="margin=10px;">
          
                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;  gap: 10px; margin=10px;">
                    <div class="card pl-2 pr-2">
                        <img src="/img/logo-removebg-preview.png" width="150" height="150" style="color: white; margin: 10px;"/>
                    </div>
                    <div class="card pl-2 pr-2" style=" width: 100%; height:150px " >
                        <p>Name: </p>
                        <p>Email: </p>
                        <p>Gender: </p>
                    </div>
                </div>
           
            <br>
            <section class="container-fluid">
                <div class="card pl-2 pr-2">
                    <header><h5 class="text-uppercase pl-2 pt-2"><u>Change Password</u></h5></header>
                    <form>
                        <div class="form-group">       
                            <label>Current Password</label>
                            <input type="password" placeholder="Password" name="Current" class="form-control" required>
                        </div>
                        <div class="form-group">       
                            <label>New Password</label>
                            <input type="password" id="pwd" placeholder="Password" name="New" class="form-control" required>
                        </div>
                        <div class="form-group">       
                            <label>Confirm New Password</label>
                            <input type="password" id="cpwd" placeholder="Password" name="confirm" class="form-control" required>
                        </div>
                        <div id="Error"></div>
                        <div class="form-group">       
                            <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script type="text/javascript" src="lib/js/password.js"></script>
</body>
</html>
