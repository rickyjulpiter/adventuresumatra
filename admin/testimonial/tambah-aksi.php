<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);

    $queryInsert = "INSERT INTO testimonial (
                        nama_testi,
                        deskripsi_testi
                        ) VALUES
                        ('$nama','$deskripsi')
                        ";
    mysqli_query($koneksi,$queryInsert);
    echo "<script>
            alert('Berhasil ditambahkan');
            window.location.href='testimonial';
            </script>";
            //header("location:testimonial");
    
?>