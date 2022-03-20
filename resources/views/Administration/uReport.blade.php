@extends('layouts.layout_admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>

<style>
table
{
    border: 1px solid black;
    border-collapse:collapse;

}

.center
{
    text-align:center;
}

th, td
{
    padding-bottom: 15px;
    padding-top: 15px;
}

td
{
    font-size:16px;
}
</style>
<div class="container-fluid mt-5" style="width:95%; border:1px solid black;">
    <div class="row" style="width:100%; text-align:center; border-bottom:1px solid black; margin-left:auto; margin-right:auto; margin-top:10px;margin-bottom:15px;">
        <div class="row" style="">
            <div class="col-md-1 ">
                <div style="float:left; padding-bottom:5px;">
                    <a href="/admin"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
                </div>
            </div>
            <div class="col-md-10">
                <h3 style="margin-top:5px; margin-bottom:0px;">User List Report</h3>
            </div>
            <div class="col-md-1">
                <a href="/admin/ul/report/qr"><button class="dt-button" type="button" style="margin-top:5px;">Save QR Code</button></a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <table style="width:100%; margin-left:auto; margin-right:auto; margin-top:15px; margin-bottom:15px; border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;">
                <tr style="border-bottom:1px solid black;">
                    <th colspan="3">
                    <h3 class="center" style="margin-top:0px; margin-bottom:0px;">Resident College Overview Report</h3>
                    </th>
                </tr>
                <tr>
                    <td class="center">Resident College</td>
                    <td class="center">Number of Student</td>
                    <td class="center">Number of Resident Warden</td>
                </tr>
                <tr class="center">
                    <td>KK1</td>
                    <td>{{ $kk1s }}</td>
                    <td>{{ $kk1r }}</td>
                </tr>
                <tr class="center">
                    <td>KK2</td>
                    <td>{{ $kk2s }}</td>
                    <td>{{ $kk2r }}</td>
                </tr>
                <tr class="center">
                    <td>KK3</td>
                    <td>{{ $kk3s }}</td>
                    <td>{{ $kk3r }}</td>
                </tr>
                <tr class="center">
                    <td>KK4</td>
                    <td>{{ $kk4s }}</td>
                    <td>{{ $kk4r }}</td>
                </tr>
                <tr class="center">
                    <td>KK5</td>
                    <td>{{ $kk5s }}</td>
                    <td>{{ $kk5r }}</td>
                </tr>
                <tr class="center">
                    <td>DHUAM</td>
                    <td>{{ $dhs }}</td>
                    <td>{{ $dhr }}</td>
                </tr>
                <tr style="border-top:1px solid black;">
                    <td colspan="3">
                        <div class="container-fluid" style="width:100%;">
                            <p style="display:inline-block; font-size:16px;">
                                <span>Total Resident Warden: {{ $warden }}</span>
                                <span style="margin-left:30px;">Total Student: {{ $student }}</span>
                                <span style="margin-left:30px;">Total Pusat Mel Officer: {{ $officer }}</span>
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-3" style="margin-bottom:15px;">
            <div class="card h-100">
                <div class="card-header">
                    <h3> Student </h3>
                </div>
                <div class="card-body text-center">
                    <div class="chart-container" style="position: relative; height:auto; width:auto">
                        <canvas id="pie1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin-bottom:15px;">
            <div class="card h-100">
                <div class="card-header">
                    <h3> Resident Warden </h3>
                </div>
                <div class="card-body text-center">
                    <div class="chart-container" style="position: relative; height:auto; width:auto">
                        <canvas id="pie2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="float:right;">
        <div style="margin-top:15px;">
        <a href="/admin"><button type="button" class="dt-button">OK</button></a>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('pie1');

    var pie1 = new Chart(ctx,{
        type: 'doughnut',
        data: {
            labels: ['KK1','KK2','KK3','KK4','KK5','DHUAM'],
            datasets: [{
            label: 'Student',
            data: [{{ $kk1s }}, {{ $kk2s }}, {{ $kk3s }}, {{ $kk4s }}, {{ $kk5s }}, {{ $dhs }}],
            backgroundColor: [
                'rgb(255, 102, 255)',
                'rgb(54, 162, 235)',
                'rgb(205, 99, 102)',
                'rgb(51, 255, 255)',
                'rgb(204, 153, 255)',
                'rgb(153, 255, 153)'
            ]
        }]
    },
    options: {}
    });

    var ctx = document.getElementById('pie2');

    var pie1 = new Chart(ctx,{
        type: 'doughnut',
        data: {
            labels: ['KK1','KK2','KK3','KK4','KK5','DHUAM'],
            datasets: [{
            label: 'My First Dataset',
            data: [{{ $kk1r }}, {{ $kk2r }}, {{ $kk3r }}, {{ $kk4r }}, {{ $kk5r }}, {{ $dhr }}],
            backgroundColor: [
                'rgb(255, 102, 255)',
                'rgb(54, 162, 235)',
                'rgb(205, 99, 102)',
                'rgb(51, 255, 255)',
                'rgb(204, 153, 255)',
                'rgb(153, 255, 153)'
            ]
        }]
    },
    options: {}
    });
</script>
@endsection