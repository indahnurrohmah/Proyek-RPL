<?php
	session_start();
	include 'koneksi.php';
	$days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
	$length = count($days);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Pemeriksaan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="home.css">
	<style>
		.list-group-item{
			border-bottom: 0;
		}
		.btn-merkcolor{
			background-color:#063970;
		}
	</style>
</head>
<body>
	<!--start of navbar area-->
	<nav class="navbar navbar-dark" style="background-color:#063970">
  	<div class="container-fluid">
  	  <a class="navbar-brand"><img src="Images/logo.png" style="height:30px" alt="BAROKAH 2"></a>
  	  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
  	  	<span class="navbar-toggler-icon"></span>
  	  </button>
  	</div>
	</nav>
	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasRightLabel">
				<?php
					if(empty($_SESSION['id_dokter'])){?>
						 <a href="login.php" style="color:black; text-decoration:none;">Masuk</a>
					<?php }
					else{
						$id_dokter=$_SESSION['id_dokter'];
						$query=mysqli_query($connect,"SELECT * FROM dokter_hewan WHERE id_dokter='$id_dokter'");
						$data=mysqli_fetch_array($query);
						//menentukan spesialisasi dokter
						$spesialisasi = $data['spesialisasi'];
						
						//echo nama, spesialisasi dokter
						echo $data['nama'] . ", " . $data['spesialisasi'];
					}
				?>
			</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<div class="list-group list-group-flush">
				<a href="home.php" class="list-group-item list-group-item-action">Beranda</a>
				<a href="lihat_data.php" class="list-group-item list-group-item-action">Lihat Data Hewan</a>
				<a href="riwayat_hewan.php" class="list-group-item list-group-item-action">Catat Data Hewan</a>
				<?php if(!empty($_SESSION['id_dokter'])){?>
					<a href="logout.php" class="list-group-item list-group-item-action"><?="Keluar";
					?></a>
				<?php }?>
			</div>
		</div>
	</div>
	<!--end of navbar area-->

	<?php
	$id_hewan = $_GET['id_hewan'];
	$id_pemeriksaan = $_GET['id_pemeriksaan'];
	$query1= mysqli_query($connect, "SELECT * FROM hewan where id_hewan='$id_hewan'");
	$query3= mysqli_query($connect, "SELECT * FROM ambul where id_pemeriksaan='$id_pemeriksaan' ORDER BY id_ambul DESC");
	$query2= mysqli_query($connect, "SELECT * FROM data_checkup where id_pemeriksaan='$id_pemeriksaan' ORDER BY id_dataCheckUp DESC");
	
	
	while ($data1 = mysqli_fetch_array($query1)) {
	?>
	<center class="my-1 pt-1">
	<h2>Data Pemeriksaan</h2>
	<div style="width:100%; background-color:#063970;" class="py-4 px-2">
		<div class="row">
			<div class="col-2 mr-0">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>ID Hewan</h6>
				<h6>Nama Hewan</h6>
			</div>
			</div>
			<div class="col-6 mr-5">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$id_hewan;?></h6>
				<h6><?= ": ".$data1['nama_hewan'];?></h6>
			</div>
			</div>
	<?php } ?>
			<div class="col-2">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>ID Pemeriksaan</h6>
			</div>
			</div>
			<div class="col-2 mr-3">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$id_pemeriksaan;?></h6>
			</div>
			</div>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-3 ">
			<a type="button" href="riwayat_hewan.php?id_hewan=<?= $id_hewan?>&message=lihat" class="btn btn-dark btn-lg btn-merkcolor btn-sm" style="align:right">Lihat Riwayat Data Hewan Ini</a>
		</div>
		<div class="col-9">
		</div>
	</div>
	<div class="row">
		<?php
		$today= date("Y-m-d");
		?>
		<div class="col-6">
			<div style="width:90%;" class="mt-4">
			<div class="row">
				<div class="col-9">
					<h5 style="text-align:left">Riwayat Check-Up</h5>
				</div>
				<div class="col-3">
					<?php if (!empty($_SESSION['id_dokter'])) { ?>
						<a type="button" href="inputCheckUp.php?id_hewan=<?= $id_hewan?>&id_pemeriksaan=<?=$id_pemeriksaan;?>&id_dokter=<?=$id_dokter;?>&message=pemeriksaan" class="btn btn-dark btn-lg btn-merkcolor btn-sm" style="align:right">Tambah</a>
					<?php } ?>
				</div>
			</div>
			<table class="table table-bordered" style="text-align:center">
			<thead class="table-light">
				<tr>
					<td class="col-1">ID Check Up</td>
					<td class="col-1">Tanggal, Waktu</td>
				</tr>
			</thead>
				<tbody>
					<?php

					while ($data2 = mysqli_fetch_array($query2)) {

					$today= date("Y-m-d");
					$now= date("H:i:s");
						//$waktu_selesai=$data['waktu_selesai'];
						//$tgl=$data['tgl'];
					?>
							<tr>
							<td><a href="output_checkup.php?id_dataCheckUp=<?=$data2['id_dataCheckUp'];?>&message=pemeriksaan"><?=$data2['id_dataCheckUp'];?></a></td>
							<td><?= date('d F Y',strtotime($data2['tanggal'])).", ".date('H:i', strtotime($data2['tanggal']));?></td>
							</tr>
					<?php } ?>
					
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-6">
			<div style="width:90%;" class="mt-4">
				<div class="row">
				<div class="col-10">
					<h5 style="text-align:left">Riwayat Ambulatoir</h5>
				</div>
				<div class="col-2">
					<?php if (!empty($_SESSION['id_dokter'])) { ?>
						<a type="button" href="input_ambul.php?id_hewan=<?=$id_hewan;?>&id_pemeriksaan=<?=$id_pemeriksaan;?>&id_dokter=<?=$id_dokter;?>" class="btn btn-dark btn-lg btn-merkcolor btn-sm" >Tambah</a>
					<?php } ?>
				</div>
				</div>
				<table class="table table-bordered" style="text-align:center">
				<thead class="table-light">
				<tr>
					<td class="col-1">ID Ambul</td>
					<td class="col-1">Tanggal, Waktu</td>
				</tr>
				</thead>
				<tbody>
					<?php

					while ($data3 = mysqli_fetch_array($query3)) { ?>
					<tr>
						<td><a href="output_ambul.php?id_ambul=<?=$data3['id_ambul'];?>"><?=$data3['id_ambul'];?></a></td>
						<td><?= date('d F Y',strtotime($data3['tanggal'])).", ".date('H:i', strtotime($data3['tanggal']));?></td>
					</tr>
				<?php }	
				?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
