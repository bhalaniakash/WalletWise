<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">

    {{--
    <script type="text/javascript" src="lib/js/main.js"></script> --}}

    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: white;
            margin: 0;
            font-family: 'Arial, sans-serif'; 

        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background-color: white;
            color: black;
            margin-top: 5%;
            font-family: 'Arial, sans-serif'; 
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            font-family: 'Arial, sans-serif'; 
        }

        #add1 input,
        #add2 input {
            width: 300px;
            height: 40px;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Arial, sans-serif';
        }

        .table {
            width: 100%;     
            border-collapse: collapse;
            margin-top: 1rem;
            font-family: 'Arial, sans-serif'; 
        }

        .table tr {
            color: #000;
            background-color: #ffffff;
            font-family: 'Arial, sans-serif'; 
        }

        th,
        td {
            color: #000;
            background-color: #ffffff;
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            font-family: 'Arial, sans-serif'; 
        }

        th {
            background-color: #616b6b;
            color: #ffffff;
            text-transform: uppercase;
            align-items: center;
            font-family: 'Arial, sans-serif'; 
        }
    </style>

</head>

<body>
    <br>
    @include('shared.header');
    @include('shared.sidenav_admin');


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
    <title>header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">
    <link href="{{ asset('link/link.php') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="page-content" id="content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table class="table table-striped table-bordered">
            <thead style="background-color: #616b6b;">
                <tr>
                    <th colspan="3">
                        <center>
                            <h5>Income Categories</h5>
                        </center>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    @if($category->type == 'income')
                        <tr>
                            <td style="width: 70%;">{{ $category->name }}</td>
                            <td style="width: 15%;">
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="color: white;">Delete</button>
                                </form>
                            </td>
                            <td style="width: 15%;">
                                <form action="{{ route('admin.category.edit', $category->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="color: white;">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <br>
        <br>
        {{-- form here  expense category starts --}}

        <table class="table table-striped table-bordered">
            <thead style="background-color: #616b6b;">
                <tr>
                    <th colspan="3">
                        <center>
                            <h5>Expense Categories</h5>
                        </center>
                    </th>
                </tr>
                <tr>
                    <th scope="col" >Name</th>
                    <th colspan="2" >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    @if($category->type == 'expense')
                        <tr>
                            <td style="width: 70%;">{{ $category->name }}</td>
                            <td style="width: 15%;">
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="color: white;">Delete</button>
                                </form>
                            </td>
                            <td style="width: 15%;">
                                <form action="{{ route('admin.category.edit', $category->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="color: white;">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>