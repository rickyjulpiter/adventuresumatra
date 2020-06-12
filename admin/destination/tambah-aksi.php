<?php
    include '../../koneksi.php';

    $nama = mysqli_escape_string($koneksi,$_POST['nama']);
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $deskripsi_singkat = mysqli_escape_string($koneksi,$_POST['deskripsi_singkat']);
    $images = $_FILES["gambar"]["name"];
    $lokasi_file= $_FILES['gambar']['tmp_name'];
    // $folder = "../../images/".$nama."-".$nama_file;
    $prioritas = $_POST['prioritas'];

    $queryInsert = "INSERT INTO destinasi (nama,deskripsi,deskripsi_singkat,prioritas) VALUES ('$nama','$deskripsi','$deskripsi_singkat','$prioritas')";
    $proses = mysqli_query($koneksi,$queryInsert);
    if($proses){
        $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id) FROM destinasi");
        $d = mysqli_fetch_assoc($queryCheckMax);
        $id = $d['MAX(id)'];

        for($i=0; $i<sizeof($images); $i++){
            $gambar = "images/".$nama."-".$i.'-'.$images[$i];
            $folder = "../../images/".$nama."-".$i.'-'.$images[$i];
            $InsertGambar = "INSERT INTO destinasi_gambar (destinasi_id,gambar) VALUES ('$id','$gambar')";
            if (move_uploaded_file($lokasi_file[$i], "$folder")) {
                mysqli_query($koneksi,$InsertGambar);
            }
        }
           
        echo "<script>
        alert('Berhasil ditambahkan');
        window.location.href='index';
        </script>"; 
    }
    

    // if ($nama_file != '') {
    //     $queryInsert = "INSERT INTO destinasi (nama,deskripsi,deskripsi_singkat,gambar) VALUES ('$nama','$deskripsi','$deskripsi_singkat','$image')";
    //     if (move_uploaded_file($lokasi_file, "$folder")) {
    //         mysqli_query($koneksi,$queryInsert);
    //         echo "<script>
    //         alert('Berhasil ditambahkan');
    //         window.location.href='index';
    //         </script>";
    //         //header("location:paket-wisata");
    //         //echo $queryInsert;
    //     }
    //     else if (!move_uploaded_file($lokasi_file, "$folder")) {
    //         echo "error";
    //     }
    // }
    // else if ($nama_file == '') {
        
    //     //header("location:paket-wisata");
    //     //echo $queryInsert;
    // }
    // else{
    //     echo "error";
    // }
    
?>