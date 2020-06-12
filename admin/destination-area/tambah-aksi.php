<?php
    include '../../koneksi.php';

    $nama = mysqli_escape_string($koneksi,$_POST['nama']);
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $deskripsi_singkat = mysqli_escape_string($koneksi,$_POST['deskripsi_singkat']);
    $destinasi = $_POST['destinasi'];
    $prioritas = $_POST['prioritas'];

    $images = array();
    $lokasi_file= array();
    if(!empty($_FILES["gambar"]["name"])){
        $images = $_FILES["gambar"]["name"];
        $lokasi_file= $_FILES['gambar']['tmp_name'];
    }
    

    // $folder = "../../images/".$nama."-".$nama_file;

    $queryInsert = "INSERT INTO destinasi_area (nama_area,deskripsi_area,deskripsi_area_singkat,prioritas,destinasi_id) VALUES ('$nama','$deskripsi','$deskripsi_singkat',$prioritas,$destinasi)";
    $proses = mysqli_query($koneksi,$queryInsert);
    if($proses){
        $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id_area) FROM destinasi_area");
        $d = mysqli_fetch_assoc($queryCheckMax);
        $id = $d['MAX(id_area)'];

        for($i=0; $i<sizeof($images); $i++){
            $gambar = "images/".$nama."-".$i.'-'.$images[$i];
            $folder = "../../images/".$nama."-".$i.'-'.$images[$i];
            $InsertGambar = "INSERT INTO destinasi_area_gambar (destinasi_area_id,gambar) VALUES ('$id','$gambar')";
            if (move_uploaded_file($lokasi_file[$i], "$folder")) {
                mysqli_query($koneksi,$InsertGambar);
            }
        }
    }

    echo "<script>
        alert('Berhasil ditambahkan');
        window.location.href='index';
        </script>"; 

?>