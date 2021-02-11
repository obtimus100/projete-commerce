<?php
$stm = $pdo->query('SELECT * FROM category');
$categories = $stm->fetchAll();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/projetecommerce/index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php foreach($categories as $c){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="/projetecommerce/category.php?id=<?=$c['id']?>"><?=$c['name'] ?></a>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li class="nav-item">
                    <a href="/projetecommerce/src/user/logout.php" class="btn btn-success" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                    <a href="/projetecommerce//src/category/new.php"  class="nav-link">Nouvelle catégorie</a>
                </li>
                <li class="nav-item">
                    <a href="/projetecommerce//src/item/new.php"  class="nav-link">Nouveau produit</a>
                </li>

            <?php } else {?>
                <li class="nav-item">
                    <a href="/projetecommerce//src/user/new.php" class="nav-link">Créer un compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projetecommerce/src/user/login.php">login</a>
                </li>

            <?php } ?>

        </ul>
    </div>
</nav>

