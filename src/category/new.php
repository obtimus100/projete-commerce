<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}
require_once(__DIR__.'/../../config/database.php');
require_once(__DIR__.'/../../includes/header.php');
?>


<main style="margin-top:55px;">
    <?php
        if($_POST){

            $sql = "INSERT INTO category (name) VALUES(?)";
            $pdo->prepare($sql)->execute([$_POST['title']]);
            echo'<div class="alert alert-success" role="alert">La catégorie a bien été ajoutée</div>';
        }
    ?>
    <form method="post" enctype="multipart/form-data" action="#">
        <div class="form-group">
            <label for="title">nom de la catégorie</label>
            <input type="text" class="form-control w-25" name="title" id="title">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <a href="index.php">Accueil Admin</a>
</main>

