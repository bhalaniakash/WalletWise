<br>
@include('shared.header')
@include('shared.sidenav_admin')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            margin-top: 5% !important;
            width: calc(100% - 18rem);
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
        }

        #page-wrapper {
            background-color: #616b6b;
            border-radius: 8px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: white;
        }

        .container {
            margin-top: 2rem;
            /* height:100%; */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .col-md-4 {
            flex: 1 1 calc(33.333% - 1.5rem);
            width: calc(33.333% - 1.5rem);
            display: flex;
            gap: 1.5rem;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 1rem;
            color: #343a40;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 4px;
           
            color: #ffffff;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #6c7176;
            transform: scale(1.05);
        }

        p {
            font-size: 1rem;
            color: #6c757d;
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
                            {{-- this is an code for get total user count --}}
                            <p>{{$totalUsers->where('is_Admin', '!=', 'Yes')->count('id')}}</p>
                            <a href="{{url('/admin/members')}}" class="btn btn-dark">View Users</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inactive Users</h5>
                            {{-- this is an code to get the user data  who is not done anything from last 7 days(1 week) --}}
                            @php
                                $inactiveUsers = $expenseReport->where('is_Admin', '!=', 'Yes')->where('updated_at', '<', now()->subHour(1))->merge($incomeReport->where('is_Admin', '!=', 'Yes')->where('updated_at', '<', now()->subHour(1)));
                            @endphp
                            <p>{{$inactiveUsers->count()}}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
       
</body>
</html>