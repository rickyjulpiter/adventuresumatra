<?php
    include '../../koneksi.php';

    $data_des = $_POST['data_des'];
    $lokasi_file= $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);

    $folder = "../../images/".$nama."$nama_file";
    $save = 'images/'.$nama.'-'.$nama_file;

    if ($nama_file != '') {
        $queryUpdate = "UPDATE galeri SET
                        nama = '$nama',
                        deskripsi = '$deskripsi',
                        gambar = '$save'
                        WHERE id = '$id'
                        ";
        if (move_uploaded_file($lokasi_file, "$folder")) {
            mysqli_query($koneksi,$queryUpdate);

            $queryDelete = "DELETE FROM galeri_detail WHERE galeri_id = '$id'";
            mysqli_query($koneksi,$queryDelete);

            for($i=0; $i<sizeof($data_des); $i++){
                $queryInsert = "INSERT INTO galeri_detail (galeri_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
                mysqli_query($koneksi,$queryInsert);
            }

            echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
        }
        else if (!move_uploaded_file($lokasi_file, "$folder")) {
            echo "error";
        }
    }
    else if ($nama_file == '') {
        $queryUpdate = "UPDATE galeri SET
                        nama = '$nama',
                        deskripsi = '$deskripsi'
                        WHERE id = '$id'
                        ";
        mysqli_query($koneksi,$queryUpdate);

        $queryDelete = "DELETE FROM galeri_detail WHERE galeri_id = '$id'";
        mysqli_query($koneksi,$queryDelete);

        for($i=0; $i<sizeof($data_des); $i++){
            $queryInsert = "INSERT INTO galeri_detail (galeri_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
            mysqli_query($koneksi,$queryInsert);
        }
        
        echo "<script>
        alert('Berhasil diupdate');
        window.location.href='index';
        </script>";
        //header("location:jenis-paket");
    }
    else{
        echo "error";
    }
    
?>