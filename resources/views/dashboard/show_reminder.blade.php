<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reminders</title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        .page-content {
            margin-top: 5% !important;
            margin-left: 17rem;
            padding: 2rem;
            transition: all 0.3s ease-in-out;
            color: #6b4226;
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
        }

        .card-body {
            background-color: #F5F5F5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
        }

        th {
            /* background-color: #A08963; */
            background: #E6C7A5 !important;
            color: #6B4226;
        }

        td {
            color: #A08963;
        }
    </style>
</head>

<body>
    <br>
    @include('shared.sidenav')
    @include('shared.header')

    <div class="page-content" id="content">
        <h2 class="text-2xl font-bold mb-4">Reminders</h2>
        <div class="card-body">

            <table border="1" class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                <thead>
                    <tr>
                        <th>Reminder Name</th>
                        <th>Due Date</th>
                        <th>Frequency</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Remaining days</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reminder as $reminder)
                        <tr>

                            <td>{{ $reminder->reminder_name }}</td>
                            <td>{{ $reminder->due_date }}</td>
                            <td>{{ $reminder->frequency }}</td>
                            <td>{{ $reminder->description }}</td>
                            <td>{{ $reminder->reminder_amount }}</td>
                            <td class="text-center">
                                {{ ceil(\Carbon\Carbon::now()->diffInDays($reminder->due_date, false)) }}
                            </td>
                            <td>
                                {{-- <a href="{{ route('reminder.edit', $reminder->id) }}">Edit</a> --}}
                                <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No reminders found.</td>
                        </tr>
                    @endforelse
                    @php
                        $totalAmount = $reminder->sum('reminder_amount');
                    @endphp

                    <tr>
                        <td colspan="4"><strong>Total:</strong></td>
                        <td colspan="3"><strong>{{ number_format($totalAmount, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>