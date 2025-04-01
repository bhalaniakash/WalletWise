<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Add Expense</title>
    <base href="/expenseMVC/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script type="text/javascript" src="lib/js/main.js"></script>
    <style type="text/css">
        .page-content {
            margin-left: 17rem;
            margin-top: 5% !important;
            margin-right: 1rem;
            transition: all 0.4s;
            font-family: 'Arial, sans-serif';
            padding: 2rem;
            transition: all 0.3s ease-in-out;
            color: #6b4226;
            ;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            font-family: 'Arial, sans-serif';
        }

        .form-control {
            border-radius: 6px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        .live-preview {

            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }

        .row.mt-3 {
            margin-top: 1rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    @include('shared.sidenav');
    @include('shared.header');
    <div class="page-content" id="content">

        <br>
        <header>
            <h1 class="h3 display">Add Expense</h1>
        </header>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form class="mt-3 expense-form" method="POST" action="{{ route('expense.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expensename">Name: </label>
                        <input type="text" class="form-control" name="expense_name" id="expense_name"
                            placeholder="Expense name" required oninput="updatePreview()" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expenseamount">Amount:</label>
                        <input type="number" class="form-control" name="amount" id="expense_amount" placeholder="Amount"
                            required oninput="updatePreview()" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expensedate">Date: </label>
                        <input type="date" class="form-control" name="date" id="expense_date" required
                            oninput="updatePreview()" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="incomecategory">Category:</label>
                        <select class="form-control" name="category_id" id="expense_category"
                            onchange="updatePreview()">
                            @foreach($categories as $category)
                                @if($category->type == 'expense')
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="payment_mode">Mode: </label>
                        <select class="form-control" name="payment_method" id="payment_mode" required
                            onchange="updatePreview()">
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Online">Online</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="comment">Description:</label>
                        <textarea class="form-control" rows="3" id="expense_description" name="description"
                            oninput="updatePreview()"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <button type="submit" name="insert" style="width: 25%; font-size: x-large;">
                            Insert
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <br>
    </div>
</body>

</html>