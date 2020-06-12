<?php
include '../../koneksi.php';

$id = $_GET['id'];

$queryDetailPaket = mysqli_query($koneksi,"SELECT gambar FROM news WHERE id = '$id'");
$d = mysqli_fetch_assoc($queryDetailPaket);
$gambar = $d['gambar'];
$queryDelete = "DELETE FROM news WHERE id = '$id'";
mysqli_query($koneksi,$queryDelete);
unlink('../../'.$gambar);
echo "<script>
	alert('Berhasil di hapus!');
	window.location.href='index';
	</script>";

//header("location:admin");
?>