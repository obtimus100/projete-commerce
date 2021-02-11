<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}

require_once(__DIR__.'/../../config/database.php');
require_once(__DIR__.'/../../includes/header.php');

if($_POST){
    $filename = '';

    if(!empty($_FILES['file'])){
        $targetDirectory = "../../uploads/";
        $file = $_FILES['file']['name'];

        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];

        $tmpName = $_FILES['file']['tmp_name'];
        $path_filename_ext = $targetDirectory . $filename. '.'.$ext;
        if(move_uploaded_file($tmpName, $path_filename_ext)) {
            $filename = $filename.'.'.$ext;
        }
    }

    $sql = "INSERT INTO item(title, description, file, category_id, prix) VALUES(?,?,?,?,?)";
    $pdo->prepare($sql)->execute([$_POST['title'], $_POST['description'], $filename, $_POST['category'],$_POST['price']]);
    echo'<div class="alert alert-success" role="alert">Le produit a bien été ajoutée</div>';

}

$stm = $pdo->query("SELECT * FROM category");
$categories = $stm->fetchAll();
?>

<main role="main" style="margin-top:55px;">
    <form method="post" enctype="multipart/form-data" action="#">
        <div class="form-group">
            <label for="title">Nom</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="name">Categorie</label>
            <select class="form-control" id="category" name="category">
                <?php foreach($categories as $c){ ?>
                    <option value="<?=$c['id']?>"><?=$c['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control-file" name="file" id="file">
        </div>
        <div class="from-group">
            <label for="price">prix</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    <a href="index.php">Accueil</a>
</main>

