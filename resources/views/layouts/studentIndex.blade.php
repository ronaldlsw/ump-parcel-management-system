@extends('layouts.layout_student')

@section('content')
    <style>
        button {
            margin-top: 10px;
            width: 180px;
        }

    </style>
    <div class="container">
        <h2>Welcome, College Resident</h2>

    </div>
    <div class="container" style="text-align:center;">
        <div class="row center" style="margin-top:50px;">
            <div class="container col-md-2"></div>
            <div class="container col-md-4">
                <div class="card" style=" width: 18rem;">
                    <img style="height:162px " class="card-img-top"
                        src="https://static.cdn.packhelp.com/wp-content/uploads/2019/06/06153014/plain-shipping-boxes-packhelp-ed.jpg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><b>Goods List</b></h5>
                        <a href="/Good-list"><button class="dt-button">View Goods List</button></a>
                        <a href="/Good-list/report"><button class="dt-button">View Goods List Report</button></a>
                    </div>
                </div>

            </div>
            <div class="container col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.peabody.org.uk/media/14808/complaints-1.jpg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><b>Complaint List</b></h5>
                        <a href="/comp_list"><button class="dt-button">View Complaint List</button></a>
                        <a href="/comp_list/create"><button class="dt-button">Make Complain</button></a>
                    </div>
                </div>
            </div>
            <div class="container col-md-2"></div>
        </div>
    </div>
@endsection
