<?php
include '../../koneksi.php';

$idPesan = $_GET['idPesan'];
$queryDelete = "DELETE FROM pesan WHERE id = '$idPesan'";
//echo($queryDelete);
mysqli_query($koneksi,$queryDelete);
echo "<script>
            alert('Berhasil dihapus');
            window.location.href='index';
            </script>";
            //header("location:tentang");
?>