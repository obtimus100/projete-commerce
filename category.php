<?php

if(!$_GET['id']){

    header('Location:index.php');
}


require_once(__DIR__.'/config/database.php');
require_once(__DIR__.'/includes/header.php');
$stm = $pdo->prepare("SELECT * FROM item WHERE category_id =:id ORDER BY prix DESC");
$stm->execute(['id' => $_GET['id']]);
$items = $stm->fetchAll();

?>
<div class="container">
    <div class="row">
        <?php foreach($items as $item) { ?>
            <div class="card col-4 border-0" style="width: 18rem;">
                <img src="uploads/<?=$item['file']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$item['title']?></h5>
                    <p class="card-text"><?=$item['description']?></p>
                    <p class="card-text">Prix: <?=$item['prix']?> €</p>
                    <a href="product.php?id=<?=$item['id']?>" class="btn btn-primary">Voir le produit</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

