<br>
@include('shared.header')
@include('shared.sidenav_admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
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
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
            width: calc(100% - 2rem);
        }

        h1, h5 {
            color: #333;
        } */

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <br>
    <div class="page-content" id="content">
        <div id="page-content">
            <h1>Welcome</h1>

            <!-- Regular Members Table -->
            <table class="table table-striped table-bordered">
                <thead style="background-color: #616b6b;">
                    <tr>
                        <th colspan="4">
                            <center><h5>Regular Members</h5></center>
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
                    @foreach($members as $user)
                    @if ($user->is_Admin == 'No' && $user->plan_type == 'regular')
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->age }}</td>
                        <td><img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" height="100"></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Premium Members Table -->
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #616b6b;">
                            <tr>
                                <th colspan="4">
                                    <center><h5>Premium Members</h5></center>
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
                            @foreach($members as $user)
                            @if ($user->is_Admin == 'No' && $user->plan_type == 'premium')
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->age }}</td>
                                <td><img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" height="100"></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
