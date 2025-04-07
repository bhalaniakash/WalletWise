<link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
<br>
@include('shared.header');
@include('shared.sidenav_admin');

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<style type="text/css">
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
        margin-top: 5% !important;
        font-family: 'Arial, sans-serif';
    }

    .admin-dashboard-title {
        font-size: 28px;
        font-weight: bold;
        color: #6B4226;
        text-align: left;
        margin-bottom: 20px;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        border-radius: 5px;
    }

    button[type="submit"] {
        background: #6B4226;
        color: white;
        padding: 8px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 1.2rem;
        transition: all 0.3s ease-in-out;
        width: 20%;
        border: none;
    }

    button[type="submit"]:hover {
        background: #4E2F1E;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .page-content {
            margin-left: 1rem;
            margin-right: 1rem;
            padding: 10px;
        }
    }
</style>

<body>
    <div class="page-content" id="content">
        <br>
        <section>
            <div class="container">
                <h1 class="admin-dashboard-title">Update Category</h1>
                <div class="card">
                    <div class="card-body">
                        
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- For updating the record -->

                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $category->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Category Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income
                                    </option>
                                    <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


</html>