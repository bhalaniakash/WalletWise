
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/expenseMVC/">

    {{-- <script type="text/javascript" src="lib/js/main.js"></script> --}}

    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: white; 
            margin: 0; 
            font-family: Arial, sans-serif;
        }
     
        .page-content {
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            background-color: white;
            color: black;
            margin-top: 5%;
        }
    
        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
        }
    
        #add1 input,
        #add2 input {
            width: 300px;
            height: 40px;
            padding: 0.5rem; /* Added padding for better usability */
            border: 1px solid #ced4da; /* Added border for better visibility */
            border-radius: 4px; /* Rounded corners */
            box-sizing: border-box; /* Ensures padding doesn't affect width */
        }
        
        .table {
            width: 100%; /* Ensures table takes full width */
            border-collapse: collapse; /* Removes gaps between table cells */
            margin-top: 1rem; /* Added spacing above tables */
        }
    
        .table tr {
            color: #000;
            background-color: #ffffff; /* Ensured consistent white background */
        }
    
        th,
        td {
            color: #000;
            background-color: #ffffff; /* Ensured consistent white background */
            padding: 0.75rem; /* Added padding for better spacing */
            text-align: left; /* Ensured left alignment for better readability */
            border: 1px solid #dee2e6; /* Added border for better table structure */
        }
    
        th {
            background-color: #616b6b; /* Kept the header background color */
            color: #ffffff; /* Ensured white text for contrast */
            text-transform: uppercase; /* Made header text uppercase for emphasis */
        }
    
      
    
    
    </style>
    
</head>

<body>
    <></>   
    @include('shared.header');
    @include('shared.sidenav_admin');

    <div class="page-content" id="content" >
        
        <div class="page-wrapper">
        <table class="table table-striped table-bordered">
            <thead style="background-color: #616b6b;">
                <tr>
                    <th colspan="3">
                        <center>
                            <h5>Income Categories</h5>
                        </center>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                @if($category->type == 'income')
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="color: white;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <table class="table table-striped table-bordered">
            <thead style="background-color: #616b6b;">
                <tr>
                    <th colspan="3">
                        <center>
                            <h5>Expense Categories</h5>
                        </center>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                @if($category->type == 'expense')
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="color: white;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <!-- <div id="Modal1" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">Update Income Category </h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="Dashboard/updateIncomeCategory">
                            <div class="form-group">
                                <input type="text" name="incomename" class="form-control" placeholder="1">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="update" class="btn btn-dark">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    

</body>

</html>