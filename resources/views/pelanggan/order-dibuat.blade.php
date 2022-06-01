<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order Dibuat !</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="container text-center mt-lg-5">
		<h3>Sukses! Pesanan berhasil dibuat dengan nomor pesanan :</h3>
		<h4>{{Session::get('sukses')}}</h4>
		<a class="btn btn-info" href="/daftarmenu">Kembali ke halaman awal</a>
	</div>
</body>
</html>