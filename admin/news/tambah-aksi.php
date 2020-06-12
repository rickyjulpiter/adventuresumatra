<?php
include '../../koneksi.php';

$nama = mysqli_escape_string($koneksi,$_POST['nama']);
$deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
$image = "images/" . $nama . "-" . basename($_FILES["gambar"]["name"]);

$lokasi_file = $_FILES['gambar']['tmp_name'];
$nama_file = $_FILES['gambar']['name'];

$folder = "../../images/" . $nama . "-" . $nama_file;

if ($nama_file != '') {
    $queryInsert = "INSERT INTO news (nama,deskripsi,gambar) VALUES ('$nama','$deskripsi','$image')";
    if (move_uploaded_file($lokasi_file, "$folder")) {
        mysqli_query($koneksi, $queryInsert);
        echo "<script>
            alert('Berhasil ditambahkan');
            window.location.href='index';
            </script>";
        //header("location:paket-wisata");
        //echo $queryInsert;
    } else if (!move_uploaded_file($lokasi_file, "$folder")) {
        echo "error";
    }
} else if ($nama_file == '') {
    $queryInsert = "INSERT INTO news (nama,deskripsi) VALUES ('$nama','$deskripsi')";
    mysqli_query($koneksi, $queryInsert);
    echo "<script>
        alert('Berhasil ditambahkan');
        window.location.href='index';
        </script>";

    //header("location:paket-wisata");
    //echo $queryInsert;
} else {
    echo "error";
}
