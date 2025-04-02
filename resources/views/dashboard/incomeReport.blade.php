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
    body {
      min-height: 100vh;
      overflow-x: hidden;
      font-family: 'Arial, sans-serif';
    }

      .page-content {
            margin-top: 5% !important;
            margin-left: 17rem;
            padding: 2rem;
            transition: all 0.3s ease-in-out;

          }
          button[type="button"] {
            background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }
        button[type="button"]:hover {
            background: #A08963;
            color: white;
            transform: scale(1.05);
        }
        button[type="submit"]{
          background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }
    .text-2xl{
      color: #A08963;
      font-family: 'Andada Pro', sans-serif;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

        th {
            background-color: #A08963;
            color: white;
        }

        td {
          color: #A08963;
        }
    
  </style>
</head>

<body>
  @include('shared.sidenav');
  @include('shared.header');
  
  <div class="page-content" id="content">
  
      <br>
     
      <div class="card p-4">
        
        <h2 class="text-2xl font-bold  mb-4">Income  Report</h2>
            <div class="col-xl-12">
           
                  <form class="form-inline" id="Report">
                              <select class="form-control" id="incomeCategory" >
                                <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                      @if ($category->type == 'income')
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endif
                                    @endforeach
                                </select>
                                &nbsp;&nbsp;                            
                             
                                  <input type="month" class="form-control mr-2" id="incomeDate">
                                  
                                    <button class="btn btn-dark" type="submit">
                                        
                                      <i class="fa fa-filter fa-xs"></i> Filter
                                    </button>
                              
                              </form>
               
          <br>
          <table class="table table-striped" id="incomeReportTable">

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
              <h5>Income chart</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div id="piechart">
                    <canvas id="incomeChart" id="incomeReportTable"></canvas>
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="piechart">
                    <canvas id="incomeChartDate" id="incomeReportTable"></canvas>
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
  let chartCanvas = document.getElementById('incomeChart');
  let chartImage = chartCanvas ? chartCanvas.toDataURL("image/png") : "";

  let style = "<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style>";
  let win = window.open("", "", "width=800,height=800");
  win.document.write("<html><head><title>Income Report</title>" + style + "</head><body>");
  win.document.write("<h2>Income Report</h2>");
  win.document.write(table.outerHTML);
  
  if (chartImage) {
    win.document.write("<h3>Income Chart</h3>");
    win.document.write("<img src='" + chartImage + "' style='width:100%;' />");
  }

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#Report').submit(function (e) {
        e.preventDefault();
        $.ajax({
          url: "/income/filter",
          type: "POST",
          data: {
            date: $("#incomeDate").val(),
            icat: $("#incomeCategory").val()
          },
          headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          success: function (response) {
            // console.log("Response received:", response);
            let tableBody = $("#incomeTBody");
            tableBody.empty();
            
            if (response.length === 0) {
              tableBody.append("<tr><td colspan='6' class='text-center'>No records found</td></tr>");
            } else {
        // console.log(tableBody);
        $.each(response, function (index, income) {
            let row = `<tr>
                          <td>${income.date}</td>
                          <td>${income.source}</td>
                          <td>${income.category_name}</td>
                          <td>${income.description}</td>
                          <td>₹ ${income.amount}</td>
                      </tr>`;
            tableBody.append(row);
        });
            }
          },
          error: function (xhr) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
</body>
</html>