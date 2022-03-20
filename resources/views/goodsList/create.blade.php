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
                <button type="button" class="btn"> <a href="/Good-list">
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
        <form action="/Good-list" method="post">
            @csrf
            <div class="row py-4">
                <div class="col-md-2"> </div>
                <div class="col-md-8 border rounded">
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
                                    <input style="width:80%;" name="p_id" type="text" class="form-control form-control-sm"
                                        id="p_id" placeholder="Enter Parcel ID" value="{{ $parcelid }}"
                                        readonly></input>
                                </td>
                                <td>
                                    <select style="width:90%;" id="p_status" name="p_status" required>

                                        <option value="Reached">Reached</option>
                                        <option value="Collected">Collected</option>

                                    </select>
                                </td>
                            </tr>
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Student Status</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>
                                    <select style="width:80%;" id="p_type" name="p_type" required>

                                        <option value="Parcel">
                                            Parcel
                                        </option>
                                        <option value="Mail">
                                            Mail
                                        </option>

                                    </select>
                                </td>
                                <td>
                                    <select style="width:90%;" id="std_status" name="std_status" required>

                                        <option value="Pending">Pending</option>
                                        <option value="Ready for Collection">Ready for Collection</option>

                                    </select>
                                </td>
                            </tr>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Address</th>
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

                                    <textarea name="p_address" type="text" class="form-control form-control-sm"
                                        id="p_address" placeholder="Enter Parcel Address" required></textarea>


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
