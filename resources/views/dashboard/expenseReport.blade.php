<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Expense Report</title>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        body {
                    font-family: "Poppins", sans-serif;
        font-weight: 300;
        font-style: normal; 
       
            font-variation-settings:
                "wdth" 100;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .page-content {
            margin-top: 5% !important;
            margin-left: 17rem;
            padding: 2rem;
            transition: all 0.3s ease-in-out;
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
            font-variation-settings:
                "wdth" 100;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
            font-variation-settings:
                "wdth" 100;
        }

        button[type="button"] {
            background: #6B4226;
            color: white;
            padding: 8px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.2rem;
            transition: all 0.3s ease-in-out;
            width: 20%;
            border: none;
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
        }

        button[type="button"]:hover {
            background: #4E2F1E;
            cursor: pointer;
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
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
            cursor: pointer;
        }

        .text-2xl {
            color: #A08963;
            font-family: 'Andada Pro', sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
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
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
        }
    </style>
</head>

<body>
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <div class="page-content">
        <div class="card p-4">
            <h2>Expense Report</h2>
            <div class="col-xl-12">
                <form class="form-inline mb-4" method="GET" action="{{ url()->current() }}">
                    <select class="form-control mr-2" id="expenseCategory" name="icat">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            @if ($category->type == 'expense')
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="month" class="form-control mr-2" id="expenseDate" name="date"
                        value="{{ request('date') }}">
                    <button type="submit">
                        <i class="fa fa-filter fa-xs"></i> Filter
                    </button>
                </form>

                <table class="table table-striped table-bordered" id="Report"
                    style="border-radius: 10px; overflow: hidden;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Payment Mode</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $currentUser = auth()->user();
                            $filteredexpenses = $expenseReport
                                ->where('user_id', $currentUser->id)
                                ->filter(function ($e) {
                                    $dateMatch = request('date') ? date('Y-m', strtotime($e->date)) == request('date') : true;
                                    $categoryMatch = request('icat') ? $e->category_id == request('icat') : true;
                                    return $dateMatch && $categoryMatch;
                                });
                        @endphp
                        @foreach ($filteredexpenses as $i)
                            <tr>
                                <td>{{ $i->date }}</td>
                                <td>{{ $i->expense_name }}</td>
                                <td>{{ $categories->where('id', $i->category_id)->first()?->name }}</td>
                                <td>{{ $i->payment_method }}</td>
                                <td>{{ $i->description }}</td>
                                <td>₹ {{ $i->amount }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="font-bold">Total:</td>
                            <td>₹ {{ number_format(collect($filteredexpenses)->sum('amount'), 2) }}</td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" id="downloadReport">Download Report</button>
            </div>
        </div>
        <div class="card mt-5 p-4">
            <h3 class="text-2xl  mb-4">Expense Chart [Total]</h3>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="expenseChart" width="400" height="300"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="expenseChartDate" width="400" height="300"></canvas>
                </div>
            </div>

        </div>
    </div>

    @php
        function generateRandomColor()
        {
            return 'rgb(' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ',' . mt_rand(50, 255) . ')';
        }

        $currentMonth = now()->format('Y-m');
        $user = auth()->user();

        $categoryWiseExpenses = $expenseReport
            ->where('user_id', $user->id)
            ->groupBy('category_id')
            ->map(fn($items) => $items->sum('amount'));

        $categoryLabels = $categories->whereIn('id', $categoryWiseExpenses->keys())->pluck('name');
        $categoryColors = collect($categoryLabels)->map(fn() => generateRandomColor())->toArray();

        $dateWiseExpense = $expenseReport
            ->where('user_id', $user->id)
            ->groupBy(fn($item) => \Carbon\Carbon::parse($item->date)->format('Y-m'))
            ->map(fn($items) => $items->sum('amount'));
        $dateLabelsI = $expenseReport
            ->where('user_id', $user->id)
            ->groupBy(fn($item) => \Carbon\Carbon::parse($item->date)->format('Y-m'))
            ->keys();
        $dateColorsI = collect($dateLabelsI)->map(fn() => generateRandomColor())->toArray();
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxe = document.getElementById('expenseChart');
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
            type: 'bar',
            data: datae,
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

        const ctx2 = document.getElementById('expenseChartDate');
        var dateLabelsI = @json($dateLabelsI->values());
        var dateWiseExpense = @json($dateWiseExpense->values());
        var dateColorsI = @json($dateColorsI);

        const data2 = {
            labels: dateLabelsI,
            datasets: [{
                label: 'Expense Distribution [Date]',
                data: dateWiseExpense,
                backgroundColor: dateColorsI,
                hoverOffset: 4
            }]
        };

        new Chart(ctx2, {
            type: 'bar',
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
            a.download = "Expense_Report.csv";
            a.click();
        }

        function downloadPDF() {
            let table = document.getElementById('Report').outerHTML;
            let style = "<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style>";
            let win = window.open("", "", "width=800,height=800");
            win.document.write("<html><head><title>Expense Report</title>" + style + "</head><body>");
            win.document.write("<h2>Expense Report</h2>");
            win.document.write(table);
            win.document.write("</body></html>");
            win.document.close();
            win.print();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#Report').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/expense/filter",
                    type: "POST",
                    data: {
                        date: $("#expenseDate").val(),
                        ecat: $("#expenseCategory").val()
                    },
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        console.log("Response received:", response);
                        let tableBody = $("#expenseTBody");
                        tableBody.empty();

                        if (response.length === 0) {
                            tableBody.append("<tr><td colspan='6' class='text-center'>No records found</td></tr>");
                        } else {
                            console.log(tableBody);
                            $.each(response, function (index, expense) {
                                let row = `<tr>
                                        <td>${expense.date}</td>
                                        <td>${expense.source}</td>
                                        <td>${expense.category_name}</td>
                                        <td>${expense.paymode}</td>
                                        <td>${expense.description}</td>
                                        <td>₹ ${expense.amount}</td>
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