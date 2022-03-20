@extends('layouts.layout_admin')

@section('content')
<?php
    $str = "KK1   Student:".$kk1s.",   Resident Warden:".$kk1r.";   KK2   Student:".$kk2s.",   Resident Warden:".$kk2r.";   KK3   Student:".$kk3s.",   Resident Warden:".$kk3r.";   KK4   Student:".$kk4s.",   Resident Warden:".$kk4r.";   KK5   Student:".$kk5s.",   Resident Warden:".$kk5r.";   DHUAM   Student:".$dhs.",   Resident Warden:".$dhr;
    ?>
<script>
    function generateBarCode(str) 
    {
        var string = str;
        var url = 'https://api.qrserver.com/v1/create-qr-code/?data='+ string +'&amp;size=300x300';
        document.getElementById("qrcode").src = url;
        document.getElementById("dwnld").href = url;
    }
</script>
<div class="visible-print text-center">
    <h3 style="font-size:30px;">Resident College Overview Report</h3>
     <img src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=300x300" style="display:none;" onload="generateBarCode('{{$str}}');">

    <img id='qrcode' src="" alt="" title="Resident College Overview Report" width="300" height="300" style="margin:20px;"/>

    <p>Right click the QR code to save it.</p>

</div>

@endsection