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
    <br>
    @include('shared.header')
    @include('shared.sidenav_admin')

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
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            {{-- this is an code for get total user count --}}
                            <p>{{$totalUsers->where('is_Admin', '!=', 'Yes')->count('id')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inactive Users</h5>
                            {{-- this is an code to get the user data who is not done anything from last 7 days(1 week)
                            --}}
                            @php
                                $inactiveUsers = collect([]);

                                // Extract user IDs from both reports
                                $expenseUsers = $expenseReport->where('is_Admin', '!=', 'Yes')
                                    ->where('updated_at', '<', now()->subHour(1))
                                    ->pluck('user_id');

                                $incomeUsers = $incomeReport->where('is_Admin', '!=', 'Yes')
                                    ->where('updated_at', '<', now()->subHour(1))
                                    ->pluck('user_id');

                                // Merge, make unique, and count
                                $inactiveUsers = $expenseUsers->merge($incomeUsers)->unique();
                            @endphp
                            <p>{{ $inactiveUsers->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Income Categories</h5>
                            {{-- this is an code for get total user count --}}
                            <p>{{$income = $categories->where('type', 'income')->count()}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Expense Categories</h5>
                            {{-- this is an code for get total user count --}}
                            <p>{{$expense = $categories->where('type', 'expense')->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-body">
                        <div id="piechart">
                            <canvas id="user"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <div id="piechart">
                            <canvas id="income"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <div id="piechart">
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
        ->where('updated_at', '<', now()->subHour(1))
        ->pluck('user_id');
    $incomeUsers = $incomeReport->where('is_Admin', '!=', 'Yes')
        ->where('updated_at', '<', now()->subHour(1))
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