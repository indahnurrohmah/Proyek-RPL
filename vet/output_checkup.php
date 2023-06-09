<?php
	session_start();
	include 'koneksi.php';

	if (empty($_GET['id_dataCheckUp'])) {
		header("Location:cari_hewan.php?message=belumcarihewan");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan Check-Up</title>
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
  	  <a class="navbar-brand"><img src="Images/logo.png" style="height:30px" alt="HOSPITAL"></a>
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
				<a href="home.php" class="list-group-item list-group-item-action" style="font-weight:bold;">Beranda</a>
				<a href="lihat_data.php" class="list-group-item list-group-item-action">Lihat Data Hewan</a>
				<a href="cari_hewan.php" class="list-group-item list-group-item-action">Catat Data Hewan</a>
				<?php if(!empty($_SESSION['id_dokter'])){?>
					<a href="logout.php" class="list-group-item list-group-item-action"><?="Keluar";
					?></a>
				<?php }?>
			</div>
		</div>
	</div>
	<!--end of navbar area-->

	<?php
	
		
		$id_dataCheckUp	= $_GET['id_dataCheckUp'];
		$query = mysqli_query($connect, "SELECT a.*, b.*, c.*, d.* FROM data_checkup as a INNER JOIN dokter_hewan as b ON a.id_dokter=b.id_dokter INNER JOIN data_pemeriksaan as c ON a.id_pemeriksaan=c.id_pemeriksaan INNER JOIN hewan as d ON c.id_hewan=d.id_hewan WHERE a.id_dataCheckUp='$id_dataCheckUp' ");
	
	while ($data = mysqli_fetch_array($query)) {
	?>
	<center class="my-1 pt-1">
	<h2> Laporan Check-Up</h2>
	<div style="width:80%; background-color:#063970;" class="py-4 px-2">
		<div class="row">
			<div class="col-2 mr-0">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>ID Hewan</h6>
				<h6>Nama Hewan</h6>
				<h6>Nama Pemilik</h6>
				<h6>ID Dokter</h6>
				<h6>Nama Dokter</h6><br>
			</div>
			</div>
			<div class="col-10 mr-5">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$data['id_hewan'];?></h6>
				<h6><?= ": ".$data['nama_hewan'];?></h6>
				<h6><?= ": ".$data['nama_pemilik'];?></h6>
				<h6><?= ": ".$data['id_dokter'];?></h6>
				<h6><?= ": ".$data['nama'];?></h6><br>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>Perawatan</h6>
				<h6>Habitus</h6>
				<h6>Gizi</h6>
				<h6>Pertumbuhan Badan</h6>
			</div>
			</div>
			<div class="col-6 ml-3">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$data['perawatan'];?></h6>
				<h6><?= ": ".$data['habitus'];?></h6>
				<h6><?= ": ".$data['gizi'];?></h6>
				<h6><?= ": ".$data['pertumbuhan_badan'];?></h6>
			</div>
			</div>
			<div class="col-1">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>Suhu</h6>
				<h6>Napas</h6>
				<h6>Nadi</h6>
			</div>
			</div>
			<div class="col-3 mr-3">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$data['suhu'];?></h6>
				<h6><?= ": ".$data['napas'];?></h6>
				<h6><?= ": ".$data['nadi'];?></h6>
			</div>
			</div>
		</div>
		<div style="color:white; text-align:right;" class="mr-3">
				<h6><?= date('d F Y',strtotime($data['tanggal'])).", ".date('H:i', strtotime($data['tanggal']));?></h6>
		</div>
	<?php } ?>
	</div>

	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
