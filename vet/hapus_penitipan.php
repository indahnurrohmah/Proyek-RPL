<?php 
	include 'koneksi.php';

	$id_hewan = $_GET['id_hewan'];
	$id_penitipan	= $_GET['id_penitipan'];

	$query = mysqli_query($connect, "DELETE FROM data_penitipan where id_penitipan='$id_penitipan'");

	if($query)
	{
        header("Location:riwayat_hewan.php?message=hapus&id_hewan=$id_hewan");
    }
	else{
		echo "proses hapus gagal";
	}
?>