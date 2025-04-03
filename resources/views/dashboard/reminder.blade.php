<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reminders</title>
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
            background: #A08963;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bolder;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <div class="container">
        <div class="page-content">
            <h2 class="text-center mb-4">Add Reminders</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('reminder.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Expense Name:</label>
                    <input type="text" class="form-control" name="reminder_name" placeholder="Enter expense name"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount:</label>
                    <input type="number" class="form-control" name="reminder_amount" placeholder="Enter amount" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Due Date:</label>
                        <input type="date" class="form-control" name="due_date" min="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Payment frequency:</label>
                        <select class="form-control" name="reminder_frequency">
                            <option value="single Payment">Single Payment</option>
                            <option value="monthly">Monthly</option>
                            <option value="semi_annual">Semi annual</option>
                            <option value="annual">Yearly</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="reminder_description" rows="3" placeholder="Optional"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-custom w-50">Insert</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>