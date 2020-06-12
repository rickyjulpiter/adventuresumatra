<?php
    include '../../koneksi.php';
    //echo exec('whoami');

    $lokasi_file= $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];

    $folder = "../../images/$nama_file";

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);

    //$queryCariJenis = "SELECT * FROM rent WHERE nama_paket = '$jenis'";
    //$queryJenis = mysqli_query($koneksi,$queryCariJenis);
    //echo($queryCariJenis);
    //$d = mysqli_fetch_assoc($queryJenis);
    //$jenisPaket = $d['id_paket'];

    if ($nama_file != '') {
        $queryInsert = "INSERT INTO rent (
                        nama,
                        deskripsi,
                        gambar
                        ) VALUES
                        ('$nama','$deskripsi','images/$nama_file')
                        ";
        if (move_uploaded_file($lokasi_file, "$folder")) {
            mysqli_query($koneksi,$queryInsert);
            echo "<script>
            alert('Berhasil ditambahkan');
            window.location.href='index';
            </script>";
            //header("location:paket-wisata");
            //echo $queryInsert;
        }
        else if (!move_uploaded_file($lokasi_file, "$folder")) {
            echo "error";
        }
    }
    else if ($nama_file == '') {
        $queryInsert = "INSERT INTO rent (
                        nama,
                        deskripsi
                        ) VALUES
                        ('$nama','$deskripsi')
                        ";
        mysqli_query($koneksi,$queryInsert);
        echo "<script>
        alert('Berhasil ditambahkan');
        window.location.href='index';
        </script>";
        //header("location:paket-wisata");
        //echo $queryInsert;
    }
    else{
        echo "error";
    }
    
?>