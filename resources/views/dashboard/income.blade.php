<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Add Income</title>

    <base href="/expenseMVC/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script type="text/javascript" src="lib/js/main.js"></script>
    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            font-family: 'Arial, sans-serif';
        }

        .page-content {
            margin-top: 5% !important;
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            color: #000;
            background-color: white;
            margin-top: 5% !important;
            font-family: 'Arial, sans-serif';
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            font-family: 'Arial, sans-serif';
        }

        th,
        td {
            color: #000;
            background-color: white;
            font-family: 'Arial, sans-serif';
        }
    </style>
</head>

<body>
    @include('shared.sidenav');
    @include('shared.header');
    <div class="page-content" id="content">
        <div class="container-fluid shadow">
            <br>
            <header>
                <h1 class="h3 display">Add Income </h1>
            </header>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form class="mt-3" method="POST" action="{{ route('income.store') }}">
                @csrf
                <input type="hidden" name="IId" value="1" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomename">Name: </label>
                            <input type="text" class="form-control" name="iname" id="" placeholder="Income name"
                                required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomeamount">Amount:</label>
                            <input type="number" class="form-control" name="iamount" id="" placeholder="Amount" required
                                value="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expensedate">Date: </label>
                            <input type="date" class="form-control" name="idate" id="incomedate" required />
                        </div>
                    </div>

                    <script>
                        // Get today's date in YYYY-MM-DD format
                        const today = new Date().toISOString().split("T")[0];

                        // Set the max attribute of the date input field
                        document.getElementById("incomedate").setAttribute("max", today);
                    </script>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomecategory">Category:</label>
                            <select class="form-control" name="icategory" id="">
                                @foreach($categories as $category)
                                    @if($category->type == 'income')
                                        <option value="{{ $category->id }}">
                                            <p>{{ $category->name }}</p>
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="comment">Description:</label>
                            <textarea class="form-control" rows="3" id="comment" name="idescription" placeholder=""
                                value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" name="insert" class="btn btn-dark">Insert</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>


    </div>


</body>

</html>