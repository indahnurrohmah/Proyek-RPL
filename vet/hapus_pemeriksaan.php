<?php 
	include 'koneksi.php';
	$id_hewan = $_GET['id_hewan'];
	$id_pemeriksaan	= $_GET['id_pemeriksaan'];

	$query = mysqli_query($connect, "DELETE FROM data_pemeriksaan where id_pemeriksaan='$id_pemeriksaan'");

	if($query)
	{
        header("Location:riwayat_hewan.php?message=hapus&id_hewan=$id_hewan");
    }
	else{
		echo "proses hapus gagal";
	}
?>