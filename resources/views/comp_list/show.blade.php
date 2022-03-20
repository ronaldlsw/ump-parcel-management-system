@extends ('layouts.layout_student')
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
                        <a href="/comp_list"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
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
                            echo '<form action="/comp_list/update" method="post" onsubmit="return confirm(\'Confirm Edit To Existing Data?\');">';
                        @endphp
                        @csrf

                        <table class="table table-borderless table">
                            <tbody>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Complaint ID</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <input style="width:80%;" name="c_id" type="text"
                                            class="form-control form-control-sm" id="c_id" placeholder="Enter Complaint ID"
                                            value="{{ $comp->c_id }}"></input>
                                    </td>
                                    <td>
                                        <input style="width:80%;" name="c_status" type="hidden" class="form-control form-control-sm"
                                        id="c_status" value="In investigation"
                                        ></input>
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                    <th>Complaint Type</th>
                                    <th>Date and Time</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <select style="width:80%;" id="c_type" name="c_type" required>
                                            <option value="{{ $comp->c_type }}" selected>
                                                {{ $comp->c_type }}
                                            </option>
                                            <option value="Lost Goods">
                                            Lost Goods
                                        </option>
                                        <option value="Damaged Goods">
                                           Damaged Goods
                                        </option>

                                        </select>
                                    </td>
                                    <td>
                                    <input style="width:90%;" name="c_date" type="datetime-local" class="form-control form-control-sm"
                                        id="c_date" required></input>
                                    </td>
                                </tr>
                                <thead>
                                    <tr>
                                    <th>User ID</th>
                                    <th>Complaint Description</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <select style="width:80%;" class="searchbar2" id="u_id" name="u_id" required>
                                            <option value="{{ $comp->u_id }}">
                                                {{ $comp->u_id }}
                                            </option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->u_id }}">
                                                    {{ $user->u_id }}-{{ $user->u_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>

                                    <textarea name="c_desc" type="text" class="form-control form-control-sm"
                                        id="c_desc" placeholder="Enter Complaint Description" required></textarea>

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
