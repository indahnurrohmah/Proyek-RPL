<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cari Hewan</title>
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
	<div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
	<div style="width:25%;">

		<form method="POST" action="cari_hewan_proses.php" style="width: 100%; background-color:#063970;" class="p-4">
			<center class="text-white">
			<?php if(isset($_SESSION['message'])){
				if($_SESSION['message']=="belumcarihewan"){	
					echo "Silakan input ID Hewan atau input data hewan baru terlebih dahulu.";	
				}
			}
			else if(isset($_GET['message'])){
				if($_GET['message']=="belumcarihewan"){	
					echo "Silakan input ID Hewan atau input data hewan baru terlebih dahulu.";	
				 }else if($_GET['message']=="failed"){
				 	echo "Pencarian gagal, silakan coba lagi.";	
				 }	
			}
			?>

			 </center>
			<!-- Disini untuk session -->
			<div class="row">
            	<div class="col-9 mr-2">
					<!--<label for="id_dokter" class="text-white">id_dokter</label>-->
					<input class="form-control d-grid mt-2" type="text" name="id_hewan" id="id_hewan" placeholder="ID Hewan"></input>
				</div>
				<div class="col-3 mt-2" style="text-align:center;">
				<button class="btn btn-light" type="submit">Cari</button>
			
				</div>
			</div>
			<center>
			<div class="text-white mt-2">
			<h5>atau</h5>
			</div>
			<a type="button" href="inputhewan.php" class="btn btn-primary mt-2">Input Data Hewan Baru</a>
		</center>
		</form>
		
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
