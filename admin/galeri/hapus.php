<?php
include '../../koneksi.php';

$id = $_GET['id'];

$queryDetailPaket = mysqli_query($koneksi,"SELECT gambar FROM galeri WHERE id = '$id'");
$d = mysqli_fetch_assoc($queryDetailPaket);
$gambar = $d['gambar'];

$queryDelete = "DELETE FROM galeri WHERE id = '$id'";
mysqli_query($koneksi,$queryDelete);

$queryDelete = "DELETE FROM galeri_detail WHERE galeri_id = '$id'";
mysqli_query($koneksi,$queryDelete);

if($gambar){
	unlink('../../'.$gambar);
}


echo "<script>
	alert('Berhasil di hapus!');
	window.location.href='index';
	</script>";

//header("location:admin");
?>