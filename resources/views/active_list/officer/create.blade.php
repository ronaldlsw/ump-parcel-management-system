@extends ('layouts.active_list.officer')
@section('content')



    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
        });

    </script>



    <style>
        .td {
            style="width:50%;"
        }

    </style>
    <div class="container mb-5 m-auto mt-5 ">
        <div class="row ">
            <div class="col-md-2 ">

            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn"> <a href="/officer/active-list">
                        <i class="fas fa-arrow-circle-left fa-3x"></i></a></button>
            </div>
            <div class="col-md-4 text-center pt-2">
                <h1>Add Parcel</h1>

            </div>
            <div class="col-md-1  pt-2">

            </div>
            <div class="col-md-3  pt-2">

            </div>
        </div>
        <form action="/officer/active-list" method="post">
            @csrf
            <div class="row py-4">
                <div class="col-md-2"> </div>
                <div class="col-md-8 border rounded">
                    <table class="table table-borderless table">

                        <thead>
                            <tr>
                                <th>Parcel ID</th>
                                <th>User ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:50%;">
                                    <input style="width:90%;" name="p_id" type="text" class="form-control form-control-sm"
                                        id="p_id" placeholder="Enter Parcel ID" value="{{ $parcelid }}"
                                        readonly></input>
                                </td>
                                <td>
                                    <select style="width:100%;" class="searchbar2" id="u_id" name="u_id" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->u_id }}">
                                                {{ $user->u_id }}-{{ $user->u_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Parcel Status</th>
                                <th>Received Date &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Collected Date
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select style="width:80%;" id="p_status" name="p_status" onchange="hideDiv(this)"
                                        required>

                                        <option value="Reached">Reached</option>
                                        <option value="Collected">Collected</option>

                                    </select>



                                </td>
                                <td>
                                    <input type="date" name="receiveDate" class="form-control d-inline" style="width:45%"
                                        id="receiveDate">
                                    <div id="hidden_div" style="display:none;">
                                        <input type="date" class="form-control d-inline" style="width:100%"
                                            name="collectDate" id="collectDate">
                                        </input>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                        </thead>
                        <thead>
                            <tr>
                                <th>Parcel Type</th>
                                <th>Address</th>
                            </tr>
                        </thead>

                        <tr>
                            <td>
                                <select style="width:90%;" id="p_type" name="p_type" required>

                                    <option value="Parcel">
                                        Parcel
                                    </option>
                                    <option value="Mail">
                                        Mail
                                    </option>

                                </select>

                            </td>
                            <td>

                                <textarea name="p_address" type="text" class="form-control form-control-sm" id="p_address"
                                    placeholder="Enter Parcel Address" required></textarea>


                            </td>

                        </tr>

                        </tbody>
                    </table>



                </div>
                <div class="col-md-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 "></div>
                <div class="col-md-7 ">

                    <button type="submit" style="width:100%" class="m-5 mt-1 btn-block btn-primary">Save</button>
                </div>

                <div class="col-md-2 "></div>
            </div>
        </form>
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

@endsection
