@extends ('layouts.layout_admin')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Number of Complaints'],
          ['Lost Goods',    {{$count4}}],
          ['Damaged Goods', {{$count3}}]
        ]);

        var options = {
          title: ' ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Status', 'Number of Complaints'],
          ['Resolved',    {{$count1}}],
          ['In Investigation', {{$count2}}]
        ]);

        var options = {
          title: '',
          width: 300,
          legend: { position: 'none' },
          
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Number of Complaints'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }
    </script>
 
<html>
<head>
<title>Report</title>
</head>

<body>
<br>
    <div class="col-md-1 ">
        <a href="/comp_list/admin"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
    </div>
    <div class="col-md-4  text-center  h1">
        <p>Report Statement
        <p>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-md border ">
                <h2 class="text-center">Complaint Type</h2>
                <div id="piechart_3d" style="width: 500px; height: 300px;"></div>              
            </div>
            <div class="col-md-auto"></div>
            <div class="col-md border ">
                <h2 class="text-center">Complaint Status</h2>
                <div id="piechart_3d2" style="width: 500px; height: 300px;"></div>              
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md border ">
                <table class="table text-center">
                    <h4 style ="text-align:center;"><b>Report</b></h4>
                     <tr>
                        <th>Month</th>
                        <th>No of Complaints</th>
                        <th>Lost Goods</th>
                        <th>Damage Goods</th>
                        <th>Resolved</th>
                        <th>In investigation </th>
                    </tr>
                     @foreach ($datas as $data)
                        <tr>
                            <td> {{ $data->month }}</td>
                            <td> {{ $data->total_count }}</td> 
                            <td> {{ $data->Lost_Goods }}</td>
                            <td> {{ $data->Damage_Goods }}</td> 
                            <td> {{ $data->Resolved }}</td>
                            <td> {{ $data->In_investigation }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-borderless table">
        <tbody>
            <tr>
                <th></th>
                <td></td> 
                <th></th>
                <th> 
                    <div class="center" style="position:absolute; left:69%">
                            <button type="button" class="btn btn-primary"
                            onclick="Popup=window.open('/comp_list/qrcode','Popup','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=250,height=260,left=650,top=250'); return false;"
                            >Scan QR Code</button>
                            <button class="btn btn-primary" onclick="window.print()">Print This Page</button>
                    </div>
                </th>
            </tr>
        </tbody>
    </table>
<br><br>
<br><br>
<br><br>
</body>
</html>



@endsection