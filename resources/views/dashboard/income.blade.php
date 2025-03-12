<!DOCTYPE html>
<html>

<head>
    <title>Add Income</title>

    <base href="/expenseMVC/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    {{-- <script type="text/javascript" src="lib/js/main.js"></script> --}}
    <style type="text/css">
        body {
            min-height: 100vh;
            overflow-x: hidden;
          
        }

        .page-content {
            margin-top: 5% !important;
            margin-left: 17rem;
            margin-right: 1rem;
            transition: all 0.4s;
            color: #000;
            background-color: white;
            margin-top: 5% !important;
        }

        .content.active {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        th, td {
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
                <h1 class="h3 display">Add Income </h1>
            </header>

            <form class="mt-3" method="POST" action="Income/InsertIncome">
                <input type="hidden" name="IId" value="1" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomename">Name: </label>
                            <input type="text" class="form-control" name="iname" id=""
                                placeholder="Income name" required="" value="abc" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomeamount">Amount:</label>
                            <input type="number" class="form-control" name="iamount" id=""
                                placeholder="Amount" required="" value="7000" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomedate">Date: </label>
                            <input type="date" class="form-control" name="idate" id=""
                                placeholder="Income date" required="" value="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="incomecategory">Category:</label>
                            <select class="form-control" name="icategory" id="">
                                <option value=""></option>


                                <option value="1">name</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="comment">Description:</label>
                            <textarea class="form-control" rows="3" id="comment" name="idescription" placeholder="" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">

                            <button type="submit" name="update" class="btn btn-dark">Update</button>

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
                                    <h5>Income details</h5>
                                </center>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Amount</th>
                            <th scope="col">description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td><a class="btn btn-dark" href="Income/income?incomeId=1" name="update">Update</a>
                                <a class="btn btn-danger" href="Income/deleteIncome?incomeId=1" onClick="return confirm('Do you want to Delete? Y/N')"> Delete </a>
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