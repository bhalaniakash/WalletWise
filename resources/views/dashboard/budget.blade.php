<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Budget Management</title>
    <base href="/expenseMVC/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            min-height: 100vh;
            overflow-x: hidden;
            color: #000;
            background-color: white;
        ;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background-color: white;
            color: #000;
            margin-top: 50px;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .card {
            border-color: #000;
            padding: 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table tbody tr th,
        .table tbody tr td {
            color: #000;
        }

        .btn-dark {
            background-color: #000;
            border-color: #000;
        }

        th, td {
            color: #000;
            background-color: white;
        }

        .progress {
            height: 20px;
            border-radius: 5px;
        }

        .progress-bar {
            background-color: #000;
        }
    </style>
</head>

<body>
    
    @include('shared.sidenav');
    @include('shared.header');

    <div class="page-content" id="content">
        <div id="page-wrapper">
            <br>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <h5>Total Budget</h5>
                                <p><strong>₹10,000</strong></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h5>Remaining Budget</h5>
                                <p><strong>₹4,500</strong></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h5>Spent Amount</h5>

                                @php
                              $user = Auth::user();
                              $currentMonth = now()->format('Y-m');

            
                                $currentMonthExpense = $expenseReport
                                ->where('user_id', $user->id)
                                ->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
                                ->sum('amount');
                              
                              
                                @endphp
                                <p><strong>₹ {{ number_format($currentMonthExpense, 2) }}</strong></p>
                                
                             
            
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br>

            <section>
                <div class="container-fluid shadow">
                    <br>
                    <form class="mt-3" method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expense Limit:</label>
                                    <input type="text" class="form-control" name="eGoal"
                                        placeholder="Enter Expense Limit" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Saving Goal:</label>
                                    <input type="number" class="form-control" name="sGoal"
                                        placeholder="Enter Saving Goal" required />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Add Budget</button>
                    </form>
                    <br>
                </div>
            </section>

            <br>

            {{-- from here budget categorys starts --}}

            <section>
                <div class="container-fluid shadow">
                    <h5>Budget Categories</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Allocated</th>
                                <th>Spent</th>
                                <th>Remaining</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Housing</td>
                                <td>₹3,000</td>
                                <td>₹2,000</td>
                                <td>₹1,000</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 67%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Food</td>
                                <td>₹2,500</td>
                                <td>₹1,800</td>
                                <td>₹700</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 72%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Transportation</td>
                                <td>₹1,500</td>
                                <td>₹900</td>
                                <td>₹600</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 60%"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </section>

            <br>

            {{-- from here chart section starts --}}

            <section>
                <div class="container-fluid shadow">
                    <h5>Analytics & Reports</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <h6>Budget vs Expenses</h6>
                                <canvas id="budgetChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <h6>Expense Distribution</h6>
                                <canvas id="expenseChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </section>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx1 = document.getElementById('budgetChart').getContext('2d');
        var budgetChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Total Budget', 'Spent Amount', 'Remaining Budget'],
                datasets: [{
                    label: 'Amount in ₹',
                    data: [10000, 5500, 4500],
                    backgroundColor: ['#000', '#f00', '#0f0']
                }]
            }
        });

        var ctx2 = document.getElementById('expenseChart').getContext('2d');
        var expenseChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Housing', 'Food', 'Transport'],
                datasets: [{
                    data: [2000, 1800, 900],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            }
        });
    </script>
</body>
</html>
