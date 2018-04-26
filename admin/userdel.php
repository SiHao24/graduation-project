<?php
    header('Content-type:text/html;charset=utf-8');
    $id=$_GET['id'];
    require ('connect.php');

    $sql="DELETE FROM `user` WHERE b_id={$id}";
    echo $sql;

    if ($pdo->exec($sql)) {
        $url='index.php';
        header('Location:'.$url);
    }else{
        echo 'error';
    }
?>