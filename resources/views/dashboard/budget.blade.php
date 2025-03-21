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

        /* this css is for an Spend amount  */

        .amount-positive {
            color: green;
            font-weight: bold;
        }
        .amount-negative {
            color: red;
            font-weight: bold;
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
                                @php
                                    $user = Auth::user();
                                    $budget = \App\Models\Budget::where('user_id', $user->id)->first();
                                @endphp
                                <p><strong>₹{{ $budget ? number_format($budget->limit, 2) : '0.00' }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h5>Saving Goal</h5>
                                @php
                                    $currentMonthSaving = \App\Models\Budget::where('user_id', $user->id)
                                        ->whereYear('created_at', now()->year)
                                        ->whereMonth('created_at', now()->month)
                                        ->value('saving');
                                @endphp
                                <p><strong>₹{{ $currentMonthSaving ? number_format($currentMonthSaving, 2) : '0.00' }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                           
                            
                            <div class="card">
                                <h5>Remaining Amount</h5>
                                @php
                                    use Illuminate\Support\Facades\Auth;
                                    use App\Models\Budget;

                                    $user = Auth::user();
                                    $currentMonth = now()->format('Y-m');

                                    // Get current month's expenses
                                    $currentMonthExpense = $expenseReport
                                        ->where('user_id', $user->id)
                                        ->filter(function ($expense) use ($currentMonth) {
                                            return date('Y-m', strtotime($expense->date)) === $currentMonth;
                                        })
                                        ->sum('amount');

                                    // Get current month's income
                                    $currentMonthIncome = $incomeReport
                                        ->where('user_id', $user->id)
                                        ->filter(function ($income) use ($currentMonth) {
                                            return date('Y-m', strtotime($income->date)) === $currentMonth;
                                        })
                                        ->sum('amount');

                                    // Calculate net amount
                                    $netAmount = $currentMonthIncome - $currentMonthExpense;

                                    // Get the user's saving goal from the budget table
                                    $budget = Budget::where('user_id', $user->id)
                                                    ->whereYear('created_at', now()->year)
                                                    ->whereMonth('created_at', now()->month)
                                                    ->first();

                                    $savingGoal = $budget ? $budget->saving : 0; // Default to 0 if no budget is set

                                    // Calculate remaining amount after subtracting saving goal
                                    $remainingAmount = $netAmount - $savingGoal;

                                    // Determine CSS class based on comparison
                                    $amountClass = $remainingAmount >= 0 ? 'amount-positive' : 'amount-negative';
                                @endphp

                                <p>
                                    <strong class="{{ $amountClass }}">
                                        ₹ {{ number_format($remainingAmount, 2) }}
                                    </strong>
                                </p>

                                @if($remainingAmount < 0)
                                    <div class="alert alert-danger">
                                        Warning: You are ₹{{ number_format(abs($remainingAmount), 2) }} below your saving goal for this month!
                                    </div>
                                @else
                                    <div class="alert alert-success">
                                        Great! You have ₹{{ number_format($remainingAmount, 2) }} remaining after meeting your saving goal.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br>

            <section>
                <div class="container-fluid shadow">
                    <br>
                    <form class="mt-3" method="POST" action="{{ route('budget.store') }}">
                        @csrf
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expense Limit:</label>
                                    <input type="number" class="form-control" name="limit" placeholder="Enter Expense Limit" required />
                                   
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Saving Goal:</label>
                                    <input type="number" class="form-control" name="saving" placeholder="Enter Saving Goal" required />
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
                        <div class="col-md-12">
                            <div class="card">
                                <h6>Expenses vs. Income by Category</h6>
                                <canvas id="categoryChart"></canvas>
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
        document.addEventListener("DOMContentLoaded", function () {
            fetch("/chart-data")
                .then(response => response.json())
                .then(data => {
                    const categories = [...new Set([...data.expenses.map(e => e.category), ...data.incomes.map(i => i.category)])];
    
                    const expenseData = categories.map(category => {
                        const expense = data.expenses.find(e => e.category === category);
                        return expense ? expense.total : 0;
                    });
    
                    const incomeData = categories.map(category => {
                        const income = data.incomes.find(i => i.category === category);
                        return income ? income.total : 0;
                    });
    
                    var ctx3 = document.getElementById('categoryChart').getContext('2d');
                    new Chart(ctx3, {
                        type: 'bar',
                        data: {
                            labels: categories,
                            datasets: [
                                {
                                    label: 'Expenses (₹)',
                                    data: expenseData,
                                    backgroundColor: 'rgba(255, 99, 132, 0.7)'
                                },
                                {
                                    label: 'Income (₹)',
                                    data: incomeData,
                                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: { beginAtZero: true }
                            }
                        }
                    });
                });
            });
    </script>
    
</body>
</html>
