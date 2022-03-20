@extends('layouts.layout_admin')

@section('content')
<style>
table
{
    border:1px solid black;
    border-collapse:separate; 
    border-spacing: 0 1em;
}
p
{
    margin-left:10px;
}
</style>
@csrf
<div class="container-fluid mt-5" style="width:60%; margin-left:auto; margin-right:auto; ">
    <div class="container-fluid mt-5" style="width:100%; margin-bottom:10px;">
        <table style="width:100%;">
            <thead>
                <tr>
                    <td colspan=3 style="border-bottom:1px solid black;">
                        <div style="float:left; margin-left:5px; margin-bottom:10px;">
                            <a href="javascript:window.history.back();"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                        </div>
                        <h3 style="text-align:center; margin-top:8px;">User Profile</h3>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td style="width:25%"><p>User ID:</p></td>
                    <td style="width:45%;"> {{ $data->u_id }} </td>
                    <td rowspan="6" style="text-align-last:center;"><img id="pic_review" name="pic_review" src="{{ asset('storage/images/'.$data->profile_img) }}" width="200px" style="border:1px solid black;"></td>
                </tr>
                <tr>
                    <td style="width:25%"><p>Name:</p></td>
                    <td style="width:45%;"> {{ $data->u_name }} </td>
                </tr>
                <tr>
                    <td style="width:25%"><p>Contact Number:</p></td>
                    <td style="width:45%;"> {{ $data->u_contact }} </td>
                </tr>
                <tr>
                    <td style="width:25%"><p>Email:</p></td>
                    <td style="width:45%;"> {{ $data->email }} </td>
                </tr>
                <tr>
                    <td style="width:25%"><p>User Type:</p></td>
                    <td style="width:45%;"> {{ $data->u_type }} </td>
                </tr>
                <tr>
                    <td style="width:25%"><p>Resident Address:</p></td>
                    <td style="width:45%;"> {{ $data->u_college }} </td>
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
            @foreach($datas as $data)
            <a href="/admin/ul/update/{{ $data->u_id }}"><button class="dt-button" type="button" style="width:80px; height:30px;">Update</button></a>
            @endforeach
            <button class="right dt-button" type="button" style="width:80px; height:30px;" onClick="javascript:window.history.back();">OK</button>
        </div>
    </div>
</div>
@endsection