<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Admin Dashboard</title>
    <br>
    @include('shared.header')
    @include('shared.sidenav_admin')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F3E5D8;
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            margin-top: 5%;
            width: calc(100% - 18rem);
            padding: 2rem;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h5 {
            color: #6B4226;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #fff;
            text-align: left;
            color: #6B4226;
        }

        th {
            background: #E6C7A5 !important;
            color: #6B4226;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
            color: white;
        }

        h5 {
            display: flex;
            justify-content: flex-start;
        }

        .btn-danger {
            background: red;
        }
    </style>
</head>

<body>
    <br>
    <div class="page-content" id="content">
        <div id="page-content">
            <!-- Regular Members Table -->

            <h5>Active Members</h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Profile Picture</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Merge reports and extract unique user IDs
                        $activeUserIds = $expenseReport->concat($incomeReport)
                            ->where('is_Admin', '!=', 'Yes')
                            ->where('updated_at', '>=', \Carbon\Carbon::now()->subWeek())
                            ->pluck('user_id')
                            ->unique();
                        // Fetch all inactive users in one query
                        $activeUsers = \App\Models\User::whereIn('id', $activeUserIds)->get();
                    @endphp

                    @foreach($activeUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->age }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" height="100"
                                    style="border-radius: 10%; object-fit: cover;">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Premium Members Table -->
            <h5>Inactive Members</h5>
            <table class="table table-striped table-bordered">
                <thead style="background-color: #616b6b;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Profile Picture</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Ensure both reports are collections before merging
                        $expenseReport = collect($expenseReport);
                        $incomeReport = collect($incomeReport);

                        // Extract unique user IDs from both reports for active users
                        $activeUserIds = $expenseReport->concat($incomeReport)
                            ->where('is_Admin', '!=', 'Yes')
                            ->where('updated_at', '>=', \Carbon\Carbon::now()->subWeek()) // Active users within the last week
                            ->pluck('user_id')
                            ->unique();

                        // Extract inactive user IDs (users who haven't updated in the last week)
                        $inactiveUserIds = $expenseReport->concat($incomeReport)
                            ->where('is_Admin', '!=', 'Yes')
                            ->where('updated_at', '>=', \Carbon\Carbon::now()->subWeek()) // Inactive users
                            ->pluck('user_id')
                            ->unique();
                        // Fetch all non-admin users who have no records in reports
                        $allNonAdminUsers = \App\Models\User::where('is_Admin', '!=', 'Yes')->pluck('id');
                        $usersWithoutRecords = $allNonAdminUsers->diff($expenseReport->pluck('user_id')->merge($incomeReport->pluck('user_id')));

                        // Final inactive users = inactive users + users without records, but excluding active users
                        $finalInactiveUserIds = $inactiveUserIds->merge($usersWithoutRecords)->diff($activeUserIds);

                        // Fetch inactive users
                        $inactiveUsers = \App\Models\User::whereIn('id', $finalInactiveUserIds)->get();
                    @endphp

                    @foreach($inactiveUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->age }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" height="100"
                                    style="border-radius: 10%; object-fit: cover;">
                            </td>
                            <td>
                                <form action="{{ route('members.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="color: white;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>