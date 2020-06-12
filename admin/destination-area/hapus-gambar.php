<?php
include '../../koneksi.php';

$idGambar = $_GET['idGambar'];
$idDestinasiArea = $_GET['idDestinasiArea'];


$queryGambar = mysqli_query($koneksi,"SELECT gambar FROM destinasi_area_gambar WHERE id = $idGambar");
$d = mysqli_fetch_assoc($queryGambar);
$gambar = $d['gambar'];
echo $gambar;

if(unlink('../../'.$gambar)){
    $queryDelete = "DELETE FROM destinasi_area_gambar WHERE id = '$idGambar'";
    mysqli_query($koneksi,$queryDelete);
}
       
header("location:ubah?idDestinasiArea=$idDestinasiArea");
?>