<?php
	include 'koneksi.php';

	$nama_hewan		= $_POST['nama'];
	$spesies	    = $_POST['spesies'];
	$nama_pemilik	= $_POST['nama_pemilik'];
	$no_wa_pemilik	= $_POST['no_wa_pemilik'];
	$alamat			= $_POST['alamat'];
    $umur			= $_POST['umur'];
	$berat	        = $_POST['berat'];
	$ras			= $_POST['ras'];
	$warna	        = $_POST['warna'];
    $jenis_kelamin	= $_POST['jenis_kelamin'];
	$tanda_khusus	= $_POST['tanda_khusus'];


	$sql	= "INSERT INTO hewan VALUES('','$nama_hewan', '$nama_pemilik', '$alamat', '$no_wa_pemilik', '$umur', '$spesies', '$ras', '$warna','$berat', '$jenis_kelamin', '$tanda_khusus')";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

	if($query) {
		header("Location:riwayat_hewan.php?message=inputhewan");}
	else {
		header("Location:inputhewan.php?message=failed");
	}
	
?>
