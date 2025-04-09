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
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
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
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
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
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
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
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
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
            width: 48%;
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
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
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .chart1 {
            display: flex;
            gap: 1.5rem;
            border-radius: 2%;
            box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-gradient {
            background: linear-gradient(to bottom right, #ffffff, #f5e8db);
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
                <h1 class="admin-dashboard-title">Admin Dashboard</h1>
            </div>

            <div class="row mb-2" class="row">
                <div class="dashboard-card card-gradient">
                    <a href="{{ url('/admin/members') }}" style="text-decoration: none">
                        <h5 class="card-title">
                            <i class="fas fa-users "></i>
                            Total Users
                        </h5>
                        <p class="card-number">{{$totalUsers->where('is_Admin', '!=', 'Yes')->count('id')}}</p>
                    </a>
                </div>
                <div class="dashboard-card card-gradient">
                    <a href="{{ url('/admin/members') }}" style="text-decoration: none">
                        <h5 class="card-title">
                            <i class="fas fa-user-slash"></i>
                            Inactive Users
                        </h5>
                        @php
                            use App\Models\User;

                            // Step 1: Collect user_ids from reports
                            $reportedUserIds = $expenseReport->pluck('user_id')
                                ->merge($incomeReport->pluck('user_id'))
                                ->unique();

                            // Step 2: Get users who are either:
                            // A. In the reports and inactive (based on your condition)
                            $inactiveUserIds = $expenseReport->concat($incomeReport)
                                ->where('is_Admin', '!=', 'Yes')
                                ->where('updated_at', '<', \Carbon\Carbon::now()->subWeek())
                                ->pluck('user_id')
                                ->unique();

                            // B. OR not in any reports (no activity at all)
                            $usersWithNoData = User::whereNotIn('id', $reportedUserIds)
                                ->where('is_Admin', '!=', 'Yes')
                                ->pluck('id');

                            // Final Merge
                            $allInactiveUserIds = $inactiveUserIds->merge($usersWithNoData)->unique();

                            // dd($allInactiveUserIds);
                        @endphp

                        <p class="card-number">{{ $allInactiveUserIds->count() }}</p>
                    </a>
                </div>
            </div>
            <div class="row mt-2" class="row">
                <div class="dashboard-card card-gradient">
                    <a href="{{ url('/admin/payment') }}" style="text-decoration: none">
                        <h5 class="card-title">
                            <i class="fas fa-gem"></i>
                            Total Premium Users
                        </h5>
                        <p class="card-number">
                            {{$users = User::where('is_Admin', 'No')->where('plan_type', 'premium')->count()}}
                        </p>
                    </a>
                </div>
                <div class="dashboard-card card-gradient">
                    <a href="{{ url('/admin/members') }}" style="text-decoration: none">
                        <h5 class="card-title">
                            <i class="fas fa-user"></i>
                            Total Regular Users
                        </h5>
                        <p class="card-number">
                            {{$users = User::where('is_Admin', 'No')->where('plan_type', 'regular')->count()}}
                        </p>
                    </a>
                </div>
            </div>
            <div class="row mt-2" class="row">
                <div class="dashboard-card card-gradient">
                    <a href="{{ url('/admin/showCategory') }}" style="text-decoration: none">
                        <h5 class="card-title">
                            <i class="fas fa-layer-group"></i>
                            Total Income Categories
                        </h5>
                        <p class="card-number">{{$income = $categories->where('type', 'income')->count()}}</p>
                    </a>
                </div>
                <div class="dashboard-card card-gradient">
                    <a href="{{ url('/admin/showCategory') }}" style="text-decoration: none">
                        <h5 class="card-title">
                            <i class="fas fa-wallet"></i>
                            Total Expense Categories
                        </h5>
                        <p class="card-number">{{$expense = $categories->where('type', 'expense')->count()}}</p>
                    </a>
                </div>
            </div>
            <br>

            <!-- Chart Section -->

            <div class="row">
                <div class="d-flex row ">
                    <div class="col-md-4">
                        <div class="card flex-fill mx-2 " class="chart1">
                            <div class="card-body text-center">
                                <h5 class="card-title">User Statistics</h5>
                                <canvas id="user"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card flex-fill mx-2" class="chart1">
                            <div class="card-body text-center">
                                <h5 class="card-title">Income Statistics</h5>
                                <canvas id="income"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card flex-fill mx-2" class="chart1">
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
    $regular = User::where('is_Admin', '!=', 'Yes')
        ->where('plan_type', 'regular');
    $premium = User::where('is_Admin', '!=', 'Yes')
        ->where('plan_type', 'premium');
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
    const regularCount = {{ $regular->count() }};
    const premiumCount = {{ $premium->count() }};
    const data = {
        labels: ['Regular Users', 'Premium Users'],
        datasets: [{
            label: 'User Plans',
            data: [regularCount, premiumCount],
            backgroundColor: ['#f9a825', '#6a1b9a'],
            hoverOffset: 10
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