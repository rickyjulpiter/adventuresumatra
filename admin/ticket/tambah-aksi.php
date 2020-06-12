<?php
    include '../../koneksi.php';
    //echo exec('whoami');

    $lokasi_file= $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];

    $folder = "../../images/$nama_file";

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = mysqli_escape_string($koneksi,$_POST['deskripsi']);
    $data_des = $_POST['data_des'];
    // $fasilitas = $_POST['fasilitas'];
    

    //$queryCariJenis = "SELECT * FROM rent WHERE nama_paket = '$jenis'";
    //$queryJenis = mysqli_query($koneksi,$queryCariJenis);
    //echo($queryCariJenis);
    //$d = mysqli_fetch_assoc($queryJenis);
    //$jenisPaket = $d['id_paket'];

    if ($nama_file != '') {
        $queryInsert = "INSERT INTO ticket (
                        nama,
                        deskripsi,
                        fasilitas,
                        gambar
                        ) VALUES
                        ('$nama','$deskripsi','$fasilitas','images/$nama_file')
                        ";
        if (move_uploaded_file($lokasi_file, "$folder")) {
            mysqli_query($koneksi,$queryInsert);

            $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id) FROM ticket");
            $d = mysqli_fetch_assoc($queryCheckMax);
            $id = $d['MAX(id)'];

            for($i=0; $i<sizeof($data_des); $i++){
                $queryInsert = "INSERT INTO ticket_detail (ticket_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
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
        $queryInsert = "INSERT INTO ticket (
                        nama,
                        deskripsi,
                        fasilitas
                        ) VALUES
                        ('$nama','$deskripsi','$fasilitas')
                        ";
        mysqli_query($koneksi,$queryInsert);

        // $queryCheckMax = mysqli_query($koneksi,"SELECT MAX(id) FROM ticket");
        // $d = mysqli_fetch_assoc($queryCheckMax);
        // $id = $d['MAX(id)'];

        // for($i=0; $i<sizeof($data_des); $i++){
        //     $queryInsert = "INSERT INTO ticket_detail (ticket_id,destinasi_area_id) VALUES ('$id','$data_des[$i]')";
        //     mysqli_query($koneksi,$queryInsert);
        // }

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