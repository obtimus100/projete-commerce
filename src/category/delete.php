<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}

require_once(__DIR__.'/../../config/database.php');

if($_GET)
{
    $sql = 'DELETE FROM category WHERE id= ?';
    $pdo->prepare($sql)->execute([$_GET['id']]);
    header('Location:index.php');
}else{
    header('Location:index.php');
}
