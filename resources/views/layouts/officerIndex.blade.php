@extends('layouts.layout_officer')

@section('content')
    <style>
        button {
            margin-top: 10px;
            width: 180px;
        }

    </style>
    <div class="container">
        <h2>Welcome, Pusat Mel Officer</h2>

    </div>
    <div class="container" style="text-align:center;">
        <div class="row center" style="margin-top:50px;">
            <div class="container col-md-2"></div>
            <div class="container col-md-4">
                <div class="card" style=" width: 18rem;">
                    <img style="height:162px " class="card-img-top"
                        src="https://pendaftar.ump.edu.my/images/gallery/Kemudahan_Jabatan_Pendaftar/Pusat_Mel_Gambang3.jpg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><b>Active List</b></h5>
                        <a href="/officer/active-list/"><button class="dt-button">View Active List</button></a>
                        <a href="/officer/active-list/report"><button class="dt-button">View Active List Report</button></a>
                    </div>
                </div>

            </div>
            <div class="container col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://www.peabody.org.uk/media/14808/complaints-1.jpg"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><b>Complaint List</b></h5>
                        <a href="/comp_list/officer"><button class="dt-button">View Complaint List</button></a>
                        <a href="/comp_list/oreport"><button class="dt-button">View Complaint List Report</button></a>
                    </div>
                </div>
            </div>
            <div class="container col-md-2"></div>
        </div>
    </div>
@endsection
