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
            font-family: 'Arial, sans-serif';
        }

        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            margin-top: 5% !important;
            width: calc(100% - 18rem);
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            font-family: 'Arial, sans-serif';
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
            font-family: 'Arial, sans-serif';
        }

        h1,
        h5 {
            color: #333;
            font-family: 'Arial, sans-serif';
        }

        */ .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
            font-family: 'Arial, sans-serif';
        }

        table {
            border-collapse: collapse;
            width: 100%;

        }
        th {
            /* background-color: #A08963; */
            background: #E6C7A5 !important;
              color: #6B4226;
        }
        td {
              color: #6B4226;
            font-family: 'Roboto Slab';
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <br>
    <div class="page-content" id="content">
        <div id="page-content">
            <!-- Regular Members Table -->

            <table class="table table-striped table-bordered">
                <thead>
                    <tr align="center">
                        <th colspan="4" >
                          
                                Active Members
                        </th>
                    </tr>
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
            <table class="table table-striped table-bordered">
                <thead style="background-color: #616b6b;">
                    <tr align="center">
                        <th colspan="5" >
                         
                           Inactive Members
                        </th>
                    </tr>
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