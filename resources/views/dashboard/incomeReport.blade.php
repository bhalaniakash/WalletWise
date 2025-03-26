{{-- <!DOCTYPE html> --}}
<html>

<head>
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <title>Income Report</title>
  <base href="/expenseMVC/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  {{--
  <link rel="stylesheet" type="text/css" href="link/link.css">
  <script type="text/javascript" src="lib/js/main.js"></script> --}}
  <style type="text/css">
    body {
      min-height: 100vh;
      overflow-x: hidden;
      background-color: white;
      /* Background color */
      color: black;
      /* Text color */

    }

    .page-content {
      margin-left: 17rem;
      margin-right: 1rem;
      transition: all 0.4s;
      color: #000;
      background-color: white;
      margin-top: 5% !important;
    }

    .content.active {
      margin-left: 1rem;
      margin-right: 1rem;
    }

    .table thead {
      background-color: #121212;
      /* dark color */
    }

    th,
    td {
      color: #000;
      background-color: white;
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
            <div
              style="margin-left: 1rem; margin-bottom: 1rem; font-size: 1rem; font-weight: bold; color: #4A5568; background: #F7FAFC; padding: 0.5rem 1rem; border-radius: 8px; display: inline-block;">
              <span style="color: #2D3748;">HOME</span> &gt; <span style="color: #3182CE;">INCOME REPORT</span>
            </div>
            <div class="col-xl-12">
              <div class="container-fluid shadow">
                <div class="card-body ">
                  <form class="form-inline" method="get">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="month" class="form-control" name="date" placeholder="year"
                            onchange="this.form.submit()" value="{{ request('data') }}" />
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <select class="form-control" name="icat" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                              @foreach ($categories as $category)
                         @if ($category->type == 'income')
                              <option value="{{ $category->id }}" {{ request('icat') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                              </option>
                        @endif
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col">

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br>
      <section>
        <div class="container-fluid shadow">
          <br>
          <table class="table table-striped table-bordered" id="Report">
            <thead style="background-color: #1E1E2E;">
              <tr>
                <th colspan="6">
                  <center>
                    <h5>Income details</h5>
                  </center>
                </th>
              </tr>
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @php
        $currentUser = auth()->user(); // Get the currently logged-in user

        $filteredincomes = $incomeReport->where('user_id', $currentUser->id)->filter(function ($e) {
          $dateMatch = request('date') ? date('Y-m', strtotime($e->date)) == request('date') : true;
          $categoryMatch = request('icat') ? $e->category_id == request('icat') : true;
          return $dateMatch && $categoryMatch;
        });
        @endphp
              @foreach ($filteredincomes as $i)
          <tr>
          <td>{{ $i->date }}</td>
          <td>{{ $i->source }}</td>
          {{-- <td>{{ $i->category_id }}</td> --}}
          <td>{{ $categories->where('id', $i->category_id)->first()?->name }}</td>
          <td>{{ $i->description }}</td>
          <td>₹ {{ $i->amount }}</td>
          </tr>
        @endforeach
              <tr>
                <td colspan="4">Total: </td>
                <td>₹ {{ number_format(collect($filteredincomes)->sum('amount'), 2) }}</td>
              </tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-start">
            <button class="btn btn-dark mb-4 mt-2" id="downloadReport">Download Report</button>
          </div>
          <div class="card shadow">
            <div class="card-header d-flex">
              <h5>Income chart</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div id="piechart">
                    <canvas id="incomeChart"></canvas>
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="piechart">
                    <canvas id="incomeChartDate"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <br>
      </section>
    </div>
  </div>

  {{-- chart 1 --}}

  @php
  function generateRandomColor()
  {
    return 'rgb(' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ')';
  }

  //chart 1
  $currentMonth = now()->format('Y-m');
  $user = auth()->user();
  // Get category-wise income for the current month
  $categoryWiseIncome = $incomeReport
    ->where('user_id', $user->id)
    ->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
    ->groupBy('category_id')
    ->map(fn($items) => $items->sum('amount'));

  // Fetch category names for labels
  $categoryLabelsI = $categories->whereIn('id', $categoryWiseIncome->keys())->pluck('name');
  $categoryColorsI = collect($categoryLabelsI)->map(fn() => generateRandomColor())->toArray();

  //chart 2
  $currentMonth = now()->format('Y-m');
  $user = auth()->user();

  $dateWiseIncome = $incomeReport
    ->where('user_id', $user->id)
    ->filter(fn($i) => date('Y-m', strtotime($i->date)) == $currentMonth)
    ->groupBy('date')
    ->map(fn($items) => $items->sum('amount'));
  $dateLabelsI = $incomeReport
    ->where('user_id', $user->id)
    ->groupBy('date') // Grouping by date
    ->keys();
  $dateColorsI = collect($dateLabelsI)->map(fn() => generateRandomColor())->toArray();

  @endphp

  <script type="text/javascript">
    document.getElementById('downloadReport').addEventListener('click', function () {
      let choice = prompt("Enter 'CSV' to download as CSV or 'PDF' to download as PDF:");

      if (choice && choice.toLowerCase() === 'csv') {
        downloadCSV();
      } else if (choice && choice.toLowerCase() === 'pdf') {
        downloadPDF();
      } else {
        alert("Invalid choice! Please enter 'CSV' or 'PDF'.");
      }
    });

    function downloadCSV() {
      let table = document.getElementById('Report');
      let rows = table.querySelectorAll('tr');
      let csvContent = "";

      rows.forEach(row => {
        let cols = row.querySelectorAll('th, td');
        let rowData = Array.from(cols).map(col => `"${col.innerText}"`).join(",");
        csvContent += rowData + "\n";
      });

      let blob = new Blob([csvContent], {
        type: "text/csv"
      });
      let url = URL.createObjectURL(blob);
      let a = document.createElement("a");
      a.href = url;
      a.download = "Income_Report.csv";
      a.click();
    }

    function downloadPDF() {
      let table = document.getElementById('Report').outerHTML;
      let chartCanvas = document.getElementById('incomeChart');
      let chartImage = chartCanvas.toDataURL("image/png");
      let style = "<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style>";
      let win = window.open("", "", "width=800,height=800");
      win.document.write("<html><head><title>Income Report</title>" + style + "</head><body>");
      win.document.write("<h2>Income Report</h2>");
      win.document.write(table);
      win.document.write("<h3>Income Chart</h3>");
      win.document.write("<img src='" + chartImage + "' style='width:100%;' />");
      win.document.write("</body></html>");
      win.document.close();
      win.print();
    }

    // fromt here bar chart is starts
    const ctx = document.getElementById('incomeChart');

    var categoryLabels = @json($categoryLabelsI->values());
    var categoryIncomes = @json($categoryWiseIncome->values());
    var categoryColors = @json($categoryColorsI);

    const data = {
      labels: categoryLabels,
      datasets: [{
        label: 'Income Distribution',
        data: categoryIncomes, // Dynamic incomes per category
        backgroundColor: categoryColors,
        hoverOffset: 4
      }]
    };

    new Chart(ctx, {
      type: 'bar',
      data: data,
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: false,  // Disable default point styles
              boxWidth: 0, // Set box width to 0 to remove color box
              generateLabels: function (chart) {
                let labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                labels.forEach(label => {
                  label.hidden = false; // Ensure text is visible
                  label.fillStyle = 'transparent'; // Hide color box
                });
                return labels;
              }
            }
          }
        }
      }
    });

    // chart 2
    const ctx2 = document.getElementById('incomeChartDate');

    var dateLabelsI = @json($dateLabelsI->values());
    var dateWiseIncome = @json($dateWiseIncome->values());
    var dateColorsI = @json($dateColorsI);


    const data2 = {
      labels: dateLabelsI,
      datasets: [{
        label: 'Income Distribution [Date]',
        data: dateWiseIncome,
        backgroundColor: dateColorsI,
        hoverOffset: 4
      }]
    }

    new Chart(ctx2, {
      type: 'bar',
      data: data2,
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: false,  // Disable default point styles
              boxWidth: 0, // Set box width to 0 to remove color box
              generateLabels: function (chart) {
                let labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                labels.forEach(label => {
                  label.hidden = false; // Ensure text is visible
                  label.fillStyle = 'transparent'; // Hide color box
                });
                return labels;
              }
            }
          }
        }
      }
    });

  </script>

</body>

</html>