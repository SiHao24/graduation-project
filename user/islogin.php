<?php
	session_start();
	header('ontent-type:text/html;charset=utf-8');
	require('connect.php');
	$name=$_SESSION["name"];
	if(!isset($name)){
		echo '请确认您是否登录！';
		exit();
	}
?>