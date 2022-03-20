@extends ('layouts.active_list.officer')
@section('content')
    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
            placeholder: "Select a name "
        });

    </script>

    <style>
        .td {
            style="width:50%;"
        }

    </style>
    @foreach ($parcels as $parcel)
        <title></title>

        <body>
            <div class="container mt-2">
                <div class="row ">
                    <div class="col-md-3  ">

                    </div>
                    <div class="col-md-1 ">
                        <a href="/officer/active-list"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
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
            </div>

            <div class="container-fluid">
                <div class="row pb-5    ">



                    <div class="d-flex justify-content-center">

                        <div class="col-md- border rounded p-2" style="width:70%">
                            @php
                                echo '<form action="/officer/active-list/update" method="post" onsubmit="return confirm(\'Confirm Edit To Existing Data?\');">';
                            @endphp
                            @csrf

                            <table class="table table-borderless">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th>Parcel ID</th>
                                            <th>User ID</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        <td>
                                            <input style="width:90%;" name="p_id" type="text"
                                                class="form-control form-control-sm" id="p_id" placeholder="Enter Parcel ID"
                                                value="{{ $parcel->p_id }}" readonly></input>
                                        </td>
                                        <td>
                                            <select style="width:100%;" class="searchbar2" id="u_id" name="u_id" required>
                                                <option value="{{ $parcel->u_id }}">
                                                    {{ $parcel->u_id }}
                                                </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->u_id }}">
                                                        {{ $user->u_id }}-{{ $user->u_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <thead>
                                        <tr>
                                            <th>Parcel Status</th>
                                            <th>Received Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Collected Date</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        <td>
                                            <select style="width:90%;" id="p_status" name="p_status" required>
                                                <option value="{{ $parcel->p_status }}" selected>{{ $parcel->p_status }}
                                                </option>
                                                <option value="Reached">Reached</option>
                                                <option value="Collected">Collected</option>

                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="receiveDate" value="{{ $parcel->receive_date }}"
                                                class=" form-control d-inline" style="width:45%" id="receiveDate" required>

                                            &nbsp &nbsp &nbsp
                                            @if ($parcel->p_status == 'Collected')
                                                <input type="date" value="{{ $parcel->collect_date }}"
                                                    class=" form-control d-inline" style="width:45%" name="collectDate"
                                                    id="collectDate">
                                                </input>
                                            @else
                                                <input type="date" value="{{ $parcel->collect_date }}"
                                                    class=" form-control d-inline" style="width:45%" name="collectDate"
                                                    id="collectDate">
                                                </input>
                                            @endif


                                        </td>
                                    </tr>
                                    <thead>
                                        <tr>
                                            <th>Parcel Type</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>

                                    <tr>
                                        <td>
                                            <select style="width:90%;" id="p_type" name="p_type" required>
                                                <option value="{{ $parcel->p_type }}" selected>
                                                    {{ $parcel->p_type }}
                                                </option>
                                                <option value="Parcel">
                                                    Parcel
                                                </option>
                                                <option value="Mail">
                                                    Mail
                                                </option>

                                            </select>

                                        </td>
                                        <td>

                                            <input name="p_address" type="text" class="form-control form-control-sm"
                                                id="p_address" value="{{ $parcel->p_address }}"
                                                placeholder="Enter Parcel Address" required></input>


                                        </td>

                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>
                                        </th>
                                    </tr>
                                    <tr>

                                        <td>



                                        </td>
                                        <td>
                                        </td>



                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" style="width:100%" class="btn btn-primary"> Update </button>
                            </form>

                        </div>

                    </div>
                </div>




            </div>

            <script type="text/javascript">
                function hideDiv(select) {
                    if (select.value == "Reached") {
                        document.getElementById('hidden_div').style.display = "none";
                    } else {
                        document.getElementById('hidden_div').style.display = "inline-block";
                    }
                }

            </script>
        </body>


        <!--
                                                                                                                                                                                                                                                                                                                <select style="width:90%;" id="std_status" name="std_status" required>
                                                                                                                                                                                                                                                                                                                    <option value="{{ $parcel->std_status }}" selected>
                                                                                                                                                                                                                                                                                                                        {{ $parcel->std_status }}
                                                                                                                                                                                                                                                                                                                    </option>
                                                                                                                                                                                                                                                                                                                    <option value="Pending">Pending</option>
                                                                                                                                                                                                                                                                                                                    <option value="Ready for Collection">Ready for Collection</option>

                                                                                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                                                                                            -->
    @endforeach

@endsection
