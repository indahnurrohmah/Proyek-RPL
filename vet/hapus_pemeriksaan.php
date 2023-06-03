<?php 
	include 'koneksi.php';
	$id_pemeriksaan	= $_GET['id_pemeriksaan'];

	$query = mysqli_query($connect, "DELETE FROM data_pemeriksaan where id_pemeriksaan='$id_pemeriksaan'");

	if($query)
	{
        header("Location:riwayat_hewan.php");
    }
	else{
		echo "proses hapus gagal";
	}
?>