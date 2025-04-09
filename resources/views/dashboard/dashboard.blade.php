<!DOCTYPE html>
<html lang="en">
<head>
	<base href="/expenseMVC/">
	<title>Dashboard</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Boldonse&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

	<style type="text/css">
		body {
			min-height: 100vh;
			overflow-x: hidden;
			margin-top: 0;
			font-family: "Poppins", sans-serif;
			font-weight: 300;
			font-style: normal;
			background: #E6C7A5;
			
		}

		.page-content {
			margin-left: 17rem;
			margin-right: 1rem;
			transition: all 0.4s;
			margin-top: 5% !important;
			font-family: "Poppins", sans-serif;
			font-weight: 300;
			font-style: normal;
			
		}
		
		.card-title {
			font-family: "Poppins", sans-serif;
			font-weight: 200;
			font-style: normal;
			font-size: 1.25rem;
			font-weight: 500;
			margin-bottom: 1rem;
			color: #6b4226;

		}


		.card-number {
			font-size: 28px;
			font-weight: bold;
			color: white;
			font-family: "Poppins", sans-serif;
			font-weight: 300;
			font-style: normal;
		}

		h5 {
			color: #6b4226;
			font-family: "Poppins", sans-serif;
			font-weight: 300;
			font-style: normal;
		}
		/* Dashboard Cards */
		.dashboard-card {
			background: white;
			color: #6b4226;
			padding: 10px;
			border-radius: 10px;
			box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
			transition: all 0.3s ease-in-out;
			font-family: "Poppins", sans-serif;
			font-weight: 300;
			font-style: normal;
		}
		
		.dashboard-card:hover {
			box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
			transform: translateY(-2px);
			color: #6b4226;
		}
		.icon-box {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			width: 50px;
			height: 50px;
			border-radius: 10px;
			background: rgba(255, 255, 255, 0.2);
			/* Transparent background */
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}
		
		.icon-box i {
			font-size: 24px;
			color: #6b4226;
			/* Icon color */
		}
	</style>
	
	@include('shared.sidenav');
	@include('shared.header');

