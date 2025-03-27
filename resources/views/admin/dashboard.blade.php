<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial, sans-serif';
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
            font-family: 'Arial, sans-serif';
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
            font-family: 'Arial, sans-serif';
        }

        #page-wrapper {
            background-color: #616b6b;
            border-radius: 8px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            font-family: 'Arial, sans-serif';
        }
        .text-center{
            
        }
        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: white;
            font-family: 'Arial, sans-serif';
        }

        .container {
            margin-top: 2rem;
            /* height:100%; */
            font-family: 'Arial, sans-serif';
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
        .col-md-5{
            margin: auto;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
           
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
            /* color: #343a40;
            text-align: center;
            background-color: rgb(217, 217, 217);
            padding: 1%;
            border-radius: 50px;
            font-family: 'Arial, sans-serif';  */
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
            color: #515355;
            font-weight: 600;
        }
    </style>
    <br>
    @include('shared.header')
    @include('shared.sidenav_admin')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    </script>
</head>
<style>
    /* Admin Dashboard Title */
    .admin-dashboard-title {
        font-size: 28px;
        font-weight: bold;
        color: white;
        background: linear-gradient(to right, #666, #222);
        /* Matching shade */
        padding: 12px 20px;
        border-radius: 8px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    }

    /* Dashboard Cards */
    .dashboard-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .dashboard-card:hover {
        box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Sidebar */
    .sidebar-item {
        color: white;
        padding: 12px;
        display: flex;
        align-items: center;
        border-radius: 5px;
    }

    .sidebar-item:hover,
    .sidebar-item.active {
        background: linear-gradient(to right, #444, #000);
        font-weight: bold;
    }

    /* Icons */
    .card-icon {
        font-size: 24px;
        color: #333;
    }

    .card-number {
        font-size: 28px;
        font-weight: bold;
        color: #222;
    }
    #row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Ensures both cards stay in one row */
}
</style>

<body>
    <br>
    <div class="page-content" id="content">
        <div>
            <h1 class="admin-dashboard-title">Admin Dashboard</h1>
        </div>

        <div class="container">
            <div class="row mb-2" id="row">
                <div class="col-md-5">
                        <div class="dashboard-card">
                            <i class="fas fa-users card-icon"></i>
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-number">{{$totalUsers->where('is_Admin', '!=', 'Yes')->count('id')}}</p>
                        </div>
                </div>
                <div class="col-md-5">
                        <div class="dashboard-card">
                            <i class="fas fa-user-slash"></i>
                            <h5 class="card-title">Inactive Users</h5>
                            @php
                                $inactiveUsers = collect([]);

                                $expenseUsers = $expenseReport->where('is_Admin', '!=', 'Yes')
                                    ->where('updated_at', '<', now()->subHours(1))
                                    ->pluck('user_id');

                                $incomeUsers = $incomeReport->where('is_Admin', '!=', 'Yes')
                                    ->where('updated_at', '<', now()->subHours(1))
                                    ->pluck('user_id');

                                $inactiveUsers = $expenseUsers->merge($incomeUsers)->unique();
                            @endphp
                            <p class="card-number">{{ $inactiveUsers->count() }}</p>
                        </div>
                </div>
            </div>
            <div class="row mt-2" id="row">
                <div class="col-md-5">
                    
                        <div class="dashboard-card">
                            <i class="fas fa-layer-group"></i>
                            <h5 class="card-title">Total Income Categories</h5>
                            <p class="card-number">{{$income = $categories->where('type', 'income')->count()}}</p>
                        </div>
                    
                </div>
                <div class="col-md-5">
                    
                        <div class="dashboard-card">
                            <i class="fas fa-wallet"></i>
                            <h5 class="card-title">Total Expense Categories</h5>
                            <p class="card-icon">{{$expense = $categories->where('type', 'expense')->count()}}</p>
                        </div>
                    
                </div>
            </div>
            <div class="row">
                <!-- Chart Section -->
                <div class="d-flex flex-wrap justify-content-between mt-4">
                    <div class="card flex-fill mx-2">
                        <div class="card-body text-center">
                            <h5 class="card-title">User Statistics</h5>
                            <canvas id="user"></canvas>
                        </div>
                    </div>
                    <div class="card flex-fill mx-2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Income Statistics</h5>
                            <canvas id="income"></canvas>
                        </div>
                    </div>
                    <div class="card flex-fill mx-2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Expense Statistics</h5>
                            <canvas id="expense"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@php

    // chart 1
    $inactiveUsers = collect([]);
    $expenseUsers = $expenseReport->where('is_Admin', '!=', 'Yes')
        ->where('updated_at', '<', now()->subHours(1))
        ->pluck('user_id');
    $incomeUsers = $incomeReport->where('is_Admin', '!=', 'Yes')
        ->where('updated_at', '<', now()->subHours(1))
        ->pluck('user_id');
    $inactiveUsers = $expenseUsers->merge($incomeUsers)->unique();
    $totalUsers = $totalUsers->where('is_Admin', '!=', 'Yes');

    function generateRandomColor()
    {
        return 'rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')';
    }
    // chart 2

    $categoryWiseIncome = $incomeReport
        ->groupBy('category_id')
        ->map(fn($items) => $items->sum('amount'));
    $labels = $categories->where('type', 'income')->pluck('name');
    $incomeColors = collect($labels)->map(fn() => generateRandomColor())->toArray();

    //cahrt 3 

    $categoryWiseExpenses = $expenseReport
        ->groupBy('category_id')
        ->map(fn($items) => $items->sum('amount'));
    $labelse = $categories->where('type', 'expense')->pluck('name');
    $expenseColors = collect($labelse)->map(fn() => generateRandomColor())->toArray();
    // dd($categoryWiseExpenses);
@endphp
<script>
    // cahrt 1
    const ctx = document.getElementById('user');
    var Labels = ['Total Users', 'Inactive Users'];
    var userCount = [{{$totalUsers->count()}}, {{$inactiveUsers->count()}}];
    var userColors = ['#007bff', '#ff4d4d'];
    const data = {
        labels: Labels,
        datasets: [{
            label: 'Users statistics',
            data: userCount,
            backgroundColor: userColors,
            hoverOffset: 4
        }]
    };
    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            plugins: {
                legend: {
                    labels: {
                        usePointStyle: false,
                        boxWidth: 0,
                        generateLabels: function (chart) {
                            let labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                            labels.forEach(label => {
                                label.hidden = false;
                                label.fillStyle = 'transparent';
                            });
                            return labels;
                        }
                    }
                }
            }
        }
    });

    // cahrt 2
    const ctx2 = document.getElementById('income');
    var Labels = @json($labels);
    var income = @json($categoryWiseIncome->values());
    var incomeColors = @json($incomeColors);
    const data2 = {
        labels: Labels,
        datasets: [{
            label: 'Income statistics',
            data: income,
            backgroundColor: incomeColors,
            hoverOffset: 4
        }]
    };
    new Chart(ctx2, {
        type: 'doughnut',
        data: data2,
        options: {
            plugins: {
                legend: {
                    labels: {
                        usePointStyle: false,
                        boxWidth: 0,
                        generateLabels: function (chart) {
                            let labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                            labels.forEach(label => {
                                label.hidden = false;
                                label.fillStyle = 'transparent';
                            });
                            return labels;
                        }
                    }
                }
            }
        }
    });

    //chart 3
    const ctx3 = document.getElementById('expense');
    var Labels = @json($labelse);
    var expense = @json($categoryWiseExpenses->values());
    var expenseColors = @json($expenseColors);
    const data3 = {
        labels: Labels,
        datasets: [{
            label: 'Expense statistics',
            data: expense,
            backgroundColor: expenseColors,
            hoverOffset: 4
        }]
    };

    new Chart(ctx3, {
        type: 'doughnut',
        data: data3,
        options: {
            plugins: {
                legend: {
                    labels: {
                        usePointStyle: false,
                        boxWidth: 0,
                        generateLabels: function (chart) {
                            let labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                            labels.forEach(label => {
                                label.hidden = false;
                                label.fillStyle = 'transparent';
                            });
                            return labels;
                        }
                    }
                }
            }
        }
    });

</script>

</html>