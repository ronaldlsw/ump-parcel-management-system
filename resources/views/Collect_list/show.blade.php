@extends ('layouts.layout_warden')
@section('content')
    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
            placeholder: "Select a name "
        });

    </script>
    @foreach ($data as $row)
        <title>Edit Goods Lists</title>

        <body>
            <div class="container text-right m-auto mb-5 mt-5 ">
                <div class="row ">
                    <div class="col-md-3  ">

                    </div>
                    <div class="col-md-1 ">
                        <a href="/Collect_list"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                    </div>
                    <div class="col-md-4  text-center  h1">
                        <p>Edit
                        <p>
                    </div>
                    <div class="col-md-1   pt-2">
                    </div>
                    <div class="col-md-3   pt-2">
                    </div>
                </div>
                <div class="row py-4    ">
                    <div class="col-md-3"> </div>

                    <div class="col-md-6 border rounded p-2">
                        @php
                            echo '<form action="/Collect_list/update" method="post" onsubmit="return confirm(\'Confirm Edit To Existing Data?\');">';
                        @endphp
                        @csrf
                        <table class="table table-borderless table">
                            <tbody>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Parcel ID</th>
                                        <th>Parcel Collected Date</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <input style="width:80%;" name="p_id" type="text"
                                            class="form-control form-control-sm" id="p_id" placeholder="Enter Parcel ID"
                                            value="{{ $row->p_id }}" readonly></input>
                                    </td>
                                    <td>
                                        <input style="width:90%;" id="collect_date" name="collect_date" type = "date"
                                        class="form-control form-control-sm" placeholder="Enter Collected Date"
                                        value="{{ $row->collect_date }}"></input>
                                    </td>
                                </tr>                  
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Parcel Type</th>
                                        <th>Parcel Status</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <select style="width:80%;" name="p_type" type="text"required>
                                            <option value="{{ $row->p_type }}"selected>{{ $row->p_type }}<option>
                                            <option value="Parcel">Parcel</option>
                                             <option value="Mail">Mail</option>
                                            </select>
                                    </td>
                                    <td>
                                        <select style="width:90%;" id="p_status" name="p_status"required>
                                            <option value="{{ $row->p_status }}"selected>{{ $row->p_status }}<option>
                                            <option value="Reached">Reached</option>
                                            <option value="Collected">Collected</option>
                                        </select>
                                    </td>
                                </tr>             
                                <thead class="thead-dark">
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <input style="width:80%;" name="u_id" type="text"
                                            class="form-control form-control-sm" id="u_id" placeholder="Enter User Id"
                                            value="{{ $row->u_id }}" readonly></input>
                                    </td>
                                    <td>
                                        <input style="width:90%;" id="u_name" name="u_name" type="text"
                                            class="form-control form-control-sm" placeholder="Enter User Name"
                                            value="{{ $row->u_name }}" readonly></input>
                                    </td>
                                </tr>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Notified Date</th>
                                        <th>Contact No</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <input style="width:80%;" name="ready_date" type="date"
                                            class="form-control form-control-sm" id="ready_date" placeholder="Notify the Student"
                                            value="{{ $row->ready_date }}"></input>
                                    </td>
                                    <td>
                                        <input style="width:90%;" id="u_contact" name="u_contact" type="text"
                                            class="form-control form-control-sm" placeholder="Enter Contact No"
                                            value="{{ $row->u_contact }}" readonly></input>
                                    </td>
                                </tr>
                               <thead class="thead-dark">
                                    <tr>
                                        <th>Student Picked Status</th>
                                        <th>Student Picked Date</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <select style="width:80%;" name="std_status" id="std_status" required>
                                            <option value="{{ $row->std_status }}"selected>{{ $row->std_status }}<option>
                                            <option>Pending</option>
                                            <option>Ready for Collection</option>
                                            <option>Received</option>
                                            
                                            </select>
                                    </td>
                                    <td>
                                        <input style="width:90%;" id="student_receive_date" name="student_receive_date" type="date"
                                            class="form-control form-control-sm" placeholder="Enter Student Picked Date"
                                            value="{{ $row->student_receive_date }}" ></input>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" style="width:100%" class="btn btn-primary"> Update </button>
                        </form>
                     </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>
            </div>
        </body>
    @endforeach
@endsection
