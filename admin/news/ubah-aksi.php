<?php
include '../../koneksi.php';

$lokasi_file = $_FILES['gambar']['tmp_name'];
$nama_file = $_FILES['gambar']['name'];

$id = $_POST['id'];
$nama = mysqli_escape_string($koneksi,$_POST['nama']);
$deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);

$folder = "../../images/" . $nama . "$nama_file";
$save = 'images/' . $nama . $nama_file;

if ($nama_file != '') {
    $queryUpdate = "UPDATE news SET
                        nama = '$nama',
                        deskripsi = '$deskripsi',
                        gambar = '$save'
                        WHERE id = '$id'
                        ";
    if (move_uploaded_file($lokasi_file, "$folder")) {
        mysqli_query($koneksi, $queryUpdate);
        echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
    } else if (!move_uploaded_file($lokasi_file, "$folder")) {
        echo "error";
    }
} else if ($nama_file == '') {
    $queryUpdate = "UPDATE news SET
                        nama = '$nama',
                        deskripsi = '$deskripsi'
                        WHERE id = '$id'
                        ";
    mysqli_query($koneksi, $queryUpdate);
    echo $queryUpdate;
    // echo "<script>
    //     alert('Berhasil diupdate');
    //     window.location.href='index';
    //     </script>";
    // echo $queryUpdate;
    //header("location:jenis-paket");
} else {
    echo "error";
}
