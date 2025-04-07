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
            background: #F3E5D8;
            margin-top: 0%;
             font-family:'Lato', sans-serif;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            margin-top: 5% !important;
             font-family:'Lato', sans-serif;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
             font-family:'Lato', sans-serif;
        }

        .admin-dashboard-title {
            font-size: 28px;
            font-weight: bold;
            color: #6B4226;
            padding: 12px 20px;
            border-radius: 8px;
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
                                <button type="submit" name="insert" style="font-size: x-large; border: none;">
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        setTimeout(() => {
            const alert = document.querySelector('[role="alert"]');
            if (alert) alert.remove();
        }, 2000); // 2 seconds
    </script>
</body>

</html>