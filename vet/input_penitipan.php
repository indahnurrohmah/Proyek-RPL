<?php
	date_default_timezone_set("Asia/Jakarta");
	session_start();

    include 'koneksi.php';
    if (empty($_SESSION['id_dokter'])) {
		header("Location:login.php?message=riwayat_hewan.php");
	}
    
    $id_hewan      = $_GET['id_hewan'];
    $today		= date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Data Penitipan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
	<!--start of navbar area-->
	<nav class="navbar navbar-dark" style="background-color:#063970">
  	<div class="container-fluid">
  	  <a class="navbar-brand"><img src="Images/logo.png" style="height:30px" alt="BAROKAH 2"></a>
  	</div>
	</nav>
	<!--end of navbar area-->
	<div class="d-flex align-items-center justify-content-center" style="height:85vh;">
		<center style="width:25%;">
		<h5 class="mb-3">Silakan pilih tanggal</h5>
		<div style="background-color:#063970; color:white;" class="p-4">
		<form method="POST" action="input_penitipan_proses.php" style="width: 100%;">
			<input type="hidden" name="id_hewan" value="<?=$id_hewan?>">
			<h6 class="text-white">Tanggal Masuk</h6>
			<div class="row"><input type="date" name="tanggal_masuk" min="<?=$today?>"></div>
			<h6 class="text-white">Tanggal Keluar</h6>
			<div class="row"><input type="date" name="tanggal_keluar" min="<?=$today?>"></div>
			<div class="row mt-4"><button type="submit" class="btn btn-light">Simpan</button></div>
		</form>
		</div>
		</center>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>