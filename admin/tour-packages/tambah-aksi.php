<?php
    include '../../koneksi.php';

    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $peta = $_POST['peta'];
    $timeline = mysqli_escape_string($koneksi,$_POST['timeline']);
    $data_des = $_POST['data_des'];
    $nama_gambar = $_FILES['gambar']['name'];
    $lokasi_gambar = $_FILES['gambar']['tmp_name'];

    $queryInsert = "INSERT INTO paket_wisata (nama,deskripsi, peta, timeline) VALUES ('$nama','$deskripsi','$peta','$timeline')";
    $data = mysqli_query($koneksi,$queryInsert);

    $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id) FROM paket_wisata");
    $d = mysqli_fetch_assoc($queryCheckMax);
    $id = $d['MAX(id)'];

    for($i=0; $i<sizeof($nama_gambar); $i++){
        if($nama_gambar[$i] != ''){
            $imageSave = "images/"."tour".$id."-".$i."-".$nama_gambar[$i];
            $folder = "../../images/"."tour".$id."-".$i."-".$nama_gambar[$i];
            $queryInsert = "INSERT INTO paket_wisata_gambar (paket_wisata_id,gambar) VALUES ('$id','$imageSave')";
            if(move_uploaded_file($lokasi_gambar[$i], "$folder")){
                $data = mysqli_query($koneksi,$queryInsert);
            }
        }
    }

    for($i=0; $i<sizeof($data_des); $i++){
        $queryInsert = "INSERT INTO paket_wisata_detail (paket_wisata_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
        mysqli_query($koneksi,$queryInsert);
    }
    echo "<script>
        alert('Berhasil ditambah');
        window.location.href='index';
        </script>";
    
    
?>