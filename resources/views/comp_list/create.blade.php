@extends ('layouts.layout_student')
@section('content')
    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
            placeholder: "Select a name "
        });

    </script>
    <div class="container text-right mb-5 m-auto mt-5 ">
        <div class="row ">
            <div class="col-md-2 ">

            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn"> <a href="/comp_list">
                        <i class="fas fa-arrow-circle-left fa-3x"></i></a></button>
            </div>
            <div class="col-md-4 text-center pt-2">
                <h4>Add Complaint</h4>

            </div>
            <div class="col-md-1  pt-2">

            </div>
            <div class="col-md-3  pt-2">

            </div>
        </div>
        <form action="/comp_list" method="post">
            @csrf
            <div class="row py-4">
                <div class="col-md-2"> </div>
                <div class="col-md-8 border rounded">
                    <table class="table table-borderless table">
                        <tbody>
                            <thead class="thead-dark">
                                <tr>
                                    <th>Complaint ID</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    <input style="width:80%;" name="c_id" type="text" class="form-control form-control-sm"
                                        id="c_id" placeholder="Enter Complaint ID" value="{{ $complaintid }}"
                                        readonly></input>
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

                                        <option value="Lost Goods">
                                            Lost Goods
                                        </option>
                                        <option value="Damaged Goods">
                                           Damaged Goods
                                        </option>

                                    </select>
                                </td>
                                <td>
                                <input style="width:80%;" name="c_date" type="datetime-local" class="form-control form-control-sm"
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


@endsection
