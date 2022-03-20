<body>
    <canvas id="qr-code" style=" position: absolute; top:20px; left:40px;"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
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

        var data =
            "Jan - {{ $months[0]->month }}, Feb - {{ $months[1]->month }}, March - {{ $months[2]->month }}, Apr - {{ $months[3]->month }},  May - {{ $months[4]->month }}, June - {{ $months[5]->month }}, July - {{ $months[6]->month }}, Aug - {{ $months[7]->month }}, Sept - {{ $months[8]->month }} , Oct - {{ $months[9]->month }},  Nov - {{ $months[10]->month }}, Dec - {{ $months[11]->month }}";

        function generateBarCode() {
            var string = data;
            var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + string + '&amp;size=300x300';
            document.getElementById("qrcode").src = url;
            document.getElementById("dwnld").href = url;
        }

    </script>


    <script>


    </script>

    <div class="visible-print text-center">
        <h3 style="font-size:30px;">Student Good List Overview Report</h3>
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=300x300" style="display:none;"
            onload="generateBarCode();">

        <img id='qrcode' src="" alt="" title="Student Good List  Overview Report" width="300" height="300"
            style="margin:20px;" />

        <p>Right click the QR code to save it.</p>

    </div>
</body>
