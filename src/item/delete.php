<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location:../user/login.php");
}

require_once(__DIR__.'/../../config/database.php');

if($_GET){

    $stm = $pdo->prepare('SELECT file FROM item WHERE id=:id');
    $stm->execute(['id' => $_GET['id']]);
    $item = $stm->fetch();
    $item_file = $item['file'];
    unlink("../../uploads/$item_file");

    $sql = "DELETE FROM item WHERE id= ?";
    $pdo->prepare($sql)->execute([$_GET['id']]);

    header('Location:index.php');
}else{
    header('Location:index.php');
}

?>

