<?php
include '../../koneksi.php';

$idGambar = $_GET['idGambar'];
$idDestinasi = $_GET['idDestinasi'];

$queryGambar = mysqli_query($koneksi,"SELECT gambar FROM destinasi_gambar WHERE id = $idGambar");
$d = mysqli_fetch_assoc($queryGambar);
$gambar = $d['gambar'];

if(unlink('../../'.$gambar)){
    $queryDelete = "DELETE FROM destinasi_gambar WHERE id = '$idGambar'";
    mysqli_query($koneksi,$queryDelete);
}
       
header("location:ubah?idDestinasi=$idDestinasi");
?>