</head>
<body>
	<div class="page-content" id="content">
		<div id="page-wrapper">
			<br>
			<section class="container-fluid">
				<div class="row">
					<div class="col-xl-4">
						<a href="{{ url('dashboard/incomeReport') }}" style="text-decoration: none">
							<div class="dashboard-card">
								<div class="card-body">
									<div class="name">
										<strong class="text-uppercase">
											<h5>
												<i class="fas fa-dollar-sign"></i> &nbsp; Income
											</h5>
										</strong>
									</div>
									<h5>{{ now()->format('F Y') }}</h5>
									<div class="count-number">
										@php
											$currentMonth = now()->format('Y-m');
											$user = auth()->user();
											$currentMonthIncome = $incomeReport
												->where('user_id', $user->id)
												->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
												->sum('amount');
										@endphp
										<p class="card-number text-3xl text-[#6b4226]">₹
											{{ number_format($currentMonthIncome, 2) }}
										</p>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-4">
						<a href="{{ url('dashboard/expenseReport') }}" style="text-decoration: none">
							<div class="dashboard-card">
								<div class="card-body">
									<div class="name">
										<strong class="text-uppercase">
											<h5>
												<i class="fas fa-money-bill-wave"></i>
												&nbsp;
												Expense
											</h5>
										</strong>
									</div>
									<h5>{{ now()->format('F Y') }}</h5>
									<div class="count-number">
										@php
											$user = auth()->user();
											$currentMonthExpense = $expenseReport
												->where('user_id', $user->id)
												->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
												->sum('amount');
										@endphp
										<p class="card-number text-3xl text-[#6b4226]">₹
											{{ number_format($currentMonthExpense, 2) }}
										</p>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-4">
						<div class="dashboard-card">
							<div class="card-body">
								<div class="name">
									<strong class="text-uppercase">
										<h5>
											<i class="fas fa-piggy-bank"></i>
											&nbsp;
											Saving
										</h5>
									</strong>
								</div>
								<h5>{{ now()->format('F Y') }}	</h5>
								<div class="count-number">
									@php
										$currentMonthIncome = $incomeReport
											->where('user_id', $user->id)
											->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
											->sum('amount');

										$currentMonthExpense = $expenseReport
											->where('user_id', $user->id)
											->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
											->sum('amount');

										$saving = $currentMonthIncome - $currentMonthExpense;
									@endphp
									@if ($saving < 0)
										<div class="text-danger">
											<p class="card-number text-3xl text-danger">₹
												{{ number_format($saving, 2) }}
											</p>
										</div>
									@else
										<div class="text-success">
											<p class="card-number text-3xl text-success">₹
												{{ number_format($saving, 2) }}
											</p>
										</div>
									@endif

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="col-xl-12 mt-4">
				<div class="dashboard-card">
					<div class="card-body">

						<div class="d-flex justify-content-between align-items-center mb-3">
							<div>
								<h4>Last Week's Expense Report</h4>
								<p class="text-muted">Expenses this week</p>
							</div>
						</div>
						<div class="d-flex align-items-center mb-4">
							<div class="mr-3">
								@php
									$user = auth()->user();
									$last7Days = collect();

									for ($i = 6; $i >= 0; $i--) {
										$date = now()->subDays($i)->toDateString(); 
										$dayAbbreviation = now()->subDays($i)->format('D');

										$expenseAmount = $expenseReport->where('user_id', $user->id)
											->where('date', $date)
											->sum('amount');

										$last7Days->put($dayAbbreviation, $expenseAmount);
									}
								@endphp
								<h2 class="mb-0 rounded-sm">₹ {{ number_format($last7Days->sum(), 2) }}</h2>
								<p class="text-muted">Total expenses for the last 7 days</p>
							</div>
							<div style="width: 100%;">
								<canvas id="lastWeekExpenseChart" width="500" height="100"></canvas>
							</div>
						</div>
						<script>
							document.addEventListener('DOMContentLoaded', function () {
								const ctx = document.getElementById('lastWeekExpenseChart').getContext('2d');
								const lastWeekExpenseChart = new Chart(ctx, {
									type: 'bar',
									data: {
										labels: @json($last7Days->keys()),
										datasets: [{
											label: 'Expenses',
											data: @json($last7Days->values()),
											backgroundColor: '#E6C7A5',
											borderColor: '#6b4226',
											borderWidth: 2
										}]
									},
									options: {
										responsive: true,
										scales: {
											y: {
												beginAtZero: true
											}
										},
										plugins: {
											legend: {
												display: false
											}
										}
									}
								});
							});
						</script>

							<div class="d-flex " style="justify-content: space-between;">
								<div>
									<p  class="text-muted mb-1">Earnings</p>
									<h4 class="mb-0">₹ {{ number_format($currentMonthIncome, 2) }}</h4>
								</div>

								<div>
									<p  class="text-muted mb-1">Profit</p>
									<h4 class="mb-0">₹ {{ number_format($saving, 2) }}</h4>
								</div>

								<div>
									<p  class="text-muted mb-1">Expense</p>
									<h4 class="mb-0">₹ {{ number_format($currentMonthExpense, 2) }}</h4>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
			
			{{-- Div for day wise expense tracking start from here --}}

			<div class="col-xl-12 mt-4">
				<div class="dashboard-card card-body">
					
						<div class="d-flex" style="justify-content: space-between;">
							<div>
								<p  class="text-muted">Expense Today</p >
								@php
									$today = now()->toDateString();
									$todayExpense = $expenseReport
										->where('user_id', $user->id)
										->where('date', $today)
										->sum('amount');
								@endphp
								<h4 class="mb-0">₹ {{ number_format($todayExpense, 2) }}</h4>
							</div>

							<div>
								<p  class="text-muted">Expense Yesterday</p >
								@php
									$yesterday = now()->subDay()->toDateString();
									$yesterdayExpense = $expenseReport
										->where('user_id', $user->id)
										->where('date', $yesterday)
										->sum('amount');
								@endphp
								<h4 class="mb-0">₹ {{ number_format($yesterdayExpense, 2) }}</h4>
							</div>
							
							<div>
								<p  class="text-muted">Gap </p >
								@php
									$difference = $todayExpense - $yesterdayExpense;
								@endphp
								<h4 class="mb-0">
									₹ {{ number_format(abs($difference), 2) }}
									@if ($difference > 0)
										<span class="text-danger">(Increased)</span>
									@elseif ($difference < 0)
										<span class="text-success">(Decreased)</span>
									@else
										<span class="text-muted">(No Change)</span>
									@endif
								</h4>
							</div>
						</div>
				</div>
			<br>
				<div class="row d-flex align-items-md-stretch">
					<div class="col-lg-6 ">
						<div class="dashboard-card">
							<div class="card-header d-flex">
								<h5>Income chart [{{ now()->format('F Y') }}]</h5>
							</div>
							<div class="card-body">
								<div class="col">
									<canvas id="incomeChart"></canvas>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6 ">
						<div class="dashboard-card">
							<div class="card-header d-flex">
								<h5>Expense chart[{{ now()->format('F Y') }}]</h5>
							</div>
							<div class="card-body">
								<div class="col">
									<canvas id="expenseChart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<script type="text/javascript" src="lib/js/main.js"></script>
