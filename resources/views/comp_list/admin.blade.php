@extends ('layouts.layout_admin')
@section('content')
    <title>Complaint List</title>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#itemList').DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
        });

    </script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">





    <div class="container center p-5">
        <div class="row">
            <div class="col-md-11">
                <h1>Complaint List</h1>
            </div>
            
            <div class="row">
                <div class="col-md-12">

                    <table id="itemList" class="p-auto m-auto display table table-striped table-bordered text-center"
                        style="border-collapse:collapse;">
                        <thead>

                            <tr>
                                <th>Complaint ID</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Date and Time</th>
                                <th>Complaint Type</th>
                                <th>Complaint Description</th>
                                <th>Status</th>
                                <th>Edit & Notify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complains as $comp)
                                <tr>
                                    <th>{{ $comp->c_id }}</th>
                                    <td>{{ $comp->u_id }}</td>
                                    <th>{{ $comp->u_name }}</th>
                                    <td>{{ $comp->c_date }}</td>
                                    <td>{{ $comp->c_type }}</th>
                                    <td>{{ $comp->c_desc }}</td>
                                    <td>{{ $comp->c_status }}</td>
                                    <td>
                                        <a href="/comp_list/ashow/{{ $comp->c_id }}" class="btn"><button type="button"
                                                class="btn btn-primary"><i class="fas fa-cog fa-sm"></i>
                                            </button>
                                        </a>
                                    </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot style="display:none;">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>


                    </table>

                </div>
                <table class="table table-borderless table">
                            <tbody>
                                    <tr>
                                        <th style="width:30%;text-align:left">Total Number of complaints : </th>
                                        <td><input style="width:80%;text-align:center" id="count" name="count" value="{{$count}}" readonly></input></td> 
                                    </tr>
                                    <tr>
                                        <th style="width:30%;text-align:left">Total Number of Resolved Complaints: </th>
                                        <td><input style="width:80%;text-align:center" id="count1" name="count1" value="{{$count1}}" readonly></input></td> 
                                        <th style="width:30%;text-align:left">Total Number of In Investigation : </th>
                                        <td><input style="width:80%;text-align:center" id="count2" name="count2" value="{{$count2}}" readonly></input></td> 
                                    </tr>
                                    <tr>
                                        <th style="width:30%;text-align:left">Total Number of Damaged Goods: </th>
                                        <td><input style="width:80%;text-align:center" id="count3" name="count3" value="{{$count3}}" readonly></input></td> 
                                        <th style="width:38%;text-align:left">Total Number of Lost Goods : </th>
                                        <td><input style="width:80%;text-align:center" id="count4" name="count4" value="{{$count4}}" readonly></input></td> 
                                    </tr><br>
                                    <tr>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th> <a href="/comp_list/report/" ><button class="btn-lg btn-primary text-light" >Generate Report</button></a></th>
                                    </tr>
                                    </tbody>
                    </table>

                                    
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>

            </div>
        </div>
    </div>
    






@endsection
