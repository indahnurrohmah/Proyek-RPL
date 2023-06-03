<?php 
	include 'koneksi.php';
	$id_penitipan	= $_GET['id_penitipan'];

	$query = mysqli_query($connect, "DELETE FROM data_penitipan where id_penitipan='$id_penitipan'");

	if($query)
	{
        header("Location:riwayat_hewan.php");
    }
	else{
		echo "proses hapus gagal";
	}
?>