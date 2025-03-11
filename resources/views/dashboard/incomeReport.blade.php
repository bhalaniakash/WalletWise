<!DOCTYPE html>
<html>

<head>
  <title>Income Report</title>
  <base href="/expenseMVC/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" type="text/css" href="link/link.css">
  <script type="text/javascript" src="lib/js/main.js"></script>
  <style type="text/css">
    body {
      min-height: 100vh;
      overflow-x: hidden;
    }

    .page-content {
      margin-left: 17rem;
      margin-right: 1rem;
      transition: all 0.4s;
    }

    .content.active {
      margin-left: 1rem;
      margin-right: 1rem;
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
            <div class="col-xl-12">
              <div class="card shadow">
                <div class="card-body">
                  <form class="form-inline">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="month" class="form-control" name="date" placeholder="year" required />
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <select class="form-control" name="icat">
                            <option value="">All</option>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <input type="submit" value="Enter" class="btn btn-primary" id="table">
                        </div>
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
            <thead style="background-color: #616b6b;">
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
                <th>Amount</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="3">Total:</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-primary" id="print">Print</button>
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