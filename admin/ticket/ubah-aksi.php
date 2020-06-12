<?php
    include '../../koneksi.php';

    $lokasi_file= $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];

    $folder = "../../images/$nama_file";

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $data_des = $_POST['data_des'];
    // $fasilitas = $_POST['fasilitas'];
    

    if ($nama_file != '') {
        $queryUpdate = "UPDATE ticket SET
                        nama = '$nama',
                        deskripsi = '$deskripsi',
                        fasilitas = '$fasilitas',
                        gambar = 'images/$nama_file'
                        WHERE id = '$id'
                        ";
        if (move_uploaded_file($lokasi_file, "$folder")) {
            mysqli_query($koneksi,$queryUpdate);

            $queryDelete = "DELETE FROM ticket_detail WHERE ticket_id = '$id'";
            mysqli_query($koneksi,$queryDelete);

            for($i=0; $i<sizeof($data_des); $i++){
                $queryInsert = "INSERT INTO ticket_detail (ticket_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
                mysqli_query($koneksi,$queryInsert);
            }

            echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
            //header("location:jenis-paket");
        }
        else if (!move_uploaded_file($lokasi_file, "$folder")) {
            echo "error";
        }
    }
    else if ($nama_file == '') {
        $queryUpdate = "UPDATE ticket SET
                        nama = '$nama',
                        deskripsi = '$deskripsi',
                        fasilitas = '$fasilitas'
                        WHERE id = '$id'
                        ";
        mysqli_query($koneksi,$queryUpdate);

        // $queryDelete = "DELETE FROM ticket_detail WHERE ticket_id = '$id'";
        // mysqli_query($koneksi,$queryDelete);

        // for($i=0; $i<sizeof($data_des); $i++){
        //     $queryInsert = "INSERT INTO ticket_detail (ticket_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
        //     mysqli_query($koneksi,$queryInsert);
        // }

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