<?php
	session_start();
	include 'koneksi.php';

	$id_hewan	= $_POST['id_hewan'];
	//$next_page	= $_POST['next_page'];

	$sql	= "SELECT * from hewan where id_hewan='$id_hewan'";
	$data	= mysqli_query($connect,$sql);

	$cek = mysqli_num_rows($data);	//check data

	if($cek > 0){
		//$_SESSION['id_dokter'] = $id_dokter;
		$_SESSION['id_hewan'] = $id_hewan;
		$_SESSION['status'] = "ditemukan";
		header("Location:riwayat_hewan.php?message=cari_hewan");
		//harusnya pake next_page
	}
	else{
		header("Location:cari_hewan.php?message=failed");
	}
	mysqli_close($connect);
?>