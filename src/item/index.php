<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}

require_once(__DIR__.'/../../config/database.php');
require_once(__DIR__.'/../../includes/header.php');

$stm = $pdo->query("SELECT * FROM item");
$rows = $stm->fetchAll();
?>

<table class="table" style="margin-top:55px;">
  <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Actions</th>
        </tr>
  </thead>
    <tbody>
    <?php foreach($rows as $ligne) { ?>
        <tr>
            <th scope="row"><?=$ligne['id']?></th>
            <td><?=$ligne['title']?></td>
            <td><img src=<?php echo"../../uploads/".$ligne['file']; ?> width="50" height="50"></td>
            <td><?=$ligne['description']?></td>
            <td><?=$ligne['prix']?></td>
            <td><a href="/projetecommerce/src/item/delete.php?id=<?=$ligne['id']?>" class="btn btn-primary" >supprimer</a></td>
            <td><a href="/projetecommerce/src/item/modify.php?id=<?=$ligne['id']?>" class="btn btn-primary">modifier</a> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<p>
    <a href="/projetecommerce/src/item/new.php" class="btn btn-primary">New Item</a>
</p>

