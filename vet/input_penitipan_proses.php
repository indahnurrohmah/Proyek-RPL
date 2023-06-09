<?php
	include 'koneksi.php';

	$id_hewan	    	= $_POST['id_hewan'];
	$tanggal_masuk	    = $_POST['tanggal_masuk'];
	$tanggal_keluar	    = $_POST['tanggal_keluar'];

	$sql	= "INSERT INTO data_penitipan VALUES('','$id_hewan','$tanggal_masuk','$tanggal_keluar')";
	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));	
	
	if($query) {
		header("Location:riwayat_hewan.php?id_hewan=$id_hewan&message=inputdatapenitipan_berhasil");
	}
	else {
		header("Location:riwayat_hewan.php?message=inputdatapenitipan_gagal");
	}
?>
