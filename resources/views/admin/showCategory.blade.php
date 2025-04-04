<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="/expenseMVC/">
    <script type="text/javascript" src="lib/js/main.js"></script>

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
            /* background-color: #A08963; */
            background: #E6C7A5 !important;
            color: #6B4226;
        }

        td {
            color: #6B4226;
            font-family: 'Roboto Slab';
            font-size: 1rem;
        }
    </style>

</head>

<style>
    body {
        min-height: 100vh;
        overflow-x: hidden;
        background: #F3E5D8;
        margin: 0;
        font-family: 'Arial, sans-serif';
    }

    .forBg {
        background: #F3E5D8;
        padding: 50px;
    }

    .page-content {
        margin-left: 17rem;
        margin-right: 1rem;
        transition: all 0.4s;
        background: #fff;
        margin-top: 5%;
        padding: 3%;
    }

    .admin-dashboard-title {
        font-size: 32px;
        font-weight: bold;
        color: #6B4226;
        text-align: left;
        margin-bottom: 20px;
        text-transform: uppercase;
        padding: 10px;
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    th {
        background: #E6C7A5 !important;
        color: #6B4226;
        padding: 10px;
    }

    td {
        color: #6B4226;
        padding: 10px;
        font-size: 1rem;

    }

    button {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: 0.3s;
        width: 100%;
        cursor: pointer;
    }

    .filter-section {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
        width: 100%;
        margin-right: 8px;
    }

    #category {
        width: auto;
        padding: 6px 12px;
        border-radius: 6px;
        margin-right: 8px;
    }

    #filter {
        background: #6B4226;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        font-size: 1rem;
        transition: 0.3s ease-in-out;
        border: none;
        padding: 8px 16px;
    }

    #filter:hover {
        background: #8A5A3D;
    }


    @media (max-width: 768px) {
        .page-content {
            margin-left: 1rem;
            margin-right: 1rem;
        }
    }
</style>

<body>
    <br>
    @include('shared.header')
    @include('shared.sidenav_admin')
    <div class="forBg">
        <div class="page-content" id="content" style="border-radius: 10px; overflow: hidden;">
            <div style="display: flex; justify-content: space-between;">
                <h1 class="admin-dashboard-title">Category List</h1>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                <div class="filter-section">
                    <form id="categoryForm" class="d-flex align-items-center justify-content-end gap-2">
                        <select class="form-control" id="category">
                            <option value="">All Categories</option>
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select>
                        <button class="btn btn-dark" type="submit" id="filter">Show</button>
                    </form>
                </div>

            </div>
            <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Type</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody id="catTbody">
                    @foreach($categories as $category)
                        <tr>
                            <td width="40%">{{ $category->name }}</td>
                            <td
                                style="color: {{ $category->type == 'expense' ? 'red' : 'green' }}; width: 40%; text-align: center;">
                                {{ ucfirst($category->type) }}
                            </td>
                            <td width="10%" style="text-align: center;">
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td width="10%" style="text-align: center;">
                                <form action="{{ route('admin.category.edit', $category->id) }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categoryForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: "/category/filter",
                    type: "POST",
                    data: { cat: $("#category").val() },
                    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                    success: function (response) {
                        let tableBody = $("#catTbody");
                        tableBody.empty();

                        if (response.length === 0) {
                            tableBody.append("<tr><td colspan='4' class='text-center'>No records found</td></tr>");
                        } else {
                            $.each(response, function (index, category) {
                                let row = `<tr>
                                    <td width="40%">${category.name}</td>
                                    <td width="40%"  style="color: ${category.type === 'expense' ? 'red' : 'green'}; style="text-align: center;" >
                                        ${category.type.charAt(0).toUpperCase() + category.type.slice(1)}
                                    </td>

                                    <td  width="10%" style="text-align:center;">
                                        <form action="/categories/${category.id}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                    <td width="10%">
                                        <form action="/admin/category/${category.id}/edit" method="GET">
                                            <button type="submit" class="btn btn-primary">Update</button>
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