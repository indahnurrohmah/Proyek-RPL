<?php
	include 'koneksi.php';

	$id_hewan			= $_POST['id_hewan'];
	$id_pemeriksaan		= $_POST['id_pemeriksaan'];
	$id_dokter			= $_POST['id_dokter'];
	$sikap_berdiri		= $_POST['sikap_berdiri'];
	$turgor_kulit	    = $_POST['turgor_kulit'];
	$mukosa_mata		= $_POST['mukosa_mata'];
	$cermin_hidung		= $_POST['cermin_hidung'];
	$intergumen			= $_POST['intergumen'];
    $alat_gerak			= $_POST['alat_gerak'];
	$sirkulasi			= $_POST['sirkulasi'];
	$pencernaan			= $_POST['pencernaan'];
	$genetal			= $_POST['genetal'];
	$diagnosa			= $_POST['diagnosa'];
	$prognosa			= $_POST['prognosa'];
	$pengobatan			= $_POST['pengobatan'];
	$pemeriksaan_ulang	= $_POST['pemeriksaan_ulang'];
	$tanggal			= $_POST['tanggal'];

	$sql	= "INSERT INTO ambul VALUES('','$id_dokter','$id_pemeriksaan','$sikap_berdiri', '$turgor_kulit', '$mukosa_mata', '$cermin_hidung', '$intergumen', '$alat_gerak', '$sirkulasi', '$pencernaan','$genetal','$diagnosa','$prognosa','$pengobatan','$pemeriksaan_ulang','$tanggal')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:data_pemeriksaan.php?id_pemeriksaan=$id_pemeriksaan&id_hewan=$id_hewan");
	}
	else {
		header("Location:terdaftar.php?message=inputAmbulGagal");
	}
	
?>
