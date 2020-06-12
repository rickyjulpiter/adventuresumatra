<?php
include '../../koneksi.php';

$lokasi_file = $_FILES['logo']['tmp_name'];
$nama_file = $_FILES['logo']['name'];

$lokasi_file1 = $_FILES['static_image']['tmp_name'];
$nama_file1 = $_FILES['static_image']['name'];

$folder = "../../images/$nama_file";
$folder1 = "../../images/$nama_file1";

$id = $_POST['id'];
$nama = $_POST['nama'];
$slogan = mysqli_escape_string($koneksi, $_POST['slogan']);
$alamat = mysqli_escape_string($koneksi, $_POST['alamat']);
$email = mysqli_escape_string($koneksi, $_POST['email']);
$telepon = mysqli_escape_string($koneksi, $_POST['telepon']);
$whatsapp = mysqli_escape_string($koneksi, $_POST['whatsapp']);
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$youtube = $_POST['youtube'];
$deskripsi = mysqli_escape_string($koneksi, $_POST['deskripsi']);

// jika nama file logo dan static image tidak kosong
if ($nama_file != '' && $nama_file1 != '') {
	$queryUpdate = "UPDATE tentang SET
						nama = '$nama',
						slogan = '$slogan',
						alamat = '$alamat',
						email = '$email',
						telepon = '$telepon',
						whatsapp = '$whatsapp',
						facebook = '$facebook',
						twitter = '$twitter',
						instagram = '$instagram',
						youtube = '$youtube',
						deskripsi = '$deskripsi',
						logo = 'images/$nama_file',
						static_image = 'images/$nama_file1'
						WHERE id = 1
						";
	if (move_uploaded_file($lokasi_file, "$folder") && move_uploaded_file($lokasi_file, "$folder1")) {
		mysqli_query($koneksi, $queryUpdate);
		echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
		//header("location:tentang");
	}
}
// jika nama logo tidak kosong tetapi static image kosong 
else if ($nama_file != '' && $nama_file1 == '') {
	$queryUpdate = "UPDATE tentang SET
						nama = '$nama',
						slogan = '$slogan',
						alamat = '$alamat',
						email = '$email',
						telepon = '$telepon',
						whatsapp = '$whatsapp',
						facebook = '$facebook',
						twitter = '$twitter',
						instagram = '$instagram',
						youtube = '$youtube',
						deskripsi = '$deskripsi',
						logo = 'images/$nama_file'
						WHERE id = 1
						";
	if (move_uploaded_file($lokasi_file, "$folder")) {
		mysqli_query($koneksi, $queryUpdate);
		echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
	}
}
// jika nama logo kosong tetapi static image tidak kosong
else if ($nama_file == '' && $nama_file1 != '') {
	$queryUpdate = "UPDATE tentang SET
						nama = '$nama',
						slogan = '$slogan',
						alamat = '$alamat',
						email = '$email',
						telepon = '$telepon',
						whatsapp = '$whatsapp',
						facebook = '$facebook',
						twitter = '$twitter',
						instagram = '$instagram',
						youtube = '$youtube',
						deskripsi = '$deskripsi',
						static_image = 'images/$nama_file1'
						WHERE id = 1
						";
	if (move_uploaded_file($lokasi_file1, "$folder1")) {
		mysqli_query($koneksi, $queryUpdate);
		echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
	}
} else if ($nama_file == '' && $nama_file1 == '') {
	$queryUpdate = "UPDATE tentang SET
						nama = '$nama',
						slogan = '$slogan',
						alamat = '$alamat',
						email = '$email',
						telepon = '$telepon',
						whatsapp = '$whatsapp',
						facebook = '$facebook',
						twitter = '$twitter',
						instagram = '$instagram',
						youtube = '$youtube',
						deskripsi = '$deskripsi'
						WHERE id = 1
						";
	mysqli_query($koneksi, $queryUpdate);
	echo "<script>
            alert('Berhasil diupdate');
            window.location.href='index';
            </script>";
	//header("location:tentang");
} else {
	echo "error";
}
