<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">
    <br>
    @include('shared.header')
    @include('shared.sidenav_admin')

    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: #E6C7A5;
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

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            font-family: 'Arial, sans-serif';
        }

        .admin-dashboard-title {
            font-size: 28px;
            font-weight: bold;
            color: #E6C7A5;

            background: #6B4226;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
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

        @media (max-width: 768px) {
            .page-content {
                margin-left: 1rem;
                margin-right: 1rem;
                padding: 10px;
            }
        }
    </style>
</head>

<body>



    <div class="page-content" id="content">
        <br>
        <section>
            <div class="container">
                <h1 class="admin-dashboard-title">Add Category</h1>
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form id="addIncomeForm" method="post" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="incomeName" class="form-label">Category of Expense/Income</label>
                                <input type="text" name="income_name" id="incomeName" class="form-control" required
                                    autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Category Type</label>
                                <select name="income_type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="insert" style="width: 25%; font-size: x-large; border: none;">
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>