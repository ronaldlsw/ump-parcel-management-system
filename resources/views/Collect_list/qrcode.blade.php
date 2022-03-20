
<body>
<canvas id="qr-code" style=" position: absolute; top:20px; left:40px;"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
		<script>
			/* JS comes here */
			var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    size: 200,
                    value: "Total Goods = {{$count4}}, Collected Goods = {{$count3}}, Collected Parcels = {{$count1}}, Collected Mails = {{$count2}} "
                });
            })();
		</script> 
        <p style=" position: absolute; top:220px; left:70px;">Scan here for details</p>
</body>