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
	<title>Riwayat</title>
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
				<a href="catat_data.php" class="list-group-item list-group-item-action">Catat Data Hewan</a>
				<?php if(!empty($_SESSION['id_dokter'])){?>
					<a href="logout.php" class="list-group-item list-group-item-action"><?="Keluar";
					?></a>
				<?php }?>
			</div>
		</div>
	</div>
	<!--end of navbar area-->

	<?php
	if ($_GET['message']=="cari_hewan") {
		$id_hewan = $_SESSION['id_hewan'];
		$query = mysqli_query($connect, "SELECT * FROM hewan WHERE id_hewan='$id_hewan'");
	}
	else if ($_GET['message']=="inputhewan") {
		$query = mysqli_query($connect, "SELECT * FROM hewan ORDER BY id_hewan DESC LIMIT 1");
	}
	while ($data = mysqli_fetch_array($query)) {
		
		
	?>
	<center class="my-1 pt-1">
	<h2> Riwayat Data Hewan</h2>
	<div style="width:80%; background-color:#063970;" class="py-4 px-2">
		<div class="row">
			<div class="col-2 mr-0">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>ID Hewan</h6>
				<h6>Nama Hewan</h6><br><br>
				<h6>Nama Pemilik</h6>
				<h6>No. WA Pemilik</h6>
				<h6>Alamat Pemilik</h6>
			</div>
			</div>
			<div class="col-4 mr-5">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$data['id_hewan'];?></h6>
				<h6><?= ": ".$data['nama_hewan'];?></h6><br><br>
				<h6><?= ": ".$data['nama_pemilik'];?></h6>
				<h6><?= ": ".$data['no_wa_pemilik'];?></h6>
				<h6><?= ": ".$data['alamat'];?></h6>
			</div>
			</div>
			<div class="col-2 ml-2 mr-0 ">
			<div style="color:white; text-align:left;" class="mb-3 mx-3">
				<h6>Umur</h6>
				<h6>Spesies</h6>
				<h6>Ras</h6>
				<h6>Warna</h6>
				<h6>Berat</h6>
				<h6>Jenis Kelamin</h6>
				<h6>tanda Khusus</h6>
			</div>
			</div>
			<div class="col-4 mr-3">
			<div style="color:white; text-align:left;">
				<h6><?= ": ".$data['umur'];?></h6>
				<h6><?= ": ".$data['spesies'];?></h6>
				<h6><?= ": ".$data['ras'];?></h6>
				<h6><?= ": ".$data['warna'];?></h6>
				<h6><?= ": ".$data['berat'];?></h6>
				<h6><?= ": ".$data['jenis_kelamin'];?></h6>
				<h6><?= ": ".$data['tanda_khusus'];?></h6>
			</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<?php
		$today= date("Y-m-d");
		?>
		<div class="col-5">
			<div style="width:90%;" class="mt-4">
			<div class="row">
				<div class="col-9">
					<h5 style="text-align:left">Riwayat Pemeriksaan</h5>
				</div>
				<div class="col-3">
					<a type="button" href="input_pemeriksaan.php?id_pemeriksaan=<?= $today;?>" class="btn btn-dark btn-lg btn-merkcolor btn-sm" style="align:right">Tambah</a>
				</div>
			</div>
			<table class="table table-bordered" style="text-align:center">
			<thead class="table-light">
				<tr>
					<td class="col-1">ID Pemeriksaan</td>
					<td class="col-1">Aksi</td>
				</tr>
			</thead>
				<tbody>
					<?php
					 
					$today= date("Y-m-d");
					$now= date("H:i:s");

					$sql= "SELECT a.*, b.* FROM hewan AS a INNER JOIN data_pemeriksaan AS b
							ON a.id_hewan=b.id_hewan WHERE a.id_hewan='$id_hewan'";

					$query = mysqli_query($connect, $sql);
					while($data=mysqli_fetch_array($query)){
						//$waktu_selesai=$data['waktu_selesai'];
						//$tgl=$data['tgl'];
					?>
							<tr>
							<td> <?=$data['id_pemeriksaan'];?></td>
							<td><a href="hapus_pemeriksaan.php?id_pemeriksaan=<?php echo $data['id_pemeriksaan'];?>" class="btn btn-danger">Hapus</a></td>
							</tr>
					<?php }	
					?>
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-7">
			<div style="width:90%;" class="mt-4">
				<div class="row">
				<div class="col-10">
					<h5 style="text-align:left">Riwayat Penitipan</h5>
				</div>
				<div class="col-2">
					<a type="button" href="input_penitipan.php" class="btn btn-dark btn-lg btn-merkcolor btn-sm" >Tambah</a>
				</div>
				</div>
				<table class="table table-bordered" style="text-align:center">
				<thead class="table-light">
				<tr>
					<td class="col-1">ID Penitipan</td>
					<td class="col-1">Tanggal Masuk</td>
					<td class="col-1">Tanggal Keluar</td>
					<td class="col-1">Aksi</td>
				</tr>
				</thead>
				<tbody>
					<?php
					 
					$today= date("Y-m-d");
					$now= date("H:i:s");

					$sql= "SELECT a.*, b.* FROM hewan AS a INNER JOIN data_penitipan AS b
							ON a.id_hewan=b.id_hewan WHERE a.id_hewan='$id_hewan'";

					$query = mysqli_query($connect, $sql);
					while($data=mysqli_fetch_array($query)){
						//$waktu_selesai=$data['waktu_selesai'];
						//$tgl=$data['tgl'];
					?>
					<tr>
						<td> <?=$data['id_penitipan'];?></td>
						<td> <?=date('d F Y',strtotime($data['tanggal_masuk']));?></td>
						<td> <?=date('d F Y',strtotime($data['tanggal_keluar']));?></td>
						<td><a href="hapus_penitipan.php?id_penitipan=<?php echo $data['id_penitipan'];?>" class="btn btn-danger">Hapus</a></td>
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
