<!DOCTYPE html>
<html>

<head>
    <script src="{{ asset('asset/js/page.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/34ae9aae12.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/b-1.7.0/datatables.min.css" />
    <!--<link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" /> -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/b-1.7.0/datatables.min.js">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
    a.current {
        color: white !important;
    }
</style>
<script>
    $(function () {
        $('.nav-item a').each(function () {
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('current');
            }
        });
    });
</script>
    <style>
    
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
    <div class="container-fluid">
        <div class="row bg-dark">
             <div class="col-md-8">
                <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark">

                    <div class="navbar">
                        <a class="navbar-brand" href="#"><i class="fas fa-box-open"></i> UPMS</a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/Collect_list" >Collected Lists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Uncollect_list">Uncollected List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Collect_list/statement">Report Statement</a>
                            </li>
                        </ul>

                    </div>
            </div>
            <div class="col-md-3 pt-3 text-right">
            </div>
            <div class="col-md-1 pt-3 ">
            <button type="button" class="btn btn-danger">
                <a style="text-decoration:none; color:white;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
            </nav>
        </div>
    </div>

</head>

<body>
    @yield ('content')
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
