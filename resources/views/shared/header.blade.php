<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
    <script src="lib/bootstrap/js/jquery.slim.min.js"></script>
    <script src="lib/bootstrap/js/poper.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap/js/jquery-3.5.1.min.js"></script>

    <title>header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">
    <link href="{{ asset('link/link.php') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style type="text/css">
        .sb-topnav {
            width: calc(100% - 16rem);
            margin-left: 16rem;
            transition: all 0.4s;
        }

        #content.active {
            width: 100%;
            margin: 0;
        }

        button i {
            font-size: 30px;
        }

        .navbar-brand {
            font-size: 30px;
            color: aliceblue;
            text-decoration: none;
        }

        button i:hover {
            color: cyan !important;

        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 20px;
            }

            .navbar-bar img {
                height: 35px;
                width: 35px;
            }

            #content {
                width: 100%;
                margin: 0;
            }

            #content.active {
                margin-left: 16rem;
                width: calc(100% - 16rem);
            }

            button i {
                font-size: 20px;
            }

        }
    </style>
</head>

<body>

    <nav class="sb-topnav navbar navbar-expand navbar-dark w-100 " id="content" style="background-color: #343a40">
        <button class="btn btn-link btn-sm order-lg-0 ml-lg-3 btn-outline-dark" id="sidebarToggle" href="#">
            <i class="fas fa-bars text-light"></i>
        </button>
        &nbsp;
        &nbsp;
        <a class="navbar-brand" href="Dashboard/index">
            <img src="img/logo.png" width="40" height="40" style="color: white;" alt="" />Income and Expenses Tracker System
        </a>



    </nav>

    <script type="text/javascript" src="../../lib/js/main.js"></script>
</body>

</html>