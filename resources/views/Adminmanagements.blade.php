<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="assets/css/productmanagement.css" />
    <script src="{{ asset('assests/js/jquery.js') }}"></script>

    <title>Product Management</title>
    <style>
        a{
            color:blue;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="/" class="brand">
            <i class="bx bxs-smile"></i>
            <span class="text">Cyber Cartel</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ url('/admindashboards') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboards</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/adminanalytics') }}">
                    <i class="bx bxs-analyse"></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/admincustomers') }}">
                    <i class="bx bxs-group"></i>
                    <span class="text">Customers</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ url('/adminmanagements') }}">
                    <i class="bx bxs-data"></i>
                    <span class="text">Product Management</span>
                </a>
            </li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li>
                <a class="dropdown-item text-center" href="login" style="color: red;">
                    <i class="bx bxs-log-out"></i> Log out
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">

        <!-- MAIN -->
        <main>
            <div class="content">
                <div class="head-title">
                    <div class="left">
                        <h1>Product Management</h1>
                        <ul class="breadcrumb"></ul>
                    </div>
                </div>
                    <a class="btn btn-outline-dark" a href="{{url('productmanagements/create')}}"> Add
                        product</a>
            </div>

            <ul class="box-info">
                <li>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th>Detail</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <div>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <td>{{$item -> id }}</td>
                                <td>{{$item -> name}}</td>
                                <td>
                                    <img src="{{ asset($item->photo) }}" style="width: 70px; height:70px;" alt="Img" />
                                </td>
                                <td>₱ {{$item -> price}}</td>
                                <td>{{ Str::limit($item -> details,'30','...')}}</td>
                                <td>{{$item -> category}}</td>
                                <td>
                                    <a href="{{url('productmanagements/'.$item -> id.'/edit')}}"
                                        class="btn btn-outline-secondary">Edit</a>
                                    <a href="{{url('productmanagements/'.$item -> id.'/delete')}}" class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure?')">
                                        Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </div>
                    </table>
                </li>
            </ul>
        </main>

    </section>
</body>

</html>