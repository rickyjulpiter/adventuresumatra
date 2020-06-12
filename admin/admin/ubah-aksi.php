<?php
    include '../../koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $password_lama = md5($_POST['password_lama']);
    $password = md5($_POST['password']);

    $queryCariPassword = "SELECT * FROM admin WHERE id = '$id'";
    $queryPassword = mysqli_query($koneksi,$queryCariPassword);
    //echo($queryCariJenis);
    $d = mysqli_fetch_assoc($queryPassword);
    $passwordHash = $d['password'];

    if ($password_lama == $passwordHash) {
        $queryUpdate = "UPDATE admin SET
                        username = '$nama',
                        password = '$password'
                        WHERE id = '$id'
                        ";
        mysqli_query($koneksi,$queryUpdate);
        echo "<script>
        alert('Berhasil diupdate');
        window.location.href='index';
        </script>";
        //header("location:index");
    }
    else {
        //echo("salah");
        header("location:index");
    }
    
?>