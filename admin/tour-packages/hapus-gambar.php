<?php
include '../../koneksi.php';

$idGambar = $_GET['idGambar'];
$idTour = $_GET['idTour'];

$queryGambar = mysqli_query($koneksi, "SELECT gambar FROM paket_wisata_gambar WHERE id = $idGambar");
$d = mysqli_fetch_assoc($queryGambar);
$gambar = $d['gambar'];

if (unlink('../../' . $gambar)) {
    $queryDelete = "DELETE FROM paket_wisata_gambar WHERE id = '$idGambar'";
    mysqli_query($koneksi, $queryDelete);
}
       
header("location:ubah?idTourPackages=$idTour");
?>