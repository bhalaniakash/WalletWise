<!DOCTYPE html>
<html>

<head>
  <title>Saving Report</title>
  <base href="/expenseMVC/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  {{-- add link.add over here  --}}
  <script type="text/javascript" src="lib/js/main.js"></script>
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

    th,
    td {
      color: #000;
      background-color: white;
    }
  </style>
</head>

<body class="margin-top:25px;">
  @include('shared.sidenav');
  @include('shared.header');
  <div class="page-content" id="content">
    <div id="page-wrapper">
      <br>
      <section>
        <div class="container-fluid">
          <div class="row">
            <div style="margin-left: 1rem; margin-bottom: 1rem; font-size: 1rem; font-weight: bold; color: #4A5568; background: #F7FAFC; padding: 0.5rem 1rem; border-radius: 8px; display: inline-block;">
              <span style="color: #2D3748;">HOME</span> &gt; <span style="color: #3182CE;">SAVING REPORT</span>
            </div>

            <div class="col-xl-12">
              <div class="card shadow">
                <div class="card-body">
                  <form class="form-inline" method="" action="">
                    <div class="form-group">
                      <input type="month" class="form-control" name="date" id="" required="" />
                      &nbsp;
                      &nbsp;
                      <button type="submit" name="insert" class="btn btn-dark">Enter</button>
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
            <thead style="background-color: #121212;">
              <tr>
                <th colspan="2">
                  <center>
                    <h5>Saving details</h5>
                  </center>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="col">Total Income:</th>
                <td scope="col"></td>
              </tr>
              <tr>
                <th scope="col">Total Expense:</th>
                <td scope="col"></td>
              </tr>
              <tr>
                <th scope="col">Total Saving:</th>
                <td scope="col"></td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-dark" id="print">print</button>
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