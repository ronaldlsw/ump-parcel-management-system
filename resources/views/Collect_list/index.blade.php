@extends ('layouts.layout_warden')
@section('content')
    <title>Goods List</title>
    
    <p></p>
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
    <div class="container center p-1">
        <div class="row">
            <div class="col-md-11">
                <h1>Collected Goods List </h1>
            </div>
            <div class="col-md-1">
                <button type="buttton" class="btn-lg btn-primary text-light">
                    <a style="text-decoration:none;" class="text-light" href="/Collect_list/create"><i
                            class="fas fa-plus-circle fa-lg"></i></a>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="itemList" class="p-auto m-auto display table table-striped table-bordered text-center"
                        style="border-collapse:collapse;">
                        <thead>
                            <tr>
                                <th>Collected Date</th>
                                <th>Parcel ID</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Parcel Type</th>
                                <th>Parcel Status</th>
                                <th>Hostel</th>
                                <th>Notified Date</th>
                                <th>Student Contact No</th>
                                <th>Student Status</th>
                                <th>Student Picked Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->collect_date }}</td>
                                    <td>{{ $row->p_id }}</td>
                                    <td>{{ $row->u_id }}</td>
                                    <td>{{ $row->u_name }}</td>
                                    <td>{{ $row->p_type }}</td>
                                    <td>{{ $row->p_status }}</td>
                                    <td>{{ $row->p_address }}</td>
                                    <td>{{ $row->ready_date }}
                                    @if( $row->ready_date == '' )
                                    <a href="/Collect_list/notified/{{ $row->p_id }}" class="btn"><button type="button" 
                                    class="btn btn-info" class="fas fa-cog fa-sm" onclick="return confirm('Do you really want to Notify?')">Notify
                                            </button>
                                            <div id="myDIV"></div>
                                    @endif</td>
                                    <td>{{ $row->u_contact }}</td>
                                    <td>{{ $row->std_status }}</td>
                                    <td>{{ $row->student_receive_date }}</td>
                                    <td>
                                        <a href="/Collect_list/show/{{ $row->p_id }}" class="btn">
                                        <button type="button" class="btn btn-primary"><i class="fas fa-cog fa-sm"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/Collect_list/delete/{{ $row->p_id }}">
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Do you really want to delete?')">Delete</button>

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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    <br><br>
                    <table class="table table-borderless table">
                        <tbody>
                            <tr>
                                <th style="width:32%;text-align:left">Total Number of Goods (All) : </th>
                                <td><input style="width:40%;text-align:center" id="count" name="count" value="{{$count}}" readonly></input></td> 
                                <th style="width:41%;text-align:left">Number of Goods Taken by Students from Warden: </th>
                                <td><input style="width:40%;text-align:center" id="count3" name="count3" value="{{$count3}}" readonly></input></td> 
                            
                            </tr>
                            <tr>
                                <th style="width:32%;text-align:left">Number of Goods Collected by Warden : </th>
                                <td><input style="width:40%;text-align:center" id="count1" name="count1" value="{{$count1}}" readonly></input></td> 
                                <th style="width:41%;text-align:left">Number of Goods Ready for Collection from Warden: </th>
                                <td><input style="width:40%;text-align:center" id="count4" name="count4" value="{{$count4}}" readonly></input></td> 
                            
                            </tr>
                            <tr>
                                <th style="width:32%;text-align:left">Number of Goods Uncollected by Warden : </th>
                                <td><input style="width:40%;text-align:center" id="count2" name="count2" value="{{$count2}}" readonly></input></td> 
                                <th style="width:41%;text-align:left">Number of Goods Not Taken by Students from Warden: </th>
                                <td><input style="width:40%;text-align:center" id="count5" name="count5" value="{{$count5}}" readonly></input></td> 
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-borderless table">
                        <tbody>
                            <tr>
                                <th></th>
                                <td></td> 
                                <th></th>
                                <th> 
                                    <div class="center" style="position:absolute; left:69%">
                                        <button class="w3-btn w3-blue" onclick="window.print()">Print This Page</button>
                                    </div>
                                </th>
                                <th>
                                <div class="center" style="position:absolute; left:81%">
                                    <a href="/Collect_list/statement">
                                    <button class="w3-btn w3-blue" type="submit">Generate Report</button>
                                    </a>
                                </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
