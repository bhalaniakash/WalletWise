<!DOCTYPE html>
<html lang="en">

<head>
	<base href="/expenseMVC/">
	<title>Dashboard</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style type="text/css">
		body {
			min-height: 100vh;
			overflow-x: hidden;
			margin-top: 0;
			font-family: 'Arial, sans-serif';
			background: #E6C7A5;
            animation: glow 2s infinite alternate;
		}
	.page-content {
			margin-left: 17rem;
			margin-right: 1rem;
			transition: all 0.4s;
			margin-top: 5% !important;
			font-family: 'Arial, sans-serif';
			
		}

		.dashboard-card {
			
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 215, 181, 0.5);
            transition: all 0.3s ease-in-out;
        }

        .dashboard-card:hover {
            box-shadow: 0 0 30px rgba(230, 199, 165, 0.8);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 1rem;
            color: #6b4226;
			
        }

		
		.card-number {
			font-size: 28px;
			font-weight: bold;
			color: white;
		}
		h5{
			color: #6b4226;
		}
		
	</style>
	@include('shared.sidenav');
	@include('shared.header');
		
</head>
<style>
	/* Dashboard Cards */
	.dashboard-card {
		background: #E6C7A5;
		color:white;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
		transition: all 0.3s ease-in-out;
	}

	.dashboard-card:hover {
		box-shadow: 4px 6px 12px rgba(0, 0, 0, 0.2);
		transform: translateY(-2px);
		color: #6b4226;
	}
</style>

<body>
	<div class="page-content" id="content">
		<div id="page-wrapper">
			<br>
			<section class="container-fluid">
				<div class="row">
					<div class="col-xl-4 ">
						<div class="dashboard-card">
							<div class="card-body">
								<div class="col mr-4">
									<div class="name"><strong class="text-uppercase"><h3>Income<h3></strong></div>
									<h5>current month</h5>
									<div class="count-number">
										@php
											$currentMonth = now()->format('Y-m');
											$user = auth()->user();

											$currentMonthIncome = $incomeReport
												->where('user_id', $user->id)
												->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
												->sum('amount');
										@endphp
										<p class="card-number">₹ {{ number_format($currentMonthIncome, 2) }}</p>
										</tr>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 ">
						<div class="dashboard-card">
							<div class="card-body ">
								<div class="col mr-4">
									<div class="name"><strong class="text-uppercase"><h3>expense</h3></strong></div>
									<h5>current month</h5>
									<div class="count-number">
										@php

											$user = auth()->user();

											$currentMonthExpense = $expenseReport
												->where('user_id', $user->id)
												->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
												->sum('amount');

										@endphp
										<p class="card-number">₹ {{ number_format($currentMonthExpense, 2) }}</p>
										</tr>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 ">
						<div class="dashboard-card">
							<div class="card-body">
								<div class="col mr-4">
									<div class="name"><strong class="text-uppercase"><h3>saving</h3></strong></div>
									<h5>current month</h5>
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
												<p class="card-number text-danger">₹ {{ number_format($saving, 2) }}</p>
											</div>
										@else
											<div class="text-success">
												<p class="card-number text-success">₹{{ number_format($saving, 2) }}</p>
											</div>
										@endif

									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<br>
			<br>
			<section class="container-fluid">
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
			</section>
			<br>
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

	// Fetch category names for labels
	$categoryLabels = $categories->whereIn('id', $categoryWiseExpenses->keys())->pluck('name');
	$categoryColors = collect($categoryLabels)->map(fn() => generateRandomColor())->toArray();


	// Get category-wise income for the current month
	$categoryWiseIncome = $incomeReport
		->where('user_id', $user->id)
		->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
		->groupBy('category_id')
		->map(fn($items) => $items->sum('amount'));

	// Fetch category names for labels
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
		labels: categoryLabels, // Dynamic category names
		datasets: [{
			label: 'Expense Distribution',
			data: categoryExpenses, // Dynamic expenses per category
			backgroundColor: categoryColors,
			hoverOffset: 4
		}]
	};

	new Chart(ctxe, {
		type: 'pie', // Change chart type if needed
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
		labels: categoryLabelsI, // Dynamic category names
		datasets: [{
			label: 'Income Distribution',
			data: categoryIncomes, // Dynamic expenses per category
			backgroundColor: categoryColorsI,
			hoverOffset: 4
		}]
	};
	new Chart(ctxi, {
		type: 'pie', // Change chart type if needed
		data: datai,
		options: {
			animation: false
		}

	});
</script>

</html>