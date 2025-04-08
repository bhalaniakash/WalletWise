{{--
<!DOCTYPE html> --}}
<html>

<head>
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <title>Income Report</title>
  <base href="/expenseMVC/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
    body {
      min-height: 100vh;
      overflow-x: hidden;
      font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
    }

    .page-content {
      margin-top: 5% !important;
      margin-left: 17rem;
      padding: 2rem;
      transition: all 0.3s ease-in-out;
      font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
    }

    button[type="button"] {
      background: #6B4226;
      color: #E6C7A5;
      padding: 8px;
      border-radius: 8px;
      font-weight: bold;
      font-size: 1.2rem;
      transition: all 0.3s ease-in-out;
      width: 20%;
      border: none;
    }

    button[type="button"]:hover {
      background: #4E2F1E;
      cursor: pointer;
    }

    button[type="submit"] {
            background: #E6C7A5;
            color: #4E2F1E;
            padding: 8px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.2rem;
            transition: all 0.3s ease-in-out;
            width: 10%;
            border: none;
        }

        button[type="submit"]:hover {
            background: #4E2F1E;
            color: #E6C7A5;
            cursor: pointer;
        }

    .text-2xl {
      color: #A08963;
      font-family: 'Andada Pro', sans-serif;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      /* border-radius: 20px; */
    }

    th {
      /* background-color: #A08963; */
      background: #E6C7A5 !important;
      color: #6B4226;
    }

    td {
      color: #6B4226;
      font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
      font-size: 1rem;
    }

    h2 {
      color: #6B4226;
      padding: 20px;
    }

  </style>
</head>

<body>
  @include('shared.sidenav');
  @include('shared.header');

  <div class="page-content" id="content">

    <br>

    <div class="card p-4">

      <h2>Income Report</h2>
      <div class="col-xl-12">

        <form class="form-inline" id="incomeFilterForm">
          <select class="form-control" id="incomeCategory" name="icat">
              <option value="">All Categories</option>
              @foreach ($categories as $category)
                  @if ($category->type == 'income')
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
              @endforeach
          </select>
          &nbsp;&nbsp;
          <input type="month" class="form-control mr-2" id="incomeDate" name="date">
          <button type="submit">
              <i class="fa fa-filter fa-xs"></i> Filter
          </button>
      </form>
      
        <br>
        <table class="table table-striped" id="incomeReportTable" style="border-radius: 10px; overflow: hidden;">
          <thead style="background-color: #1E1E2E;">
            <tr>
              <th>Date</th>
              <th>Name</th>
              <th>Category</th>
              <th>Description</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody id="incomeTBody">
            @php
        $currentUser = auth()->user(); // Get the currently logged-in user
        $filteredincomes =
          $incomeReport
          ->where('user_id', $currentUser->id)
          ->filter(function ($e) {
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
        <button type="button" id="downloadReport">Download Report</button>
      </div>
    </div>
    <br>

    <div class="card shadow">
      <div class="card-header d-flex">
        <h5>Income chart [Total]</h5>
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

    <br>
    </section>

  </div>

  {{-- chart 1 --}}

  @php
  function generateRandomColor()
  {
    return 'rgb(' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ')';
  }

  //chart 1
  $user = auth()->user();
  // Get category-wise income for the current month
  $categoryWiseIncome = $incomeReport
    ->where('user_id', $user->id)
    ->groupBy('category_id')
    ->map(fn($items) => $items->sum('amount'));

  // Fetch category names for labels
  $categoryLabelsI = $categories->whereIn('id', $categoryWiseIncome->keys())->pluck('name');
  $categoryColorsI = collect($categoryLabelsI)->map(fn() => generateRandomColor())->toArray();

  //chart 2
  $user = auth()->user();

  $dateWiseIncome = $incomeReport
    ->where('user_id', $user->id)
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
      console.log("Download button clicked"); // Debugging
      let choice = prompt("Enter 'CSV' to download as CSV or 'PDF' to download as PDF:");

      if (choice && choice.toLowerCase() === 'csv') {
        console.log("Downloading CSV");
        downloadCSV();
      } else if (choice && choice.toLowerCase() === 'pdf') {
        console.log("Downloading PDF");
        downloadPDF();
      } else {
        alert("Invalid choice! Please enter 'CSV' or 'PDF'.");
      }
    });

    function downloadCSV() {
      let table = document.getElementById('incomeReportTable');
      if (!table) {
        alert("Report table not found!");
        return;
      }
      let rows = table.querySelectorAll('tr');
      let csvContent = "";

      rows.forEach(row => {
        let cols = row.querySelectorAll('th, td');
        let rowData = Array.from(cols).map(col => `"${col.innerText}"`).join(",");
        csvContent += rowData + "\n";
      });

      let blob = new Blob([csvContent], { type: "text/csv" });
      let url = URL.createObjectURL(blob);
      let a = document.createElement("a");
      a.href = url;
      a.download = "Income_Report.csv";
      a.click();
    }

    function downloadPDF() {
      let table = document.getElementById('incomeReportTable');
      if (!table) {
        alert("Report table not found!");
        return;
      }

      let style = "<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style>";
      let win = window.open("", "", "width=800,height=800");
      win.document.write("<html><head><title>Income Report</title>" + style + "</head><body>");
      win.document.write("<h2>Income Report</h2>");
      win.document.write(table.outerHTML);

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
    console.log(categoryLabels);
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