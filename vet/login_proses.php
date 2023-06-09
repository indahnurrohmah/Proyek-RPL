<?php
	session_start();
	include 'koneksi.php';

	$id_dokter	= $_POST['id_dokter'];
	$password	= $_POST['password'];
	$next_page	= $_POST['next_page'];

	$sql	= "SELECT * from dokter_hewan where id_dokter='$id_dokter' and password='$password'";
	$data	= mysqli_query($connect,$sql);

	$cek = mysqli_num_rows($data);	//check data

	if($cek > 0){
		$_SESSION['id_dokter'] = $id_dokter;
		$_SESSION['status'] = "login";
		header("Location:$next_page");
	}
	else{
		header("Location:login.php?message=failed");
	}
	mysqli_close($connect);
?>