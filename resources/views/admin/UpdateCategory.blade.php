<br>
@include('shared.header')
@include('shared.sidenav_admin')
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">

    <style type="text/css">
        body {
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


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" />
    <title>header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">
    <link href="{{ asset('link/link.php') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="page-content" id="content">
        <br>
        <section>
            <div class="row">
                <div class="container-fluid col-lg-12">
                    <div class="card shadow p-3" style="background-color: #616b6b; color: white;">
                            <h5>Update Catagory</h5>
                        </div>
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
                        <div class="card-body">
                        <form id="updateCategoryForm" method="POST" action="{{ route('admin.category.edit', $category->id) }}">
                            @csrf
                            @method('PUT') 
                                <div class="mb-3">
                                    <label for="incomeName" class="form-label">Category of Expense/Income</label>
                                    <input type="text" name="income_name" id="incomeName" class="form-control" value="{{ $category->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Category Type</label>
                                    <select name="income_type" id="type" class="form-control" required>
                                        <option value="{{ $category->type }}">{{ $category->type }}</option>
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                </div>
                                <button type="submit" name="insert" class="btn btn-dark">Update Category</button>
                            </form>

                        </div>

                    </div>
                    <br>
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