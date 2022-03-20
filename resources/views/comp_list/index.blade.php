@extends ('layouts.layout_student')
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
                <h1>Student Complaint List</h1>
            </div>
            <div class="col-md-1">
                <button type="buttton" class="btn-lg btn-primary text-light">
                    <a style="text-decoration:none;" class="text-light" href="/comp_list/create"><i
                            class="fas fa-plus-circle fa-lg"></i></a>
                </button>
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
                                <th>Edit</th>
                                <th>Delete</th>
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
                                        <a href="/comp_list/show/{{ $comp->c_id }}" class="btn"><button type="button"
                                                class="btn btn-primary"><i class="fas fa-cog fa-sm"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/comp_list/delete/{{ $comp->c_id }}">
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

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>

            </div>
        </div>
    </div>
    






@endsection
