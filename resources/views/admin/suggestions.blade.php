<link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
<!DOCTYPE html>
<br>
@include('shared.header')
@include('shared.sidenav_admin')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Admin Dashboard</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@300;400;700&family=Lato:wght@300;400;700&display=swap');

        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            background: #F3E5D8;
        }

        .main-page {
            margin-bottom: -100px;
            background: #F3E5D8;


        }

        .page-content {
            margin-left: 17rem;
            transition: all 0.4s;
            margin-top: 5% !important;
            width: calc(100% - 18rem);
            padding: 2rem;
            background: #F3E5D8;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
            font-family: 'Lato', sans-serif;
        }

        #page-wrapper {
            background-color: #616b6b;
            border-radius: 8px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            font-family: 'Inter', sans-serif;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #6b4226;
            /* font-family: 'Inter', sans-serif; */
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
            font-family: 'Lato', sans-serif;
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
            color: #6b4226;
        }

        button[type="submit"] {
            background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background: #8b6f4e;
            cursor: pointer;
        }

        p {
            font-size: 1rem;
            color: #6c757d;
        }

        .admin-dashboard-title {
            font-size: 28px;
            font-weight: bold;
            color: #6B4226;
            /* padding: 12px 20px; */
            margin: 0px 0px 15px 2px;
            border-radius: 8px;
            text-align: left;
        }

        .dashboard-card {
            background: white;
            color: #6b4226;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            width: 30%;
        }

        .dashboard-card:hover {
            box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
            color: #6b4226;
        }

        .card-number {
            font-size: 28px;
            font-weight: bold;
            color: #6b4226;
        }


        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .chart1 {
            display: flex;
            gap: 1.5rem;
            border-radius: 2%;
            box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    </script>
</head>

<body>
    <div class="main-page">
        <div class="page-content" id="content">
            <div>
                <h1 class="admin-dashboard-title">Suggestions by visitors</h1>
            </div>

            <div class="row mb-2 align-items-start">
                @foreach ($suggestions as $suggestion)
                    <div class="dashboard-card text-left
                                @if ($loop->last && $loop->count % 3 == 1) col-span-3
                                @elseif ($loop->last && $loop->count % 3 == 2) col-span-2
                                @endif">
                        <p class="card-title font-semibold">{{ $suggestion->name }}</p>
                        <p>{{ $suggestion->message }}</p>
                    </div>
                @endforeach

            </div>
            <br>
        </div>
    </div>
</body>