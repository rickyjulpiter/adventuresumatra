<?php
	session_start();
	
	include 'config.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql ="SELECT * FROM admin WHERE username=:username AND password=:password";
	$query = $dbh -> prepare($sql);
	$query->bindParam(':username',$username, PDO::PARAM_STR);
	$query->bindParam(':password',$password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header("location:../tentang");
	}
	else{
		header("location:index");
	}
?>