</body>
@php
	function generateRandomColor()
	{
		return 'rgb(' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ')';
	}

	$currentMonth = now()->format('Y-m');
	$user = auth()->user();

	// Get category-wise expenses for the current month
	$categoryWiseExpenses = $expenseReport
		->where('user_id', $user->id)
		->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
		->groupBy('category_id')
		->map(fn($items) => $items->sum('amount'));

	$categoryLabels = $categories->whereIn('id', $categoryWiseExpenses->keys())->pluck('name');
	$categoryColors = collect($categoryLabels)->map(fn() => generateRandomColor())->toArray();

	// Get category-wise income for the current month
	$categoryWiseIncome = $incomeReport
		->where('user_id', $user->id)
		->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
		->groupBy('category_id')
		->map(fn($items) => $items->sum('amount'));
	
	$categoryLabelsI = $categories->whereIn('id', $categoryWiseIncome->keys())->pluck('name');
	$categoryColorsI = collect($categoryLabelsI)->map(fn() => generateRandomColor())->toArray();

@endphp

<script>
	const ctxe = document.getElementById('expenseChart').getContext('2d');

	// Convert PHP data to JavaScript
	var categoryLabels = @json($categoryLabels->values());
	var categoryExpenses = @json($categoryWiseExpenses->values());
	var categoryColors = @json($categoryColors);

	const datae = {
		labels: categoryLabels,
		datasets: [{
			label: 'Expense Distribution',
			data: categoryExpenses, 
			backgroundColor: categoryColors,
			hoverOffset: 4
		}]
	};

	new Chart(ctxe, {
		type: 'pie', 
		data: datae,
		options: {
			animation: false
		}

	});
	const ctxi = document.getElementById('incomeChart').getContext('2d');

	var categoryLabelsI = @json($categoryLabelsI->values());
	var categoryIncomes = @json($categoryWiseIncome->values());
	var categoryColorsI = @json($categoryColorsI);

	const datai = {
		labels: categoryLabelsI, 
		datasets: [{
			label: 'Income Distribution',
			data: categoryIncomes,
			backgroundColor: categoryColorsI,
			hoverOffset: 4
		}]
	};

	new Chart(ctxi, {
		type: 'pie', 
		data: datai,
		options: {
			animation: false
		}
	});
</script>
</html>