<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="/img/logo-removebg-preview.png">
    <title>Add Income</title>

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
            color: #6b4226;;
        }

       

        .form-control {
            border-radius: 6px;
            padding: 10px;
            border: 1px solid #ccc;
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
    <div class="page-content" id="content">
       
            <br>
            <header>
                <h1 class="h3 display">Add Income</h1>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="iname" id="iname" placeholder="Income name" required oninput="updatePreview()" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Amount:</label>
                            <input type="number" class="form-control" name="iamount" id="iamount" placeholder="Amount" required oninput="updatePreview()" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date:</label>
                            <input type="date" class="form-control" name="idate" id="incomedate" required oninput="updatePreview()" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control" name="icategory" id="icategory" onchange="updatePreview()">
                                @foreach($categories as $category)
                                    @if($category->type == 'income')
                                        <option value="{{ $category->id }}">💰 {{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" rows="3" name="idescription" id="idescription" placeholder="Optional" oninput="updatePreview()"></textarea>
                        </div>
                    </div>
                </div>
                <div class="live-preview" id="preview">
                    <strong>Live Preview:</strong> No income added yet.
                </div>
                <div class="row mt-3">
                    <div class="col" style="text-align: center;">
                        <button type="submit" class="btn " style="width: 100%;">Insert 
                            <i class="fa fa-plus-circle fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
      
        <br>
    </div>

    <script>
        function updatePreview() {
            let name = document.getElementById("iname").value || "[Name]";
            let amount = document.getElementById("iamount").value || "[Amount]";
            let date = document.getElementById("incomedate").value || "[Date]";
            let category = document.getElementById("icategory").options[document.getElementById("icategory").selectedIndex]?.text || "[Category]";
            let desc = document.getElementById("idescription").value || "[No Description]";
            document.getElementById("preview").innerHTML = `<strong>Preview:</strong> ${name} - ${amount} on ${date} in ${category}. ${desc}`;
        }
    </script>
</body>

</html>
