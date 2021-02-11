<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}
require_once(__DIR__.'/../../config/database.php');
require_once(__DIR__.'/../../includes/header.php');

// query prend en paramètre la requête SQL à executée
$stm = $pdo->query('SELECT * FROM category');

// fetchall affiche tous les resultats.
// PDO::FETCH_ASSOC retourne les résultats sous forme de tableau.

$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-12 col-md-9">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $ligne) { ?>
            <tr>
                <th scope="row"><?=$ligne['id']?></th>
                <td><?=$ligne['name']?></td>
                <td><a href="/projetsite/src/category/delete.php?id=<?=$ligne['id']?>" class="btn btn-primary">supprimer</a>
                <a href="/projetsite/src/category/modify.php?id=<?=$ligne['id']?>" class="btn btn-primary">Modifier</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="new.php"><button class="btn btn-primary">new</button></a>
</div>
