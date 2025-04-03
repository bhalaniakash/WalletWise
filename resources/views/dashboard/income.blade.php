<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f5f2;
            font-family: Arial, sans-serif;
        }

        .page-content {
            margin-left: 17rem;
            margin-top: 10% !important;
            margin-bottom: 5% !important;
            margin-right: 1rem;
            transition: all 0.4s;
            font-family: 'Arial, sans-serif';
            color: #6b4226;
            ;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
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
    </style>
</head>

<body>
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <div class="container">
        <div class="page-content">
            <h2 class="text-left mb-4">Add Income</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('income.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Income Name:</label>
                    <input type="text" class="form-control" name="iname" placeholder="Enter income name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount:</label>
                    <input type="number" class="form-control" name="iamount" placeholder="Enter amount" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control" name="idate" max="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category:</label>
                        <select class="form-control" name="icategory">
                            @foreach($categories as $category)
                                @if($category->type == 'income')
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="idescription" rows="3" placeholder="Optional"></textarea>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-custom">Insert</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>