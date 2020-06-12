<?php
include '../../koneksi.php';

$idUser = $_GET['idUser'];
$queryDelete = "DELETE FROM admin WHERE id = '$idUser'";
//echo($queryDelete);
mysqli_query($koneksi,$queryDelete);
echo "<script>
	alert('Berhasil di hapus!');
	window.location.href='index';
	</script>";
//header("location:admin");
?>