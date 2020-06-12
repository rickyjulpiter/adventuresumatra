<?php
    include '../../koneksi.php';

    $id = $_POST['id'];
    $nama = mysqli_escape_string($koneksi,$_POST['nama']);
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $deskripsi_singkat = mysqli_escape_string($koneksi,$_POST['deskripsi_singkat']);
    $destinasi = $_POST['destinasi'];
    $prioritas = $_POST['prioritas'];

    $lokasi_gambar= array();
    $nama_gambar = array();
    $idgambar = array();
    if(!empty($_FILES['gambar']['tmp_name'])){
        $lokasi_gambar= $_FILES['gambar']['tmp_name'];
        $nama_gambar = $_FILES['gambar']['name'];
        $idgambar = $_POST['idgambar'];
    }

    $add_nama_gambar = array();
    $add_lokasi_gambar = array();

    if(!empty($_FILES['tambahgambar']['name'])){
        $add_nama_gambar = $_FILES['tambahgambar']['name'];
        $add_lokasi_gambar = $_FILES['tambahgambar']['tmp_name'];    
    }

    for($i=0; $i<sizeof($add_nama_gambar); $i++){
        if($add_nama_gambar[$i] != ''){
            $imageSave = "images/".$nama."-add-".$i.'-'.$add_nama_gambar[$i];
            $folder = "../../images/".$nama."-add-".$i.'-'.$add_nama_gambar[$i];
            $queryInsert = "INSERT INTO destinasi_area_gambar (destinasi_area_id,gambar) VALUES ('$id','$imageSave')";
            if(move_uploaded_file($add_lokasi_gambar[$i], "$folder")){
                $data = mysqli_query($koneksi,$queryInsert);
            }
        }
    }

    for($i=0; $i<sizeof($nama_gambar); $i++){
        $query_mysql = mysqli_query($koneksi,"SELECT gambar FROM destinasi_area_gambar WHERE id = '$idgambar[$i]'");    
        if($nama_gambar[$i]!=''){
            $data = mysqli_fetch_assoc($query_mysql);
            if(unlink('../../'.$data['gambar'])){
                $imageSave = "images/".$nama."-edit-".$i.'-'.$nama_gambar[$i];
                $folder = "../../images/".$nama."-edit-".$i.'-'.$nama_gambar[$i];   
                $queryUpdate = "UPDATE destinasi_area_gambar SET gambar = '$imageSave' WHERE id = '$idgambar[$i]'";
                if(move_uploaded_file($lokasi_gambar[$i], "$folder")){
                    $data = mysqli_query($koneksi,$queryUpdate);
                }
            }                
        }
    }

    $queryUpdate = "UPDATE destinasi_area SET
                         nama_area = '$nama',
                         deskripsi_area = '$deskripsi',
                         destinasi_id = '$destinasi',
                         deskripsi_area_singkat = '$deskripsi_singkat',
                         prioritas = '$prioritas'
                         WHERE id_area = '$id'
                         ";
         mysqli_query($koneksi,$queryUpdate);
         echo "<script>
        alert('Berhasil diupdate');
        window.location.href='index';
        </script>";

?>