<!DOCTYPE html>
<html>

<head>
  <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <title>Income Report</title>
  <base href="/expenseMVC/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  {{-- <link rel="stylesheet" type="text/css" href="link/link.css">
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
            <div style="margin-left: 1rem; margin-bottom: 1rem; font-size: 1rem; font-weight: bold; color: #4A5568; background: #F7FAFC; padding: 0.5rem 1rem; border-radius: 8px; display: inline-block;">
              <span style="color: #2D3748;">HOME</span> &gt; <span style="color: #3182CE;">INCOME REPORT</span>
            </div>
            <div class="col-xl-12">
              <div class="card shadow">
                <div class="card-body">
                  <form class="form-inline" method="get">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="month" class="form-control" name="date" placeholder="year" onchange="this.form.submit()" value="{{ request('data') }}" />
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
              $filteredincomes = $incomeReport->filter(function ($i) {
              $dateMatch = request('date') ? date('Y-m', strtotime($i->date)) == request('date') : true;
              $categoryMatch = request('icat') ? $i->category_id == request('icat') : true;
              return $dateMatch && $categoryMatch;
              });
              @endphp
              @foreach ($filteredincomes as $i)
              <tr>
                <td>{{ $i->date }}</td>
                <td>{{ $i->source }}</td>
                <!-- <td>{{ $i->category_id }}</td> -->
                <td>{{ $categories->where('id', $i->category_id)->first()?->name }}</td>
                <td>{{ $i->description }}</td>
                <td>₹ {{ $i->amount }}</td>
              </tr>
              @endforeach
              <tr>
                <td colspan="4">Total: </td>
                <td>₹ {{ number_format($incomeReport->sum('amount'),2)}}</td>
              </tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-start">
            <button class="btn btn-dark" id="print">Print</button>
          </div>
          <br>
        </div>
        <br>
      </section>
    </div>
  </div>
  <script type="text/javascript">
    document.getElementById('print').addEventListener('click', function() {
      var printme = document.getElementById('Report');
      var wme = window.open("", "", "width=900,height=800");
      wme.document.write(printme.outerHTML);
      wme.document.close();
      wme.print();
    });
  </script>
</body>

</html>