@extends ('layouts.layout_warden')
@section('content')
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(noofparcel);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(readyforcollection);
      
      function drawStuff() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Parcel', 'Mails'],
            ['January', {{ $janp }}, {{ $janm }} ],
            ['February', {{ $febp }}, {{ $febm }} ],
            ['March', {{ $marp }}, {{ $marm }}],
            ['April', {{ $aprp }}, {{ $aprm }}],
            ['May', {{ $mayp }}, {{ $maym }}],
            ['June', {{ $junp }}, {{ $junm }}],
            ['July', {{ $julp }}, {{ $julm }}],
            ['August', {{ $augp }}, {{ $augm }}],
            ['September', {{ $sepp }}, {{ $sepm }}],
            ['October', {{ $octp }}, {{ $octm }}],
            ['November', {{ $novp }}, {{ $novm }}],
            ['December', {{ $decp }}, {{ $decm }}],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          },
          bars: 'vertical' // Required for Material Bar Charts.
          
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function noofparcel() {
        var data = google.visualization.arrayToDataTable([
          ['Collected Goods Type', 'Number of Parcel'],
          ['Collected Parcel',  {{$count1}}],
          ['Collected Mail', {{$count2}}]
        ]);

        var options = {
            title: 'Collected Goods',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('noofparcel'));
        chart.draw(data, options);
      }

      function readyforcollection() {
        var data = google.visualization.arrayToDataTable([
          ['std_status', 'Number of Parcel'],
          ['Ready For Collection',  {{$count3}}],
          ['Received by Student', {{$count4}}],
          ['Pending', {{$count5}}],
        ]);

        var options = {
          title: '',
          pieHole:0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('readyforcollection'));
        chart.draw(data, options);
      }
    </script>
	<title>Report Statement for Goods Lists</title>
</head>
<body style="width:100%">
<div class="row ">
    <div class="col-md-1  "> </div>
    <div class="col-md-1 ">
        <a href="/Collect_list"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
    </div>
    <div class="col-md-9  text-center  h1">
        <p>Report Statement
        <p>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-auto  ">
                <div class="card">
                    <h4 class="card-header" style ="text-align:center;"><b>Total Collected Goods(2021)</b></h4>
                    <div class="card-body">
                        <h6 class="text-center">No.of Collected Parcel and Mail(2021)</h6>
                        <div id="barchart_material" style="width: 200%; height: 540px;">
                        </div>
                    </div>
                </div>              
            </div>
            <div class="col-md-auto"></div>
            <div class="col-md-auto ">
                <div class="card">
                    <h4 class="card-header" style ="text-align:center;"><b>Total Collected Goods</b></h4>
                    <div class="card-body">
                        <h6 class="text-center">No.of Collected Parcel and Mail</h6>
                        <div id="noofparcel" style="width: 180%; height: 200px;">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <h4 class="card-header" style ="text-align:center;"><b>Student Pickup Status</b></h4>
                    <div class="card-body">
                        <h6 class="text-center">Goods Pickup Status by Student</h6>
                        <div id="readyforcollection" style="width: 120%; height: 200px;">
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>    
    <br>
    <div class="container">
        <div class="row">
            <div class="col"> 
                <div class="card">
                    <h4 class="card-header" style ="text-align:center;"><b>Top Collected Goods(Student)</b></h4>
                    <div class="card-body">
                        <table class="table text-center">
                            <tr>
                                <th>Student ID</th>
                                <th>No.of Goods</th>
                                <th>Parcels</th>
                                <th>Mails</th>
                            </tr>
                            @foreach ($datas as $data)
                            <tr>
                                <td> {{ $data->u_id }}</td>
                                <td> {{ $data->total_count }}</td> 
                                <td> {{ $data->parcel }}</td>
                                <td> {{ $data->mail }}</td> 
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-auto"></div>
            <div class="col">
                <div class="card">
                <h4 class="card-header" style ="text-align:center;"><b>Total</b></h4> 
                    <div class="card-body">
                        <table class="table text-center">             
                            @foreach($datas1 as $data)
                            <tr>
                                <th class="col-md-5" style ="padding-left:10%;">Total Goods</th>
                                <td> {{ $data->total_count }}</td>
                            </tr>
                            <tr>
                                <th style ="padding-left:15%;">Collected Goods</th>
                                <td> {{ $data->collect }}</td>
                            </tr>
                            <tr>
                                <th style ="padding-left:15%;">Collected Parcel</th>
                                <td> {{ $data->parcel }}</td>
                            </tr>
                            <tr>
                                <th style ="padding-left:13%;">Collected Mail</th>
                                <td> {{ $data->mail }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    
    <br>
    <table class="table table-borderless table">
        <tbody>
            <tr>
                <th></th>
                <td></td> 
                <th>
                    <div class="center" style="position:absolute; left:75%">
                            <button type="button" class="btn btn-primary"
                            onclick="Popup=window.open('/Collect_list/qrcode','Popup','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=250,height=250'); return false;"
                            >Scan QR Code</button>
                    </div>
                </th>
                <th> 
                    <div class="center" style="position:absolute; left:85%">
                        <button class="btn btn-primary" onclick="window.print()">Print This Page</button>
                    </div>
                </th>
            </tr>
        </tbody>
    </table>
<br><br>
<br><br>
</body>
@endsection
