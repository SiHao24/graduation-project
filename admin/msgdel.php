<?php
header('Content-type:text/html;charset=utf-8');
$name=$_GET['name'];
require ('connect.php');

$sql="DELETE FROM `msg` WHERE u_name='{$name}'";



if ($pdo->exec($sql)) {
    $url='index.php';
    header('Location:'.$url);
}
?>