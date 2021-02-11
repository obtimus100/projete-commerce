<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}
require_once(__DIR__.'/../../config/database.php');
require_once(__DIR__.'/../../includes/header.php');
?>

<main role="main" style="margin-top:55px;">
    <?php
    if($_POST) {
        $sql = "UPDATE category set name = ? WHERE id = ?";
        $pdo->prepare($sql)->execute([$_POST['title'], $_GET['id']]);
        echo'<div class="alert alert-success" role="alert">La catégorie a bien été modifiée</div>';
    }

    $stm = $pdo->prepare('SELECT name FROM category WHERE id=:id');
    $stm->execute(['id' => $_GET['id']]);
    $categorie = $stm->fetch();

    ?>
    <form method="post" enctype="multipart/form-data" action="#">
        <div class="form-group">
            <label for="title">nom de la catégorie</label>
            <input type="text" class="form-control w-25" name="title" id="title" value="<?= $categorie["name"] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    <a href="index.php"><button class="btn btn-primary">Accueil admin</button></a>
</main>
