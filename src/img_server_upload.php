<?php
session_start();
require_once 'db_param.php';
$id = $_SESSION['id'];
$db_img = new PDO ($dsn, $user_db, $pass_db);
$db_img -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// header("Location: img_user_upload.php");

// Le code suivant doit:
//
// --- Uploader le fichier (dans un dossier "uploads" sur le serveur), le renommer, et le lier à la db :
// L'HTML de img_upload.php filtre déjà l'extension du fichier: seuls les .png .jpg .jpeg sont acceptés.
// Il faut ici mettre une limite de taille au fichier.
// Le fichier sera automatiquement uploadé dans un dossier temp.
// On peut stocker le path temporaire du fichier dans une variable.
// Il faut renommer le fichier de manière unique (utiliser le trick de la timestamp).
// Ensuite, déplacer le fichier dans le dossier "uploads".
//
// --- Updater la table user avec les informations de l'image (quelle information?)
// On pourra donc utiliser la table user pour facilement aller chercher la bonne image dans le dossier,
// et en faire ce qu'on veut sur toutes les pages qui ont Session.
//
// --- Rediriger le visiteur vers soit :
// La home page avec un message ("image chargée avec succès")
// La page img_user_upload.php avec un message ("erreur lors du chargement de la page")

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
            $imageDestination = 'uploads/' . $imageNameNew;
            move_uploaded_file($imageTmpName, $imageDestination);
            $sql = "UPDATE user SET picture = $imageDestination WHERE id = $id";
            $db_img -> exec($sql);
            header("Location: img_user_upload.php");
        } else {
            echo "Votre fichier est trop gros :-(";
        }
    } else {
        echo "Une erreur s'est produite lors du chargement de votre image :-(";
    }
}


?>
