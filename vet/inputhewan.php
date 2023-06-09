<?php
	session_start();
	include 'koneksi.php';

	if (empty($_SESSION['id_dokter'])) {
		header("Location:login.php?message=inputhewan.php");
	}

	$today		= date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendaftaran Hewan Baru</title>
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
    
    <center>
        <h2 style="margin-top:2.5%;">Formulir Data Hewan Baru</h2>
    </center>
    <div class="row" style="width:100vw">
    <div class="col-3">
    </div>
    <div class="col-6">
        <div class="container-md form-container">
        <form action="inputhewan_proses.php" method="POST">
        <?php if(isset($_GET['message'])){
        	if ($_GET['message']=="form_janji.php") {?>
				<input type="hidden" name="next_page" value="form_janji.php"></input>
			<?php }}
			else {?>
				<input type="hidden" name="next_page" value="data_hewan.php"></input>
			<?php }
        ?>
        <div class="row">
            <div class="col-6 mr-2">
                <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Hewan">
                <input type="text" name="spesies" class="form-control mb-2" placeholder="Spesies">
                <input type="text" name="nama_pemilik" class="form-control mb-2" placeholder="Nama Pemilik">
                <input type="text" name="no_wa_pemilik" class="form-control mb-2" placeholder="No WA Pemilik">
                <textarea class="form-control mb-2" name="alamat" rows="2" placeholder="Alamat Pemilik"></textarea>
            </div>
            <div class="col-6 ml-2">
                <input type="text" name="umur" class="form-control mb-2" placeholder="Umur">
                <input type="text" name="berat" class="form-control mb-2" placeholder="Berat">
                <input type="text" name="ras" class="form-control mb-2" placeholder="Ras">
                <input type="text" name="warna" class="form-control mb-2" placeholder="Warna">
                <input type="text" name="jenis_kelamin" class="form-control mb-2" placeholder="Jenis Kelamin">
                <input type="text" name="tanda_khusus" class="form-control mb-2" placeholder="Tanda Khusus">
            </div>
        </div>     
        <button type="submit" class="btn btn-light mt-5" style="width: 100%">SIMPAN</button>           
        </form>    
        </div>
    </div>
    <div class="col-3">
    </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
