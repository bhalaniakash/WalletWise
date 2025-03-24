<br>
@include('shared.header')
@include('shared.sidenav_admin')
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <base href="/expenseMVC/">

    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: white;
            margin-top: 0%;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background-color: white;
            margin-top: 5% !important;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;

        }

        #add1 input {
            width: 300px;
            height: 40px;
        }

        #add2 input {
            width: 300px;
            height: 40px
        }

        .table tr {
            color: #000;
            background-color: white;
        }

        th,
        td {
            color: #000;
            background-color: white;
        }
    </style>
</head>

<body>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
    <title>header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">
    <link href="{{ asset('link/link.php') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="page-content" id="content">
        <br>
        <section>
            <div class="row">
                <div class="container-fluid col-lg-12">
                    <div class="card shadow p-3" style="background-color: #616b6b; color: white;">
                            <h5>Add  Catagory</h5>
                        </div>

                        <div class="card-body">
                            <form id="addIncomeForm" method="post" action="{{ route('admin.category.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="incomeName" class="form-label">Category of Expense/Income</label>
                                    <input type="text" name="income_name" id="incomeName" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Category Type</label>
                                    <select name="income_type" id="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                </div>
                                <button type="submit" name="insert" class="btn btn-dark">Add Category</button>
                            </form>
                        </div>

                    </div>
                    <br>
                </div>
            </div>
        </section>
    </div>

</body>

</html>