<br>
@include('shared.header');
@include('shared.sidenav_admin');

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Edit Category</title>

    <style>
        /* General Styles */
        bbody {
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
    <div class="page-content" id="content">
        <br>
        <section>
            <div class="row">
                <div class="container-fluid col-lg-12">
                    <div class="card shadow p-3" style="background-color: #616b6b; color: white;">
                        <h5>Update Catagory</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- For updating the record -->

                            <label for="name">Category Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                                required>

                            <label for="type" class="form-label">Category Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income</option>
                                <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense
                                </option>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-dark">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>