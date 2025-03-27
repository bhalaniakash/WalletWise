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
		}

		.page-content {
			margin-left: 17rem;
			margin-right: 1rem;
			transition: all 0.4s;
			margin-top: 5% !important;
			font-family: 'Arial, sans-serif'; 
		}

		.content.active {
			margin-left: 1rem;
			margin-right: 1rem;
			font-family: 'Arial, sans-serif'; 
		}
		.card-number {
        font-size: 28px;
        font-weight: bold;
        color: #222;
    }
	</style>
	@include('shared.sidenav');
	@include('shared.header');
{{-- 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
	<script src="lib/bootstrap/js/jquery.slim.min.js"></script>
	<script src="lib/bootstrap/js/poper.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

</head>
<style>
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
									<div class="name"><strong class="text-uppercase">Income</strong></div>
									<div class="count-number">
										@php
											$user = auth()->user();

											$currentMonthIncome = $incomeReport
												->where('user_id', $user->id)
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
									<div class="name"><strong class="text-uppercase">expense</strong></div>
									<div class="count-number">
										@php
											$user = auth()->user();

											$currentMonthExpense = $expenseReport
												->where('user_id', $user->id)
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
									<div class="name"><strong class="text-uppercase">saving</strong></div>
									<div class="count-number">
										@php
											$currentMonthIncome = $incomeReport
												->where('user_id', $user->id)
												->sum('amount');

											$currentMonthExpense = $expenseReport
												->where('user_id', $user->id)
												->sum('amount');

											$saving = $currentMonthIncome - $currentMonthExpense;
										@endphp
										@if ($saving < 0)
											<div class="text-danger">
												<p class="card-number text-danger">₹ {{ number_format($saving, 2) }}</p>
											</div>
										@else
											<div class="text-success">
												<p class="card-number text-success">₹ {{ number_format($saving, 2) }}</p>
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
								<h5>Income chart</h5>
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
								<h5>Expense chart</h5>
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

	$user = auth()->user();

	// Get category-wise expenses for the current month
	$categoryWiseExpenses = $expenseReport
		->where('user_id', $user->id)
		->groupBy('category_id')
		->map(fn($items) => $items->sum('amount'));

	// Fetch category names for labels
	$categoryLabels = $categories->whereIn('id', $categoryWiseExpenses->keys())->pluck('name');
	$categoryColors = collect($categoryLabels)->map(fn() => generateRandomColor())->toArray();


	// Get category-wise income for the current month
	$categoryWiseIncome = $incomeReport
		->where('user_id', $user->id)
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