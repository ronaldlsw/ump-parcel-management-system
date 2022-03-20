@extends ('layouts.active_list.officer')
@section('content')
    <title>Active List</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/b-1.7.0/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/b-1.7.0/datatables.min.js">
    </script>

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






    <div class="container center py-5">
        <div class="row">
            <div class="col-md-10">
                <h1>Active List</h1>

            </div>
            <div class="col-md-2 pt-2  ">

                <div class="d-flex justify-content-end">
                    <button class="btn-md btn-primary"><a style="text-decoration:none;" class="text-light"
                            href="/officer/active-list/report">
                            <i class="fas fa-file-alt fa-md"></i>
                        </a></button>
                    <div class="pl-2">
                        <button type="button" class="btn-md btn-primary text-light">
                            <a style="text-decoration:none;" class="text-light" href="/officer/active-list/create"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </button>
                    </div>
                </div>

            </div>
            <hr style="width:97.5%">
        </div>
        <div class="row">
            <div class="col-md-12">

                <table id="itemList" class="display table table-striped table-bordered text-center"
                    style="border-collapse:collapse;">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Parcel ID</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Arrival Date</th>
                            <th>Collection Date</th>
                            <th>Student Name</th>
                            <th>Student HP</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcels as $parcel)
                            <tr>
                                <th>{{ $a++ }}</th>
                                <td>{{ $parcel->p_id }}</td>
                                <td>{{ $parcel->p_address }}</td>
                                <td>{{ $parcel->p_status }}</td>
                                <td>{{ $parcel->p_type }}</td>
                                <td>{{ $parcel->receive_date }}</td>
                                @if ($parcel->collect_date == null)
                                    <td> <button type="button" class="btn btn-primary"><a class="text-light"
                                                href="/officer/active-list/updateC/{{ $parcel->p_id }}">Update</a></button>
                                    </td>
                                @else
                                    <td>{{ $parcel->collect_date }}</td>
                                @endif
                                <!--student Info-->
                                <td>{{ $parcel->u_name }}</td>
                                <td>{{ $parcel->u_contact }}</td>





                                <td>
                                    <a href="/officer/active-list/show/{{ $parcel->p_id }}" class="btn"><button
                                            type="button" class="btn btn-primary"><i class="fas fa-cog fa-sm"></i>
                                        </button>
                                    </a>

                                    <a href="/officer/active-list/delete/{{ $parcel->p_id }}">
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Do you really want to delete?')"><i class="fa fa-trash"
                                                aria-hidden="true"></i>
                                        </button>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="display:none;">
                        <tr>
                            <th></th>
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
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-bordered text-center">

                    <tr>
                        <th>Category </th>
                        <th> Parcel</th>
                        <th> Mail</th>

                    </tr>
                    <tr>
                        <th>Amount </th>
                        <td><input name="parcelCount" type="text" class="form-control form-control-sm " id="parcelCount"
                                value="{{ $countThings->sumParcel }}" placeholder="Number Of Parcels" readonly></input>
                        </td>
                        <td><input name="countMail" type="text" class="form-control form-control-sm" id="countMail"
                                value="{{ $countThings->sumMail }}" placeholder="Number Of Mail" readonly></input>
                        </td>

                    </tr>
                    <tr>
                        <th>Percentage</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
                                    role="progressbar" aria-valuenow="{{ $countThings->pctParcel }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width:{{ $countThings->pctParcel }}%">
                                    {{ $countThings->pctParcel }} %
                                </div>
                            </div>
                        </td>
                        <td>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated"
                                    role="progressbar" aria-valuenow="{{ $countThings->pctMail }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width:{{ $countThings->pctMail }}%">
                                    {{ $countThings->pctMail }} %
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="col-md-1 pt-2">


        </div>
    </div>






@endsection
