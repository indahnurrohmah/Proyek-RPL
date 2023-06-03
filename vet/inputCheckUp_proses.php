<?php
	include 'koneksi.php';

	$perawatan			= $_POST['perawatan'];
	$habitus	    	= $_POST['habitus'];
	$gizi				= $_POST['gizi'];
	$suhu				= $_POST['suhu'];
	$napas				= $_POST['napas'];
    $nadi				= $_POST['nadi'];
	$pertumbuhan_badan	= $_POST['pertumbuhan_badan'];
	$tanggal			= $_POST['tanggal'];


	$sql	= "INSERT INTO data_checkup VALUES('','','','','$nama_hewan', '$perawatan', '$habitus', '$gizi', '$suhu', '$napas', '$nadi', '$pertumbuhan_badan','$tanggal'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		if(isset($_GET['message'])){
        	if ($_GET['message']=="form_janji.php")
				header("Location:terdaftar.php?message=berhasil");
			else
				header("Location:terdaftar.php?message=home.php");
		}
		else header("Location:terdaftar.php?message=home.php");
	}
	else {
		echo "Input Data Gagal.";
	}
	
?>
