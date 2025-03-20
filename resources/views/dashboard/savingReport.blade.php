<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
  <title>Saving Report</title>
  <base href="/expenseMVC/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  {{-- add link.add over here  --}}
  {{-- <script type="text/javascript" src="lib/js/main.js"></script> --}}
  <style type="text/css">
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
          
        </div>
      </section>
      <br>
      <section>
        <div class="container-fluid shadow">
          <br>
          <form class="mt-3" method="POST" action="{{ route('budget.store') }}">
                @csrf
                <input type="hidden" name="IId" value="1" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomename">Expense limit: </label>
                            <input type="text" class="form-control" name="eGoal" id=""
                                placeholder="Expense goal" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomeamount">Saving Goal:</label>
                            <input type="number" class="form-control" name="sGoal" id=""
                                placeholder="Saving Goal" required value="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" name="insert" class="btn btn-dark">Add</button>
                        </div>
                    </div>
                </div>
            </form>
         <br>
        </div>
      </section>
    </div>
  </div>
  <script type="text/javascript">
    $('#print').click(function() {
      var printme = document.getElementById('Report');
      var wme = window.open("", "", "width=900,height=800");
      wme.document.write(printme.outerHTML);
      wme.document.close();
      wme.print();
    });
  </script>
</body>

</html>