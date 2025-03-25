<link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        overflow-x: hidden;
        color: #000;
        background-color: white;
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
        border-
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

        /* this is for the chart */

        .categoryChart{
            width: 500px;
            height: 500px;


        }}
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

                        {{-- here we are going to show amount 
                           reaming amount = budget - total amount spent in current month
                        --}}

                        {{-- <div class="col-md-4">
                            <div class="card">
                                <h5>Remaining Budget</h5>
                                @php
                                    $user = Auth::user();
                                    $budget = \App\Models\Budget::where('user_id', $user->id)->first();
                                    $currentMonth = now()->format('Y-m');

                                    $totalSpent = $expenseReport
                                        ->where('user_id', $user->id)
                                        ->filter(fn($expense) => date('Y-m', strtotime($expense->date)) === $currentMonth)
                                        ->sum('amount');

                                    $remainingBudget = $budget ? $budget->limit - $totalSpent : 0;
                                @endphp
                                <p><strong>₹{{ $remainingBudget > 0 ? number_format($remainingBudget, 2) : '0.00' }}</strong></p>
                                @if($remainingBudget <= 0)
                                    <div class="alert alert-danger">
                                        Warning: You have exceeded your budget limit!
                                    </div>
                                @endif
                            </div> --}}
                      
                      
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

                                   
                                    $currentMonthExpense = $expenseReport
                                        ->where('user_id', $user->id)
                                        ->filter(function ($expense) use ($currentMonth) {
                                            return date('Y-m', strtotime($expense->date)) === $currentMonth;
                                        })
                                        ->sum('amount');

                                   
                                    $currentMonthIncome = $incomeReport
                                        ->where('user_id', $user->id)
                                        ->filter(function ($income) use ($currentMonth) {
                                            return date('Y-m', strtotime($income->date)) === $currentMonth;
                                        })
                                        ->sum('amount');

                                    
                                    $netAmount = $currentMonthIncome - $currentMonthExpense;

                                  
                                    $budget = Budget::where('user_id', $user->id)
                                                    ->whereYear('created_at', now()->year)
                                                    ->whereMonth('created_at', now()->month)
                                                    ->first();

                                    $savingGoal = $budget ? $budget->saving : 0; 
                                  
                                    $remainingAmount = $netAmount - $savingGoal;

                                 
                                    $amountClass = $remainingAmount >= 0 ? 'amount-positive' : 'amount-negative';
                                @endphp
                                <p>
                                    <strong class="{{ $amountClass }}" style="color: {{ $remainingAmount >= 0 ? 'green' : 'red' }};">
                                        ₹ {{ number_format($remainingAmount, 2) }}
                                    </strong>
                                </p>

                                @if($remainingAmount < 0)
                                    <div class="alert alert-danger" style="color: red;">
                                        Warning: You are ₹{{ number_format(abs($remainingAmount), 2) }} below your saving goal for this month!
                                    </div>
                                @else
                                    <div class="alert alert-success" style="color: green;">
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
                    <h5>Budget Table</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Allocated</th>
                                <th>Spent</th>
                                <th>Remaining</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Expense</td>
                                <td>₹{{ $budget ? number_format($budget->limit, 2) : '0.00' }}</td>
                                @php
                                    $totalExpenses = \App\Models\ExpenseController::where('user_id', $user->id)->sum('amount');
                                @endphp
                                <td>₹{{ number_format($totalExpenses, 2) }}</td>
                                @php
                                    $remainingExpense = $budget ? $budget->limit - $totalExpenses : 0;
                                    $progressPercentage = $budget && $budget->limit > 0 ? ($totalExpenses / $budget->limit) * 100 : 0;
                                @endphp
                                <td>
                                    <strong style="color: {{ $remainingExpense < 0 ? 'red' : 'green' }};">
                                        ₹{{ number_format($remainingExpense, 2) }}
                                    </strong>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" 
                                             style="width: {{ $progressPercentage }}%; 
                                                    background-color: {{ $remainingExpense < 0 ? 'red' : 'green' }};">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                {{-- <td>Saving</td> --}}
                                @php
                                    $totalSavings = \App\Models\Budget::where('user_id', $user->id)
                                        ->whereYear('created_at', now()->year)
                                        ->whereMonth('created_at', now()->month)
                                        ->value('saving');
                                @endphp
                                {{-- <td>₹{{ $totalSavings ? number_format($totalSavings, 2) : '0.00' }}</td> --}}
                                @php
                                    $totalIncome = \App\Models\IncomeController::where('user_id', $user->id)->sum('amount');
                                    $totalExpense = \App\Models\ExpenseController::where('user_id', $user->id)->sum('amount');
                                    $totalAmount = $totalIncome - $totalExpense;
                                @endphp
                                {{-- <td>₹{{ number_format($totalAmount, 2) }}</td> --}}
                                @php
                                    $remainingSavings = $totalSavings ? $totalSavings - $totalAmount : 0;
                                    $savingsProgress = $totalSavings && $totalSavings > 0 ? ($totalAmount / $totalSavings) * 100 : 0;
                                @endphp
                                {{-- <td>₹{{ number_format($remainingSavings, 2) }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $savingsProgress }}%"></div>
                                    </div>
                                </td> --}}
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
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <h6 class="text-center">Budget Chart</h6>
                                <canvas id="categoryChart"></canvas>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const ctx = document.getElementById('categoryChart').getContext('2d');
                                        const totalIncome = {{ $totalIncome }};
                                        const totalExpenses = {{ $totalExpense }};
                                        const totalSavings = totalIncome - totalExpenses;

                                        new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                labels: ['Expenses', 'Savings'],
                                                datasets: [{
                                                    data: [totalExpenses, totalSavings],
                                                    backgroundColor: ['#FF0000', '#00FF00'],    
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                plugins: {
                                                    legend: {
                                                        position: 'top',
                                                    },
                                                    tooltip: {
                                                        callbacks: {
                                                            label: function (context) {
                                                                const label = context.label || '';
                                                                const value = context.raw || 0;
                                                                const percentage = ((value / totalIncome) * 100).toFixed(2);
                                                                return `${label}: ₹${value.toLocaleString()} (${percentage}%)`;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <h6 class="text-center">Expense Distribution</h6>
                                <canvas id="expenseChart"></canvas>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const ctx = document.getElementById('expenseChart').getContext('2d');
                                        
                                        const categories = @json(\App\Models\Category::where('type', 'expense')->get());
                                        const expenses = @json(\App\Models\ExpenseController::where('user_id', Auth::id())->get());
                                        
                                        const categoryData = categories.map(category => {
                                            const totalExpense = expenses
                                                .filter(expense => expense.category_id == category.id) // Ensure strict equality is not causing issues
                                                .reduce((sum, expense) => sum + parseFloat(expense.amount || 0), 0); // Handle missing or invalid amounts
                                            return {
                                                name: category.name || 'Unknown', // Fallback for missing category name
                                                total: totalExpense,
                                                color: category.color || `#${Math.floor(Math.random() * 16777215).toString(16)}` // Generate random color if missing
                                            };
                                        });
                                        
                                        const labels = categoryData.map(data => data.name);
                                        const data = categoryData.map(data => data.total);
                                        const backgroundColors = categoryData.map(data => data.color);
                                        
                                        new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    data: data,
                                                    backgroundColor: backgroundColors,
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                plugins: {
                                                    legend: {
                                                        position: 'top',
                                                    },
                                                    tooltip: {
                                                        callbacks: {
                                                            label: function (context) {
                                                                const label = context.label || '';
                                                                const value = context.raw || 0;
                                                                return `${label}: ₹${value.toLocaleString()}`;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <h6 class="text-center">Income Distribution</h6>
                                <canvas id="incomeChart"></canvas>
                                <script>
                                  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('incomeChart').getContext('2d');
    
    const incomeCategories = @json(\App\Models\Category::where('type', 'income')->get());
    const incomes = @json(\App\Models\IncomeController::where('user_id', Auth::id())->get());
    
    // Check if categories and incomes data is available
    console.log(incomeCategories);
    console.log(incomes);

    const incomeCategoryData = incomeCategories.map(category => {
        const totalIncome = incomes
            .filter(income => income.category_id == category.id)
            .reduce((sum, income) => sum + parseFloat(income.amount || 0), 0);
        return {
            name: category.name || 'Unknown',
            total: totalIncome,
            color: category.color || `#${Math.floor(Math.random() * 16777215).toString(16)}`
        };
    });
    
    const incomeLabels = incomeCategoryData.map(data => data.name);
    const incomeData = incomeCategoryData.map(data => data.total);
    const incomeBackgroundColors = incomeCategoryData.map(data => data.color);
    
    // Check if all the data arrays are valid
    console.log(incomeLabels, incomeData, incomeBackgroundColors);

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: incomeLabels,
            datasets: [{
                data: incomeData,
                backgroundColor: incomeBackgroundColors,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            return `${label}: ₹${value.toLocaleString()}`;
                        }
                    }
                }
            }
        }
    });
});

                                </script>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>