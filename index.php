<?php
require_once(__DIR__.'/config/database.php');
require_once(__DIR__.'/includes/header.php');
// query interroge ma base de données données via la requete
$stm = $pdo->query('SELECT * FROM item');
$items = $stm->fetchAll();
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/slider/slide1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider/slide2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <img src="assets/images/3blocks/bner1.jpg" class="img-fluid">
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4" id="customblock">
            <h2 class="d-flex justify-content-center">Hottest Collections</h2>
            <p class="text-center">Claritas processus dynamicus sequitur mutationem consuetudium lectorumseacula quarta decima futurum.</p>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <img src="assets/images/3blocks/bner2.jpg" class="img-fluid">
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="d-flex justify-content-center">Popular In Store</h2>
            <p class="text-center">Claritas processus dynamicus sequitur mutationem consuetudium lectorumseacula quarta decima futurum.</p>
        </div>
    </div>
</div>

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

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="d-flex justify-content-center">Blog</h2>
            <p class="text-center">Nos Articles du Moment</p>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="card col-12 col-sm-6 col-md-4 col-lg-4 border-0">
            <img src="assets/images/blog/Lunettes-verres-transparents-noir-dégradé.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Ou acheter des lunettes sans correction?</h5>
                <p class="card-text">L’utilisation d’origine des binocles est pour corriger la vue, puis est venue la nécessité de se protéger du soleil. Maintenant, c’est au tour des lunettes sans correction de conquérir la mode moderne.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
        <div class="card col-12 col-sm-6 col-md-4 col-lg-4 border-0">
            <img src="assets/images/blog/lunettes2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Quelles tendances dans le monde des lunettes ?</h5>
                <p class="card-text">Les lunettes sont des éléments indispensables pour ceux qui ont des problèmes de vue mais aussi des véritables accessoires de mode qui viennent compléter le look.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
        <div class="card col-12 col-sm-6 col-md-4 col-lg-4 border-0">
            <img src="assets/images/blog/lunettes3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Lunettes RUN DMC & mode HIP HOP</h5>
                <p class="card-text">Depuis maintenant plusieurs années vous l’aurez compris le retour à la mode vintage est LA Tendance. Que ce soit dans la mode, la déco ou même dans les style musicaux, pour cartonner il faut un rappel de vintage.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>

</div>

<?php
require_once(__DIR__.'/includes/footer.php');
?>

