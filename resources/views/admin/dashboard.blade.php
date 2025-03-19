<br>
@include('shared.header');
@include('shared.sidenav_admin');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            margin-top: 5% !important;
            width: calc(100% - 18rem);
            padding: 1rem;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
        }

        #page-wrapper {
            
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    </script>
</head>
<body>
    <br>
    <div class="page-content" id="content">
        <div id="page-wrapper">
            <h1>Admin Dashboard</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                      
                                <p>{{$totalUsers->count('id')}}</p>
                               
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>
