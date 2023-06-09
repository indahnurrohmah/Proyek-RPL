<?php
	include 'koneksi.php';

	$id_pemeriksaan		= $_GET['id_pemeriksaan'];
	$id_hewan	    	= $_GET['id_hewan'];

	$sql	= "SELECT * from data_pemeriksaan where id_pemeriksaan='$id_pemeriksaan'";
	$data	= mysqli_query($connect,$sql);

	$cek = mysqli_num_rows($data);	//check data

	if($cek < 1){
		$sql	= "INSERT INTO data_pemeriksaan VALUES('$id_pemeriksaan','$id_hewan')";
		$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));	
	
		if($query) {
			 header("Location:riwayat_hewan.php?id_hewan=$id_hewan&message=inputdatapemeriksaan_berhasil");
		}
		else {
			 header("Location:riwayat_hewan.php?message=inputdatapemeriksaan_gagal");
		}
	}
	else{
			 header("Location:riwayat_hewan.php?message=idpemeriksaan_terpakai");
	}
	mysqli_close($connect);
?>
