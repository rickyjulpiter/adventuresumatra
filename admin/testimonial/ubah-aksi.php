<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);

    $queryUpdate = "UPDATE testimonial SET
                        nama_testi = '$nama',
                        deskripsi_testi = '$deskripsi'
                        WHERE id_testi = '$id'
                        ";
    mysqli_query($koneksi,$queryUpdate);
    echo "<script>
            alert('Berhasil diupdate');
            window.location.href='testimonial';
            </script>";
            //header("location:testimonial");
    
?>