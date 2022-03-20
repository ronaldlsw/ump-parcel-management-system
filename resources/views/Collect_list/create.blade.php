@extends ('layouts.layout_warden')
@section('content')
    <script>
        $(document).ready(function() {
            $('.searchbar2').select2();
            placeholder: "Select a name "
        });
        
    </script>   
    <title>Add Goods Lists</title>
    <div class="container text-right mb-5 m-auto mt-5 ">
        <div class="row ">
            <div class="col-md-2 ">
            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn"> <a href="/Collect_list">
                        <i class="fas fa-arrow-circle-left fa-3x"></i></a></button>
            </div>
            <div class="col-md-4 text-center pt-2">
                <h1>Add Parcel Details</h1>
            </div>
            <div class="col-md-1  pt-2">
            </div>
            <div class="col-md-3  pt-2">
            </div>
        </div>
        <form action="/Collect_list" method="post">
            @csrf
            <div class="row py-4">
                <div class="col-md-2"> </div>
                <div class="col-md-8 border rounded">
                    <table class="table table-borderless table">
                        <tbody>
                        <thead class="thead-dark">
                                    <tr>
                                        <th>Parcel ID</th>
                                        <th>Parcel Received Date <span style="color:red;">*</span></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                    <input style="width:80%;" name="p_id" type="text" class="form-control form-control-sm"
                                        id="p_id" placeholder="Enter Parcel ID" value="{{ $parcelid }}" readonly>
                                    </input>
                                    </td>
                                    <td>
                                        <input style="width:80%;" id="receive_date" name="receive_date" type = "date"
                                        class="form-control form-control-sm" placeholder="Enter Received Date [YYYY-MM-DD]"required></input>
                                    </td>
                                </tr>

                                <thead class="thead-dark">
                                    <tr>
                                        <th>Parcel Collected Date<span style="color:red;">*</span></th>
                                        <th>Student Hostel<span style="color:red;">*</span></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <input style="width:80%;" id="collect_date" name="collect_date" type = "date"
                                        class="form-control form-control-sm" placeholder="Enter Collected Date [YYYY-MM-DD]"required></input>
                                    </td>
                                    <td>
                                    <select style="width:90%;" class="searchbar2" id="p_address" name="p_address"required>
                                    <option></option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->u_college }}">
                                            {{ $user->u_id }}-{{ $user->u_college }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </td>
                                </tr>                                                          
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Parcel Type <span style="color:red;">*</span></th>
                                        <th>Parcel Status <span style="color:red;">*</span></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                    <select style="width:80%;" id="p_type" name="p_type" required>
                                        <option></option>
                                        <option value="Parcel">Parcel</option>
                                        <option value="Mail">Mail</option>
                                    </select>
                                    </td>
                                    <td>
                                    <select style="width:90%;" id="p_status" name="p_status" required>
                                    <option></option>
                                        <option value="Reached">Reached</option>
                                        <option value="Collected">Collected</option>
                                    </select>
                                    </td>
                                </tr>                                                             
                                <thead class="thead-dark">
                                    <tr>
                                        <th>User ID <span style="color:red;">*</span></th>
                                        <th>Student Picked Status <span style="color:red;">*</span></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                    <select style="width:80%;" class="searchbar2" id="u_id" name="u_id"required>
                                    <option></option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->u_id }}">
                                            {{ $user->u_id }}-{{ $user->u_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    </td>
                                    <td>
                                    <select style="width:90%;" name="std_status" id="std_status" required>
                                        <option></option>
                                            <option>Pending</option>
                                            <option>Ready for Collection</option>
                                            <option>Received</option>
                                            
                                            </select>
                                    </td>
                                </tr>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Notified Date</th>
                                        <th>Student Picked Date</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <input style="width:80%;" name="ready_date" type="date"
                                            class="form-control form-control-sm" id="ready_date" placeholder="Enter Notified Date"></input>
                                    </td>
                                    <td>                       
                                        <input style="width:90%;" id="student_receive_date" name="student_receive_date" type = "date"
                                        class="form-control form-control-sm" placeholder="Enter Collected Date [YYYY-MM-DD]"></input>
    
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
