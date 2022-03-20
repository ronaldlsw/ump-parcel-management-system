<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UMP Parcel Management System</title>

    <!-- Scripts-->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/34ae9aae12.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://www.datatables.net/media/css/site-examples.css?_=0602f7ec58abe00302963423bf7a8d5a">

    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://www.datatables.net/examples/resources/demo.js"></script>

    
    <style>
        input
        {
            border:1px solid black;
        }
        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .nav-link active {background-color: #3e8e41;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-box-open"></i>
                UPMS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link"  href="/admin/ul" aria-current="page">User List</a>
                            <div class="dropdown-content">
                                <a href="/admin/ul">View User List</a>
                                <a href="/admin/ul/report">View User List Report</a>
                                <a href="/admin/ul/create">Create New User</a>
                            </div>
                        </div>
                        </li>
                        <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link" href="/admin/active-list/" aria-current="page"> Active List </a>
                            <div class="dropdown-content">
                                <a href="/admin/active-list/">View Active List</a>
                                <a href="/admin/active-list/report">View Active List Report</a>
                            </div>
                        </div>
                        </li>
                        <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link" href="/comp_list/admin">Complaint List</a>
                            <div class="dropdown-content">
                                <a href="/comp_list/admin">View Complaint List</a>
                                <a href="/comp_list/report">View Complaint List Report</a>
                            </div>
                        </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                           
                        @else
                        <li class="nav-item">
                                <a class="nav-link" href="#" style="margin-top:5px;">
                                    {{ Auth::user()->u_name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="/logout" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="margin-top:5px;width:40px; height:35px;">
                                        <i class="fas fa-sign-out-alt fa-lg"></i></button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer class="footer text-light bg-dark font-small fixed-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright UMP Parcel Management System (UPMS) 2021. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
</html>
