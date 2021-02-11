<?php

if(!$_GET['id'])
{
    header('Location:index.php');
}

require_once(__DIR__.'/config/database.php');
require_once (__DIR__.'/includes/header.php');

$stm = $pdo->prepare("SELECT * FROM item WHERE id=:id");
$stm->execute(['id' => $_GET['id']]);
$item = $stm->fetch();
?>

<div class="container" style="margin-top:75px;">
    <div class="row">
        <div class="col-6">
            <img src="uploads/<?=$item['file']?>" class="img-fluid">
        </div>
        <div class="col-6">
            <h2><?=$item['title']?></h2>
            <p><?=$item['prix']?></p>
            <p><?=$item['description']?></p>
            <a href="#"><button class="btn btn-primary">Add To Cart</button></a>
        </div>
    </div>
</div>

<?php

require_once(__DIR__.'/includes/footer.php');

?>
