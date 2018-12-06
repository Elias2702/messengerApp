<?php
session_start();
// This page connects the forms in user_settings.php to the DB.
// Still to do: (1) Checking against pseudo and email already existing in DB (2) Hashing password
require_once 'db_param.php';
$id = $_SESSION['id'];
$db_img = new PDO ($dsn, $user_db, $pass_db);
$db_img -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SURNAME UPLOAD
if(isset($_POST['submit_surname'])) {
    $pn = $_POST['prenom'];
    $_SESSION['prenom'] = $pn;

    $sql = "UPDATE user SET prenom = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$pn, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

// NAME UPLOAD
if(isset($_POST['submit_name'])) {
    $name = $_POST['nom'];
    $_SESSION['nom'] = $name;

    $sql = "UPDATE user SET nom = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$name, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

// GENDER UPLOAD
if(isset($_POST['submit_sex'])) {
    $gender = $_POST['sexe'];
    $_SESSION['sexe'] = $gender;

    $sql = "UPDATE user SET sexe = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$gender, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

// PSEUDO UPLOAD
if(isset($_POST['submit_pseudo'])) {
    $pseudo = $_POST['pseudo'];
    $_SESSION['pseudo'] = $pseudo;

    $sql = "UPDATE user SET pseudo = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$pseudo, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

// EMAIL UPLOAD
if(isset($_POST['submit_email'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $sql = "UPDATE user SET email = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$email, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

// PASSWORD UPLOAD
if(isset($_POST['submit_pass'])) {
    $pass = $_POST['pass2'];
    $_SESSION['pass'] = $pass;

    $sql = "UPDATE user SET pass = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$pass, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

// PICTURE UPLOAD
if(isset($_POST['submit_img'])) {
    $image        = $_FILES['image'];

    $imageName    = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize    = $_FILES['image']['size'];
    $imageError   = $_FILES['image']['error'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    if ($imageError === 0) {
        if ($imageSize <= 5242880) {
            $imageNameNew = 'user_id_' . $id . '.' . $imageActualExt;
            $imageDestination = 'uploads/' . $imageNameNew;
            move_uploaded_file($imageTmpName, $imageDestination);
            $sql = "UPDATE user SET picture = ? WHERE id = ?";
            $statement = $db_img -> prepare($sql);
            $statement -> execute([$imageDestination, $id]);
            header("Location: user_settings.php");
            die('Une erreur s\'est produite');
        } else {
            echo "Votre fichier est trop gros :-(";
        }
    } else {
        echo "Une erreur s'est produite lors du chargement de votre image :-(";
    }
}

// BIOGRAPHY UPLOAD
if(isset($_POST['submit_bio'])) {
    $bio = $_POST['bio'];
    $_SESSION['bio'] = $bio;

    $sql = "UPDATE user SET bio = ? WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$bio, $id]);
    header("Location: user_settings.php");
    die('Une erreur s\'est produite');
}

?>
