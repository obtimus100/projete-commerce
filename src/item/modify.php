<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:../user/login.php");
}
require_once (__DIR__ . '/../../config/database.php');
require_once (__DIR__ . '/../../includes/header.php');

if(!$_GET['id'])
{
    header('Location:index.php');
}

$stm = $pdo->prepare('SELECT * FROM item WHERE id=:id');
$stm->execute(['id' => $_GET['id']]);
$item = $stm->fetch();

?>

<main role="main" style="margin-top:55px;">
    <?php

    if($_POST) {

        if (!empty($_FILES['file'])) {
            $targetDirectory = "../../uploads/";
            $file = $_FILES['file']['name'];

            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            unlink('../../uploads/' . $item['file']);
            $tmpName = $_FILES['file']['tmp_name'];
            $path_filename_ext = $targetDirectory . $filename . '.' . $ext;
            if (move_uploaded_file($tmpName, $path_filename_ext)) {
                $filename = $filename . '.' . $ext;
            } elseif ($_FILES['file']['name'] != $item['file']) {
                $FILES['file']['name'] = $item['file'];
            }
            $sql = "UPDATE item set title = ?, description = ?,file = ?, category_id = ?, prix = ? WHERE id= ? ";
            $pdo->prepare($sql)->execute([$_POST['title'], $_POST['description'], $_FILES['file']['name'], $_POST['category'], $_POST['price'], $_GET['id']]);
            echo '<div class="alert alert-success" role="alert">La catégorie a bien été modifiée</div>';
        }
    }
    $stm1 = $pdo->query("SELECT * FROM category");
    $categories = $stm1->fetchAll();

    ?>

    <form method="post" enctype="multipart/form-data" action="#">
        <div class="form-group">
            <label for="title"> Nom</label>
            <input type="text" class="form-control" name="title" value="<?=$item['title']?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description"><?=$item['description']?></textarea>
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <select  class="form-control" id="category" name="category">
                <?php foreach($categories as $c){ ?>
                    <option value="<?=$c['id']?>"<?php if($item['category_id'] == $c['id']){ echo'selected';} ?>><?=$c['name'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form_control-file" name="file" id="file">
        </div>
        <div class="form-group">
            <label for="price">prix</label>
            <input type="text" class="form-control" name="price" id="price" value="<?=$item['prix']?>">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</main>