<br>
@include('shared.header');
@include('shared.sidenav_admin');
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">

    {{-- <script type="text/javascript" src="lib/js/main.js"></script> --}}

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
        <div class="card shadow">
            <table class="table table-striped">
                <thead class="thead-dark" style="background-color: #616b6b;">
                    <tr>
                        <th colspan="3">
                            <center>
                                <h5>Categories</h5>
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ ucfirst($category->type) }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('admin/delete-category/'.$category->id) }}"
                                onClick="return confirm('Do you want to Delete? Y/N')"> Delete </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div id="Modal1" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">Update Income Category </h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="Dashboard/updateIncomeCategory">
                            <div class="form-group">
                                <input type="text" name="incomename" class="form-control" placeholder="1">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="update" class="btn btn-dark">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

</body>

</html>