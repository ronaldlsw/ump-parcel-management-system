@extends ('layouts.layout_student')
@section('content')
    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
            placeholder: "Select a name "
        });

    </script>
    @foreach ($parcels as $parcel)
        <title></title>

        <body>
            <div class="container text-right m-auto mb-5 mt-5 ">
                <div class="row ">
                    <div class="col-md-3  ">

                    </div>
                    <div class="col-md-1 ">
                        <a href="/Good-list"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                    </div>
                    <div class="col-md-4  text-center  h1">
                        <p>Edit
                        </p>

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
                            echo '<form action="/Good-list/update" method="post" onsubmit="return confirm(\'Confirm Edit To Existing Data?\');">';
                        @endphp
                        @csrf

                        <table class="table table-borderless table">
                            <tbody>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Parcel ID</th>
                                        <th>Parcel Status</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <input style="width:80%;" name="p_id" type="text"
                                            class="form-control form-control-sm" id="p_id" placeholder="Enter Parcel ID"
                                            value="{{ $parcel->p_id }}" readonly></input>
                                    </td>
                                    <td>
                                        <select style="width:90%;" id="std_status" name="std_status" required>
                                            <option value="{{ $parcel->std_status }}" selected>
                                                {{ $parcel->std_status }}
                                            <option value="Pending" name="Pending">Pending</option>
                                            <option value="Ready for Collection">Ready for Collection</option>
                                            <option value="Received">Received</option>
                                            </option>




                                        </select>
                                    </td>
                                </tr>
                                <thead>
                                    <tr>

                                        <th>Delivery Status</th>
                                    </tr>
                                </thead>

                                <tr>

                                    <td>

                                        <select style="width:90%;" id="p_status" name="p_status" required>
                                            <option value="{{ $parcel->p_status }}" selected>{{ $parcel->p_status }}
                                            </option>
                                            <option value="Reached" disabled>Reached </option>
                                            <option value="Collected" disabled>Collected</option>

                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th></th>
                                    <th">
                                        </th>
                                </tr>
                                <tr>

                                    <td>



                                    </td>
                                    <td">
                                        </td>



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
