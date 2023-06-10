<?php
	session_start();
	include 'koneksi.php';
	
	if (empty($_SESSION['id_dokter'])) {
		header("Location:login.php?message=riwayat_hewan.php");
	}
	
	$today		= date("Y-m-d");
	if (empty($_GET['id_hewan'])) {
		header("Location:cari_hewan.php?message=belumcarihewan");
	}

	$id_hewan = $_GET['id_hewan'];
	$id_pemeriksaan = $_GET['id_pemeriksaan'];
	$id_dokter		= $_GET['id_dokter'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Data Ambulatoire Hewan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<style>
        .form-container{
        background-color: #063970;
        padding: 4%;
        }
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
						echo $data['nama'] . ", " . $spesialisasi;
					}
				?>
			</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<div class="list-group list-group-flush">
				<a href="home.php" class="list-group-item list-group-item-action">Beranda</a>
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
    
    <center>
        <h2 style="margin-top:2.5%;">INPUT AMBUL HEWAN</h2>
    </center>
    <div class="row" style="width:100vw">
    <div class="col-3">
    </div>
    <div class="col-6">
        <div class="container-md form-container">
        <form action="input_ambul_proses.php" method="POST">	
        	<input type="hidden" name="id_hewan" value="<?= $id_hewan;?>">
        	<input type="hidden" name="id_pemeriksaan" value="<?= $id_pemeriksaan;?>">
        	<input type="hidden" name="id_dokter" value="<?= $id_dokter;?>">
        <div class="row">
            <div class="col-6 mr-2">
                <input type="text" name="sikap_berdiri" class="form-control mb-2" placeholder="Sikap Berdiri">
                <input type="text" name="turgor_kulit" class="form-control mb-2" placeholder="Turgor Kulit">
                <input type="text" name="mukosa_mata" class="form-control mb-2" placeholder="Mukosa Mata">
                <input type="text" name="cermin_hidung" class="form-control mb-2" placeholder="Cermin Hidung">
                <input type="text" name="intergumen" class="form-control mb-2" placeholder="Intergumen">
            </div>
            <div class="col-6 ml-2">
                <input type="text" name="alat_gerak" class="form-control mb-2" placeholder="Alat Gerak">
                <input type="text" name="sirkulasi" class="form-control mb-2" placeholder="Sirkulasi">
                <input type="text" name="pencernaan" class="form-control mb-2" placeholder="Pencernaan">
                <input type="text" name="genetal" class="form-control mb-2" placeholder="Genetal">
                <input type="text" name="diagnosa" class="form-control" placeholder="Diagnosa">
            </div>
        </div> 
        <input type="text" name="prognosa" class="form-control mb-2" placeholder="Prognosa">
        <input type="text" name="pengobatan" class="form-control mb-2" placeholder="Pengobatan">
        <div class="row">
        	<div class="col-8 mr-4">
        		<input type="text" name="pemeriksaan_ulang" class="form-control mb-2" placeholder="Pemeriksaan Ulang">
        	</div>
        	<div class="col-4 mr-4">
        		<label><h6 class="text-white">Tanggal dan Waktu Ambul</h6></label>
        		<input class="form-control mb-2" type="datetime-local" name="tanggal" max="<?=$today?>">
        	</div>
        </div>    
        <button type="submit" class="btn btn-light mt-3" style="width: 100%">SIMPAN</button>           
        </form>    
        </div>
    </div>
    <div class="col-3">
    </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
