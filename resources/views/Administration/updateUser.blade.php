@extends('layouts.layout_admin')

@section('content')
<style>
table
{
    border:1px solid black;
    border-collapse:separate; 
    border-spacing: 0 1em;
}

input.text
{
    width:200px;
}

label
{
    margin-left:10px;
}
</style>

<div class="container-fluid mt-5" style="width:60%; margin-left:auto; margin-right:auto;">
    @foreach($datas as $data)
    <form action="/admin/ul/{{$data->u_id}}" method="POST" enctype='multipart/form-data'>
    @csrf
    @endforeach
        <div class="container-fluid mt-5" style="width:100%; margin-bottom:10px;">
            <table style="width:100%;">
                <thead>
                    <tr>
                        <td colspan=3 style="border-bottom:1px solid black;">
                            <div style="float:left; margin-left:5px; margin-bottom:10px;">
                                <a href="javascript:window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                            </div>
                            <h3 style="text-align:center;margin-top:8px;">Update User Profile</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <?php 
                        $room = $data->u_college;
                        $roomNo = substr($room, -8);
                    ?>
                    <tr>
                        <td style="width:25%"><label for="u_id">User ID:</label></td>
                        <td style="width:30%;"><input type="text" name="u_id" value="{{ $data->u_id }}" readonly disabled></td>
                        <td rowspan="6">
                            <div style="margin-top:-100px;">
                                <div style="text-align:center;">
                                    <img id="pic_review" name="pic_review" src="{{ asset('storage/images/'.$data->profile_img) }}" width="200px" style="border:1px solid black; "><br>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_name">Name:</label></td>
                        <td style="width:30%;"><textarea type="text" name="u_name" style="height:70px; width:192px;resize:none;" required>{{ $data->u_name }}</textarea></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_contact">Contact Number:</label></td>
                        <td style="width:30%;"><input type="tel" name="u_contact" palceholder="0123456789" value="{{ $data->u_contact }}" required></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="email">Email:</label></td>
                        <td style="width:30%;"><input type="email" name="email" value="{{ $data->email }}" required></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_type">User Type:</label></td>
                        <td style="width:30%;">
                            <input type="radio" name="u_type" value="Student" required><label for="u_type">Student</label>
                            <br>
                            <input type="radio" name="u_type" value="Resident Warden"><label for="u_type">Resident Warden</label>
                            <br>
                            <input type="radio" name="u_type" value="Pusat Mel Officer"><label for="u_type">Pusat Mel Officer</label>
                            <br>
                            <input type="radio" name="u_type" value="Pusat Mel Officer (Admin)"><label for="u_type">Pusat Mel Officer (Admin)</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_rCollege">Current Resident College:</label></td>
                        <td style="width:30%;">
                            <input type="radio" name="u_rCollege" value="KK1"  required><label for="u_rCollege">KK1</label>
                            <input type="radio" name="u_rCollege" value="KK4"><label for="u_rCollege">KK4</label>
                            <br>
                            <input type="radio" name="u_rCollege" value="KK2"><label for="u_rCollege">KK2</label>
                            <input type="radio" name="u_rCollege" value="KK5"><label for="u_rCollege">KK5</label>
                            <br>
                            <input type="radio" name="u_rCollege" value="KK3"><label for="u_rCollege">KK3</label>
                            <input type="radio" name="u_rCollege" value="DHUAM"><label for="u_rCollege">DHUAM</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_rCollege">Room No.:</label></td>
                        <td style="width:30%;"><input type="text" name="u_room" value="{{ $roomNo }}" required></td>
                    </tr>
                    @endforeach
                <tbody>
                <tfoot stlye="display:none;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div style="float:right;">
            <div class="container">
                <input type="submit" class="dt-button" value="Update" style="width:80px; height:30px;">
                <button class="right dt-button" type="button" style="width:80px; height:30px;" onClick="javascript:window.history.back();">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection