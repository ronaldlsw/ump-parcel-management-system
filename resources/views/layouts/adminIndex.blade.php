@extends('layouts.layout_admin')

@section('content')
    <style>
        button {
            margin-top: 10px;
            width: 180px;
        }

    </style>
    <div class="container">
        <h2>Welcome, Pusat Mel Office (Admin)</h2>

    </div>
    <div class="container" style="text-align:center;">
        <div class="row" style="margin-top:50px;">
            <div class="container col-md-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style=" width: 18rem;">
                        <div class="center p-2 bg-dark">
                            <img style="text-align:center;height:150px; width:150px; " class="card-img-top"
                                src="https://www.pavilionweb.com/wp-content/uploads/2017/03/user-300x300.png"
                                alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><b>User List</b></h5>
                            <a href="/admin/ul"><button class="dt-button">View User List</button></a>
                            <a href="/admin/ul/report"><button class="dt-button">View User List Report</button></a>
                            <a href="/admin/ul/create"><button class="dt-button">Create New User</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style=" height:25rem;width: 18rem;">
                        <img style="height:162px " class="card-img-top"
                            src="https://pendaftar.ump.edu.my/images/gallery/Kemudahan_Jabatan_Pendaftar/Pusat_Mel_Gambang3.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><b>Active List</b></h5>
                            <a href="/admin/active-list/"><button class="dt-button">View Active List</button></a>
                            <a href="/admin/active-list/report"><button class="dt-button">View Active List Report</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4">
                <div class="d-flex justify-content-center">
                    <div class="card" style="height:25rem; width: 18rem;">
                        <img style="height:162px " class="card-img-top"
                            src="https://www.peabody.org.uk/media/14808/complaints-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><b>Complaint List</b></h5>
                            <a href="/comp_list/admin"><button class="btn dt-button">View Complaint List</button></a>
                            <a href="/comp_list/report"><button class="btn dt-button">View Complaint List Report</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
