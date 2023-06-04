<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logbook Penitipan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
	<nav class="navbar navbar-dark fixed-top" style="background-color:#063970">
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
				<a href="home.php" class="list-group-item list-group-item-action">Beranda</a>
				<a href="lihat_data.php" class="list-group-item list-group-item-action" style="font-weight:bold;">Lihat Data Hewan</a>
				<a href="catat_data.php" class="list-group-item list-group-item-action">Catat Data Hewan</a>
				<?php if(!empty($_SESSION['id_dokter'])){?>
					<a href="logout.php" class="list-group-item list-group-item-action"><?="Keluar";
					?></a>
				<?php }?>
			</div>
		</div>
	</div>
	<!--end of navbar area-->
	<center class="my-5 pt-5">
		<div style="width:90%; background-color:#063970;" class="py-4 px-2">
			<form method="GET" action="logbook_penitipan.php" style="width: 100%;" class="row">
				<div style="color:white; text-align:left;" class="col-4">
					<h3>LOGBOOK PENITIPAN</h3>
				</div>
				<div class="col-4">
					<input class="form-control" type="text" name="search" placeholder="Input Pencarian...">
				</div>
				<div class="col-3">
					<select class="form-select" name="by">
						<option value='0' selected>- Berdasarkan</option>
						<option value='1'>ID Penitipan</option>
						<option value='2'>ID Hewan</option>
						<option value='3'>Tanggal Masuk</option>
						<option value='4'>Tanggal Keluar</option>
						<option value='5'>Keterangan</option>
					</select>
				</div>
				<div class="col-1">
					<button class="btn btn-light" type="submit" name="submit" value="1">CARI</button>
				</div>
			</form>
		</div>
		<?php
			if(!empty($_GET['submit'])){
				$search	= $_GET['search'];
				$by	= $_GET['by'];
			}
			else $by = '0';
			
			if($by=='0')
				$sqlSearch="SELECT * FROM data_penitipan";
			elseif($by=='1')
				$sqlSearch="SELECT * FROM data_penitipan WHERE id_penitipan='$search'";
			elseif($by=='2')
				$sqlSearch="SELECT * FROM data_penitipan WHERE id_hewan='$search'";
			elseif($by=='3')
				$sqlSearch="SELECT * FROM data_penitipan WHERE tanggal_masuk='$search'";
			elseif($by=='4')
				$sqlSearch="SELECT * FROM data_penitipan WHERE tanggal_keluar='$search'";
			elseif($by=='5')
				$sqlSearch="SELECT * FROM data_penitipan WHERE keterangan='$search'";
			
			$query1=mysqli_query($connect,$sqlSearch);
		?>
		<div style="width:90%;" class="px-2 mt-5">
			<table class="table table-bordered" style="text-align:center;">
				<thead class="table-light">
					<tr>
						<td class="col-1">ID Penitipan</td>
						<td class="col-1">ID Hewan</td>
						<td class="col-2">Nama Hewan</td>
						<td class="col-2">Tanggal Masuk</td>
						<td class="col-2">Tanggal Keluar</td>
						<td class="col-2">Keterangan</td>
					</tr>
				</thead>
				<tbody>
					<?php while($data1=mysqli_fetch_array($query1)) { ?>
					<tr>
						<td> <?php echo $data1['id_penitipan']; ?> </td>
						<td> <?php echo $data1['id_hewan']; ?> </td>
						<td> 
							<?php 
							$query2=mysqli_query($connect,"SELECT nama_hewan FROM hewan WHERE id_hewan=$data1[id_hewan]");
							$data2=mysqli_fetch_array($query2);
							echo $data2['nama_hewan'];
							?>
						</td>
						<td> <?php echo $data1['tanggal_masuk']; ?> </td>
						<td> <?php echo $data1['tanggal_keluar']; ?> </td>
						<td> <?php echo $data1['keterangan']; ?> </td>
					</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>