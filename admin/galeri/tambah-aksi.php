<?php
    include '../../koneksi.php';

    $data_des = $_POST['data_des'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $image = "images/".$nama."-".basename( $_FILES["gambar"]["name"]);

    $lokasi_file= $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];

    $folder = "../../images/".$nama."-".$nama_file;

    if ($nama_file != '') {
        $queryInsert = "INSERT INTO galeri (nama,deskripsi,gambar) VALUES ('$nama','$deskripsi','$image')";
        if (move_uploaded_file($lokasi_file, "$folder")) {
            mysqli_query($koneksi,$queryInsert);

            $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id) FROM galeri");
            $d = mysqli_fetch_assoc($queryCheckMax);
            $id = $d['MAX(id)'];

            for($i=0; $i<sizeof($data_des); $i++){
                $queryInsert = "INSERT INTO galeri_detail (galeri_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
                $d = mysqli_query($koneksi,$queryInsert);
            }
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
        $queryInsert = "INSERT INTO galeri (nama,deskripsi) VALUES ('$nama','$deskripsi')";
        mysqli_query($koneksi,$queryInsert);

        $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id) FROM galeri");
        $d = mysqli_fetch_assoc($queryCheckMax);
        $id = $d['MAX(id)'];

        for($i=0; $i<sizeof($data_des); $i++){
            $queryInsert = "INSERT INTO galeri_detail (galeri_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
            $d = mysqli_query($koneksi,$queryInsert);
        }

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