<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="/expenseMVC/">

    {{--
    <script type="text/javascript" src="lib/js/main.js"></script> --}}

    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: #F3E5D8;
            margin: 0;
            font-family: 'Arial, sans-serif';

        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background: #F3E5D8;
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

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

</head>

<body>
    <br>
    @include('shared.header');
    @include('shared.sidenav_admin');




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
                    <th colspan="4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Category List</h5>
                            <form class="d-flex align-items-center" style="gap: 10px;" id="categoryForm">
                                <select class="form-control" id="category">
                                    <option value="">All Categories</option>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                                <button class="btn btn-dark" type="submit">Show</button>
                            </form>
                        </div>

                    </th>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th colspan="32">Action</th>
                </tr>
            </thead>
            <tbody id="catTbody">
                @foreach($categories as $category)
                    {{-- @if($category->type == 'income') --}}
                    <tr>
                        <td style="width: 70%;">{{ $category->name }}</td>
                        @if($category->type == "expense")
                            <td style="width: 70%; color: red;">{{ $category->type }}</td>
                        @elseif($category->type == "income")
                            <td style="width: 70%; color: green;">{{ $category->type }}</td>


                        @endif
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
                                <button type="submit" class="btn btn-primary" style="color: white;">Update</button>
                            </form>
                        </td>
                    </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>

        <br>
        <br>
        {{-- form here expense category starts --}}
        {{--
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
                    <th scope="col">Name</th>
                    <th colspan="2">Action</th>
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
        </table> --}}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categoryForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: "/category/filter",
                    type: "POST",
                    data: {
                        cat: $("#category").val()
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function (response) {
                        let tableBody = $("#catTbody");
                        tableBody.empty();

                        if (response.length === 0) {
                            tableBody.append("<tr><td colspan='6' class='text-center'>No records found</td></tr>");
                        } else {
                            $.each(response, function (index, category) {
                                let row =
                                    `<tr>
                                <td>${category.name}</td>
                                <td>${category.type}</td>
                                <td style="width: 15%;">
                                    <form action="/categories/${category.id}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="color: white;">Delete</button>
                                    </form>
                                </td>
                                <td style="width: 15%;">
                                    <form action="/admin/category/${category.id}/edit" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="color: white;">Update</button>
                                    </form>
                                </td>
                            </tr>`;
                                tableBody.append(row);
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });

    </script>
</body>

</html>