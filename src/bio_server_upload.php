<?php
session_start();
require_once 'db_param.php';
$id = $_SESSION['id'];

if(isset($_POST['submit'])) {
    $image        = $_FILES['image'];

    $imageName    = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize    = $_FILES['image']['size'];
    $imageError   = $_FILES['image']['error'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    if ($imageError === 0) {
        if ($imageSize <= 1000000) {
            $imageNameNew = 'user_id_' . $id . '.' . $imageActualExt;
            $imageDestination = './uploads/' . $imageNameNew;
            move_uploaded_file($imageTmpName, $imageDestination);
        } else {
            echo "Votre fichier est trop gros :-(";
        }
    } else {
        echo "Une erreur s'est produite lors du chargement de votre image :-(";
    }
}


?>
