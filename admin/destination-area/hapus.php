<?php
include '../../koneksi.php';

$id = $_GET['idDestinasiArea'];

$query_mysql = mysqli_query($koneksi,"SELECT gambar FROM destinasi_area_gambar WHERE destinasi_area_id = '$id' ")or die(mysqli_error());

while($data = mysqli_fetch_array($query_mysql)){
	$gambar = $data['gambar'];
	unlink('../../'.$gambar);
}

$queryDelete = "DELETE FROM destinasi_area WHERE id_area = '$id'";
mysqli_query($koneksi,$queryDelete);

echo "<script>
	alert('Berhasil di hapus!');
	window.location.href='index';
	</script>";

//header("location:admin");
?>