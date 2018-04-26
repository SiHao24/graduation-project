<?php
	session_start();
	$oldname=$_SESSION["name"];
	header('content-type:text/html;charset=utf-8');
	require('connect.php');
	$pwd=$_POST["pwd"];
	$pwd=md5($pwd);
	$email=$_POST["email"];
	$sex=$_POST["sex"];
	$sql = "UPDATE user SET pwd='$pwd',email='$email',sex=$sex WHERE u_name='$oldname'";
	$result = $pdo -> exec($sql);
	echo $result;
	if($pdo->exec($sql)){
		session_destroy();
		header('Location:index.php')
	}else{
		echo 0;
	}

?>