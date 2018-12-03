<?php
session_start();
require_once 'db_param.php';
$id = $_SESSION['id'];
$db_img = new PDO ($dsn, $user_db, $pass_db);
$db_img -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['submit'])) {
    $bio = $_POST['bio'];
    if (strlen($bio) > 0) {
        $sql = "UPDATE user SET bio = ? WHERE id = ?";
        $statement = $db_img -> prepare($sql);
        $statement -> execute([$bio, $id]);
    } else {
        $bio = NULL;
        $sql = "UPDATE user SET bio = ? WHERE id = ?";
        $statement = $db_img -> prepare($sql);
        $statement -> execute([$bio, $id]);
    }
    header("Location: bio_user_upload.php");
    die('Une erreur s\'est produite');
} else {
    echo "Une erreur s'est produite";
}
?>
