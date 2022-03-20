@extends ('layouts.layout_student')

@section('content')
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;

        }

        .center {
            text-align: center;
        }

        th,
        td {
            padding-bottom: 15px;
            padding-top: 15px;
            
        }

        td {
            font-size: 16px;

        }

    </style>

    <head>
        <div class="container-fluid mt-5" style="width:80%; border:1px solid black;">
            <div class="row">
                <div class="col-6">

                    <div>
                        <table style="width:80%; margin-left:auto; margin-right:auto; border:1px solid black;">
                            <tr>
                                <th colspan="2">
                                    <h3 class="center" style="margin-top:3px; margin-bottom:0px;">Student Good List
                                        Report
                                    </h3>
                                </th>
                                
                            </tr>
                            <tr>
                                <td class="center">Good List Details</td>
                                <td ></td>

                            </tr>
                            <tr class="center">

                                <td> Student ID {{ $uid }} </td>


                                <td>Total Parcel received with in a month</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table style="border:1px solid white ;width:100%;">

                                        <tr>
                                            <td>Jan</td>
                                            <td>Feb</td>
                                            <td>March</td>
                                            <td>April</td>
                                            <td>May</td>
                                            <td>Jun</td>
                                            <td>July</td>
                                            <td>Aug</td>
                                            <td>Sep</td>
                                            <td>Oct</td>
                                            <td>Nov</td>
                                            <td>Dec</td>
                                        </tr>
                                        <tbody>
                                            <tr>
                                                <td>{{ $months[0]->month }}</td>
                                                <td>{{ $months[1]->month }}</td>
                                                <td>{{ $months[2]->month }}</td>
                                                <td>{{ $months[3]->month }}</td>
                                                <td>{{ $months[4]->month }}</td>
                                                <td>{{ $months[5]->month }}</td>
                                                <td>{{ $months[6]->month }}</td>
                                                <td>{{ $months[7]->month }}</td>
                                                <td>{{ $months[8]->month }}</td>
                                                <td>{{ $months[9]->month }}</td>
                                                <td>{{ $months[10]->month }}</td>
                                                <td>{{ $months[11]->month }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        </table>

                    </div>

                    <div style="float:right;">
                        <div style="margin-top:15px;">
                            <a href="/Good-list/report/qrcode"><button class="dt-button" type="button">Save QR
                                    Code</button></a>
                            <button type="button" class="dt-button" onClick="javascript:window.history.back();">OK</button>
                        </div>
                    </div>

                </div>
                
                <div class="col-6" style="margin-right:auto; margin-left:auto;">
                    <div id="piechart" class="center" style="width: 500px; height: 400px;"></div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Month', 'Total Parcel received'],
                    ['January', {{ $months[0]->month }}],
                    ['February', {{ $months[1]->month }}],
                    ['March', {{ $months[2]->month }}],
                    ['April', {{ $months[3]->month }}],
                    ['May', {{ $months[4]->month }}],
                    ['June', {{ $months[5]->month }}],
                    ['July', {{ $months[6]->month }}],
                    ['August', {{ $months[7]->month }}],
                    ['September', {{ $months[8]->month }}],
                    ['October', {{ $months[9]->month }}],
                    ['November', {{ $months[10]->month }}],
                    ['December', {{ $months[11]->month }}]
                ]);

                var options = {
                    title: 'Good List Details'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }

        </script>

    @endsection
