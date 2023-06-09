<?php
	include 'koneksi.php';

	$message			= $_GET['message'];
	$id_hewan			= $_POST['id_hewan'];
	$id1				= $_POST['id_data'];
	$id2				= "NULL";
	$id_dokter			= $_POST['id_dokter'];
	$perawatan			= $_POST['perawatan'];
	$habitus	    	= $_POST['habitus'];
	$gizi				= $_POST['gizi'];
	$suhu				= $_POST['suhu'];
	$napas				= $_POST['napas'];
    $nadi				= $_POST['nadi'];
	$pertumbuhan_badan	= $_POST['pertumbuhan_badan'];
	$tanggal			= $_POST['tanggal'];
	
	if ($message=="pemeriksaan") {
		$sql	= "INSERT INTO data_checkup VALUES('','$id1','$id_dokter',$id2, '$perawatan', '$habitus', '$gizi', '$suhu', '$napas', '$nadi', '$pertumbuhan_badan','$tanggal')";

		$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));
	
		if($query) {
			header("Location:data_pemeriksaan.php?id_pemeriksaan=$id1&id_hewan=$id_hewan");
		}
		else {
			header("Location:pemeriksaan.php?message=inputCheckUpGagal");
		}
	}
	else if ($message=="penitipan") {
		$sql	= "INSERT INTO data_checkup VALUES('',$id2,'$id_dokter','$id1', '$perawatan', '$habitus', '$gizi', '$suhu', '$napas', '$nadi', '$pertumbuhan_badan','$tanggal')";
		$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));
	
		if($query) {
			header("Location:data_penitipan.php?id_penitipan=$id1&id_hewan=$id_hewan");
		}
		else {
			header("Location:pemeriksaan.php?message=inputCheckUpGagal");
		}
	}


	
?>
