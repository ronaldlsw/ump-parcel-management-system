@extends('layouts.layout_warden')

@section('content')
    <style>
        button {
            margin-top: 10px;
            width: 180px;
        }

    </style>
    <div class="container">
        <h2>Welcome, Residential Warden</h2>
        <hr>
    </div>
    <div class="container" style="text-align:center;">
        <div class="row center" style="margin-top:50px;">
            <div class="container col-md-4"></div>


            <div class="container col-md-4">
                <div class="card" style="width: 25rem;">
                    <img class="card-img-top" src="https://finog.ump.edu.my/images/Photos/KK4_Hostel_view_1.jpg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><b>Collected List</b></h5>
                        <a href="/Collect_list"><button class="dt-button">View Collected List</button></a>
                        <a href="/Uncollect_list"><button class="dt-button">View Unollected List</button></a>
                        <a href="/Collect_list/statement"><button class="dt-button">View Collected List Report</button></a>
                    </div>
                </div>
            </div>
            <div class="container col-md-4"></div>
        </div>


    </div>

@endsection
