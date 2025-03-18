<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Add Expense</title>
    <base href="/expenseMVC/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script type="text/javascript" src="lib/js/main.js"></script>
    {{-- @include("link.link"); --}}
    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background-color: white;
            color: black;
            margin-top: 5% !important;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
        }

        th,
        td {
            color: #000;
            background-color: white;
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
                <h1 class="h3 display">Add Expense</h1>
            </header>
            <form class="mt-3" method="POST" action="{{ route('expense.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expensename">Name: </label>
                            <input type="text" class="form-control" name="expense_name" placeholder="Expense name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expenseamount">Amount:</label>
                            <input type="number" class="form-control" name="amount" placeholder="Amount" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expensedate">Date: </label>
                            <input type="date" class="form-control" name="date" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomecategory">Category:</label>
                            <select class="form-control" name="category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    <p>{{ $category->name }}</p>
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_mode">Mode: </label>
                            <select class="form-control" name="payment_method" required>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Online">Online</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="comment">Description:</label>
                            <textarea class="form-control" rows="3" id="comment" name="description"></textarea>
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
        <section>
            <div class="container-fluid shadow">
                <br>
                <table class="table table-striped table-bordered" id="Report">
                    <thead style="background-color: #616b6b;">
                        <tr>
                            <th colspan="6">
                                <center>
                                    <h5>Expense details</h5>
                                </center>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <center>No Data Available</center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
        </section>

    </div>

</body>

</html>