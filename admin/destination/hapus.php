<?php
include '../../koneksi.php';

$id = $_GET['idDestinasi'];

$query_mysql = mysqli_query($koneksi,"SELECT gambar FROM destinasi_gambar WHERE destinasi_id = '$id' ")or die(mysqli_error());

while($data = mysqli_fetch_array($query_mysql)){
	$gambar = $data['gambar'];
	unlink('../../'.$gambar);
}

$queryDelete = "DELETE FROM destinasi WHERE id = '$id'";
mysqli_query($koneksi,$queryDelete);

echo "<script>
	alert('Berhasil di hapus!');
	window.location.href='index';
	</script>";
//header("location:admin");
?>