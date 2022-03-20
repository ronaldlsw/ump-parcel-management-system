@extends('layouts.layout_admin')

@section('content')
<script>
    var loadPic = function(event) {
        var image = document.getElementById('pic_review');
        image.style.visibility = "visible";
        image.src = URL.createObjectURL(event.target.files[0]);
        visibility:hidden;
    };
</script>
<script>
function validate() {
    var index = ["u_id", "u_pic", "password", "u_name", "u_contact", "email", "u_type", "u_rCollege", "u_room"];
    var x = [];
    var msg = ["UserID is not filled.", "Profile picture is not uploaded.", "Password is not filled.", "Name is not filled.", "Contact Number is not filled.", "Email is not filled.", "User Type is not chosen.", "Current Resident College is not chosen.", "Room Number is not filled."];
    for(var i = 0; i < 9; i++)
    {
        x[i] = document.forms["newUserF"][index[i]].value;
    }
    
    for(var i = 0; i < 9; i++)
    {
        if(x[2].length < 0)
        {
            alert(msg[2]);
            return false;
        }
        if(x[i] == "") 
        {
            alert(msg[i]);
            return false;
        }
    } 
}
</script>
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


<div class="container-fluid mt-5" style="width:60%; margin-left:auto; margin-right:auto; ">
    <form name="newUserF" action="/admin/ul/new" method="POST" enctype='multipart/form-data' onsubmit="return validate()">
    @csrf
        <div class="container-fluid mt-5" style="width:100%; margin-bottom:10px;">
            <table style="width:100%;">
                <thead>
                    <tr>
                        <td colspan=3 style="border-bottom:1px solid black;">
                            <div style="float:left; margin-left:5px; margin-bottom:10px;">
                                <a href="javascript:window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                            </div>
                            <h3 style="text-align:center; margin-top:8px;">New User Profile</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:25%"><label for="u_id">User ID:</label></td>
                        <td style="width:30%;"><input type="text" name="u_id" placeholder="AA12345" pattern="[A-Z]{2}[0-9]{5}"></td>
                        <td rowspan="7">
                            <div style="margin-top:-100px;">
                                <div style="text-align:center;">
                                    <img id="pic_review" name="pic_review" width="200px" style="visibility:hidden; border:1px solid black;"><br>
                                </div>
                                <div style="text-align-last: center; margin-top:10px;">
                                    <input type="file"  style="border:1px solid white;" accept="image/*" name="u_pic" onchange="loadPic(event)">
                                <div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="password">Password:</label></td>
                        <td style="width:30%;"><input type="password" name="password" minlength="6" ></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_name">Name:</label></td>
                        <td style="width:30%;"><textarea type="text" name="u_name" style="height:70px; resize:none;" ></textarea></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_contact">Contact Number:</label></td>
                        <td style="width:30%;"><input type="tel" name="u_contact" placeholder="0123456789" ></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="email">Email:</label></td>
                        <td style="width:30%;"><input type="email" name="email" placeholder="example@gmail.com"></td>
                    </tr>
                    <tr>
                        <td style="width:25%"><label for="u_type">User Type:</label></td>
                        <td style="width:30%;">
                            <input type="radio" name="u_type" value="Student" ><label for="u_type">Student</label>
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
                            <input type="radio" name="u_rCollege" value="KK1" ><label for="u_rCollege">KK1</label>
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
                        <td style="width:30%;"><input type="text" name="u_room" placeholder="A-100-02" pattern="[A-Z]{1}-[0-9]{3}-[0-9]{2}"></td>
                    </tr>
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
                <input type="submit" class="dt-button" value="Create User" style="width:100px; height:30px;">
                <button class="right dt-button" type="button" style="width:100px; height:30px;" onClick="javascript:window.history.back();">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection