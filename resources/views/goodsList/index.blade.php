@extends ('layouts.layout_student')
@section('content')
    <title>Good List</title>
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






    <div class="container center p-5">
        <div class="row">
            <div class="col-md-11">
                <h2>Good List</h2>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <table id="GoodList" class="p-auto m-auto display table table-striped table-bordered text-center"
                        style="border-collapse:collapse;">
                        <thead>

                            <tr>
                                <th>Good Name</th>
                                <th>Delivery Status</th>
                                <th>Delivery Date</th>
                                <th>Collected Date</th>
                                <th>Parcel Status</th>
                                <th>Ready Date</th>
                                <th>Received Date</th>
                                <td>Estimated Arrival Date</td>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parcels as $parcel)
                                <tr>
                                    <th>{{ $parcel->p_id }}</th>
                                    <td>{{ $parcel->p_status }}</td>
                                    <td>{{ $parcel->receive_date }}</td>
                                    <td>{{ $parcel->collect_date }}</td>
                                    <td>{{ $parcel->std_status }}</td>
                                    <td>{{ $parcel->ready_date }}</td>
                                    <td>{{ $parcel->student_receive_date }}</td>
                                    <td>{{ $date[$b++] }}</td>
                                    <td>
                                        <a href="/Good-list/show/{{ $parcel->p_id }}" class="btn"><button type="button"
                                                class="btn btn-primary"><i class="fas fa-cog fa-sm"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/Good-list/delete/{{ $parcel->p_id }}">
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
                            </tr>
                        </tfoot>


                    </table>
                    <br>
                    <table class="table table-borderless table">
                        <tbody>
                            <tr>
                                <th></th>
                                <td></td>
                                <th></th>

                                <th>
                                    <div class="center" style="position:absolute; left:83%">
                                        <a href="/Good-list/report">
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
        <div class="row">
            <div class="col-md-12">

            </div>

        </div>
    </div>
    </div>






@endsection
