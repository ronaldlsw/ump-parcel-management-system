@extends ('layouts.active_list.admin')
@section('content')
    <title>Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        #barcode {
            text-align: center;
        }

        .modal-content {
            background-color: #ffffff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 21%;

        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>


    <div class="container py-5">
        <div class="row">

            <div class="col-md-1 ">
                <a href="/admin/active-list"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
            </div>
            <div class="col-md-10">
                <h1>Report</h1>
            </div>
            <div class="col-md-1">
                <button id="qrButton" style="text-align:center;">Get QR</button>
            </div>

            <hr>
        </div>



        <div class="row  pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-inline">

                        <h3> Parcels and Mail (Monthly) </h3>
                    </div>
                    <div class="card-body p-5">
                        <div>

                            <canvas id="myChart"></canvas>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card  h-100">
                    <div class="card-header">
                        <h3> Ratio </h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="chart-container" style="position: relative; height:auto; width:auto">
                            <canvas id="theChart"></canvas>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="container pt-1  mb-5 pb-5">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Top Receivers <i class="fas fa-crown"></i></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>

                                    <th>Student ID</th>
                                    <th>No. of Parcels</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>

                                        <td> {{ $data->u_id }} </td>
                                        <td> {{ $data->total_count }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card  h-100">
                    <div class="card-header">
                        <h3>Parcel Types (%) </i></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">

                            <tr>
                                <th>Category </th>
                                <th> Parcel</th>
                                <th> Mail</th>

                            </tr>
                            <tr>
                                <th>Amount </th>
                                <td><input name="parcelCount" type="text" class="form-control form-control-sm "
                                        id="parcelCount" value="{{ $countThings->sumParcel }}"
                                        placeholder="Number Of Parcels" readonly></input></td>
                                <td><input name="countMail" type="text" class="form-control form-control-sm" id="countMail"
                                        value="{{ $countThings->sumMail }}" placeholder="Number Of Mail" readonly></input>
                                </td>

                            </tr>
                            <tr>
                                <th>Percentage</th>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
                                            role="progressbar" aria-valuenow="{{ $countThings->pctParcel }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:{{ $countThings->pctParcel }}%">
                                            {{ $countThings->pctParcel }} %
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated"
                                            role="progressbar" aria-valuenow="{{ $countThings->pctMail }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="width:{{ $countThings->pctMail }}%">
                                            {{ $countThings->pctMail }} %
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trigger/Open The Modal -->


        <!-- The Modal -->

        <!-- Trigger/Open The Modal -->


        <!-- The Modal -->
        <div id="popout" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt=""
                    title="HELLO" width="200" height="200" onload="generateQR();" />
            </div>

        </div>


        <script>
            const parcelData = [];

            parcelData.push('{{ $months[0]->month }}');
            parcelData.push('{{ $months[1]->month }}');
            parcelData.push('{{ $months[2]->month }}');
            parcelData.push('{{ $months[3]->month }}');
            parcelData.push('{{ $months[4]->month }}');
            parcelData.push('{{ $months[5]->month }}');
            parcelData.push('{{ $months[6]->month }}');
            parcelData.push('{{ $months[7]->month }}');
            parcelData.push('{{ $months[8]->month }}');
            parcelData.push('{{ $months[9]->month }}');
            parcelData.push('{{ $months[10]->month }}');
            parcelData.push('{{ $months[11]->month }}');


            const labels = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Parcels and Mails (Current Year)',
                    backgroundColor: 'rgb(0, 0, 0)',
                    borderColor: 'rgb(0, 0, 0)',
                    data: [parcelData[0], parcelData[1], parcelData[2], parcelData[3], parcelData[4],
                        parcelData[5], parcelData[6], parcelData[7], parcelData[8], parcelData[9],
                        parcelData[10], parcelData[11]
                    ],
                    tension: 0.1,
                    fill: false
                }]
            };
            const config = {
                type: 'line',
                data,
                options: {}
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );









            const data2 = {
                labels: [
                    'Parcel',
                    'Mail'

                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [{{ $countThings->sumParcel }}, {{ $countThings->sumMail }}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config2 = {
                type: 'doughnut',
                data: data2,
                options: {}
            };

            var theChart = new Chart(
                document.getElementById('theChart'),
                config2
            );

        </script>

        <script>
            function printPage() {
                window.print();
            }

            function generateQR() {
                var data =
                    "Jan - {{ $months[0]->month }}, Feb - {{ $months[1]->month }}, March - {{ $months[2]->month }}, Apr - {{ $months[3]->month }},  May - {{ $months[4]->month }}, June - {{ $months[5]->month }}, July - {{ $months[6]->month }}, Aug - {{ $months[7]->month }}, Sept - {{ $months[8]->month }} , Oct - {{ $months[9]->month }},  Nov - {{ $months[10]->month }}, Dec - {{ $months[11]->month }}";
                var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + data + '&amp;size=50x50';
                $('#barcode').attr('src', url);
            }

            var content = document.getElementById("popout");
            var button = document.getElementById("qrButton");
            var span = document.getElementsByClassName("close")[0];
            button.onclick = function() {
                content.style.display = "block";
            }

            span.onclick = function() {
                content.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    content.style.display = "none";
                }
            }

        </script>




    @endsection
