@extends ('layouts.layout_officer')
@section('content')
    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
            placeholder: "Select a name "
        });

    </script>
    @foreach ($complains as $comp)
        <title></title>

        <body>
            <div class="container text-right m-auto mb-5 mt-5 ">
                <div class="row ">
                    <div class="col-md-3  ">

                    </div>
                    <div class="col-md-1 ">
                        <a href="/comp_list/officer"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                    </div>
                    <div class="col-md-4  text-center  h1">
                        <p>Edit</p>
                        <p></p>

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
                            echo '<form action="/comp_list/update2" method="post" onsubmit="return confirm(\'Confirm Edit and Notify student?\');">';
                        @endphp
                        @csrf

                        <table class="table table-borderless table">
                            <tbody>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Complaint ID</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <input style="width:80%;" name="c_id" type="text"
                                            class="form-control form-control-sm" id="c_id" placeholder="Enter Complaint ID"
                                            value="{{ $comp->c_id }}"></input>
                                    </td>
                                    <td>
                                        <select style="width:100%;" id="c_status" name="c_status" required>
                                            <option value="{{ $comp->c_status }}" selected>
                                                {{ $comp->c_status }}
                                            </option>
                                            <option value="In investigation">
                                            In investigation
                                        </option>
                                        <option value="Resolved">
                                           Resolved
                                        </option>

                                        </select>
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
