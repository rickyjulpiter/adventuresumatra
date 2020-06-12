<?php
    include '../../koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);

    $queryInsert = "INSERT INTO admin (username,password) VALUES ('$nama','$password')";
    mysqli_query($koneksi,$queryInsert);
    //echo($queryInsert);
    echo "<script>
	alert('Berhasil ditambahkan');
	window.location.href='index';
	</script>";
    //header("location:admin");
    
?>