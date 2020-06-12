<?php
include '../../koneksi.php';

$idRent = $_GET['idRent'];
$queryDelete = "DELETE FROM rent WHERE id = '$idRent'";
//echo($queryDelete);
mysqli_query($koneksi,$queryDelete);
echo "<script>
            alert('Berhasil dihapus');
            window.location.href='index';
            </script>";
            //header("location:tentang");
?>