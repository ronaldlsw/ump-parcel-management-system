@extends('layouts.layout_admin')

@section('content')
<script>
$(document).ready(function() 
{
    var table = $('#userList').DataTable();
});
</script>
<style>
table
{
    border: 1px solid black;
    border-collapse: collapse;
}
table, tr, th
{
    text-align:center;
}
</style>
<div class="container-fluid mt-5" style="width:85%; border:1px solid black;">
    <table style="width:100%; margin-left:auto; margin-right:auto;  border:1px solid white;">
        <tr>
            <td>
                <div style="float:left; margin-top:10px; margin-bottom:10px;">
                    <a href="javascript:window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                </div>
                <h3 style="margin-top:15px;">User List</h3>
            </td>
        </tr>
        <tr style="border-top:1px solid black;"><td><br></td></tr>
        <tr><td>
            <table id="userList" class="display" style="border:1px solid white;">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>User Type</th>
                        <th>Resident Address</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td> {{ $data->u_id }} </td>
                        <td> {{ $data->u_name }} </td>
                        <td> {{ $data->u_contact }} </td>
                        <td> {{ $data->u_type }} </td>
                        <td> {{ $data->u_college }} </td>
                        <td> <a href="/admin/ul/view/{{ $data->u_id }}"><button type="button" class="dt-button">View</button></a> </td>
                        <td> <a href="/admin/ul/update/{{ $data->u_id }}"><button type="button"class="btn btn-primary"><i class="fas fa-cog fa-sm"></i></button></a> </td>
                        <td> <a href="/admin/ul/del/{{ $data->u_id }}"><button type="button" class="btn btn-danger" onclick="return confirm('Do you really want to delete?');">Delete</button></a></td>
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
        </td></tr>
        <tr ><td><br></td></tr>
        <tr style="border-top:1px solid black;">
            <td>
                <div style="margin-top:5px;">
                    <div style="float:left;">
                        <a href="/admin/ul/create"><button class="dt-button" type="button">Add User</button></a>
                    </div>
                    <div style="float:right;">
                        <a href="/admin/ul/report"><button class="dt-button" type="button">View Report</button></a>
                        <button type="button" class="dt-button" onClick="javascript:window.history.back();">OK</button>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3" style="width:85%; margin-top:20px;">
    <p style="display:inline-block; font-size:16px;">
        <span>Total Resident Warden: {{ $warden }}</span>
        <span style="margin-left:30px;">Total Student: {{ $student }}</span>
        <span style="margin-left:30px;">Total Pusat Mel Officer: {{ $officer }}</span>
    </p>
</div>
@endsection