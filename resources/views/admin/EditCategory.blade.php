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
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: #F3E5D8;
            margin-top: 0%;
            font-family: 'Arial, sans-serif';
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background-color: white;
            margin-top: 5% !important;
            font-family: 'Arial, sans-serif';
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            color: #6B4226;
        }

        .container-fluid {
            margin-top: 20px;
        }

        h5 {
            color: #E6C7A5;
            background: #6B4226;
            padding: 12px 20px;
            border-radius: 8px;
            text-align: center;
        }

        button[type="submit"] {
            background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            width: 100%;
        }

        button[type="submit"]:hover {
            background: #8b6f4e;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="page-content" id="content">
        <br>
        <section>
            <div class="row">
                <div class="container-fluid col-lg-12">

                    <h5>Update Catagory</h5>


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