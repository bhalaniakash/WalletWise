<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Income</title>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
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
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
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
            width: auto;
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
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                    onclick="this.parentElement.remove();">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 101.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z" />
                    </svg>
                </button>
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
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-plus-circle"></i> Add Expense
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(() => {
            const alert = document.querySelector('[role="alert"]');
            if (alert) alert.remove();
        }, 2000); // 2 seconds
    </script>
</body>

</html>