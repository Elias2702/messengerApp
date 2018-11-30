<?php
// This is the page where the user can see and upload their picture using a form
// Starts with php, close php, then HTML
// The HTML form points to img_server_upload.php
    session_start();
    require_once 'db_param.php';
    //  Retrieve user ID to make a query later:
    $id = $_SESSION['id'];
    // Using 'prenom' to customize a little text displayed on the page (see HTML):
    $pn = $_SESSION['prenom'];
    // Connecting to database:
    $db_img = new PDO ($dsn, $user_db, $pass_db);
    $db_img -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // For the current user, fetching the content of the column 'picture' which is a string of the file path
    // If there is no path, the value is NULL:
    $q_img_user = "SELECT picture FROM user WHERE id = $id";
    $img_result_object = $db_img -> query("$q_img_user")->fetchAll(PDO::FETCH_ASSOC);
    $img_result = $img_result_object -> picture;
    // Storing the path string into $img:
    $img_path ;
    // If the value is NULL, the path is set to the default picture (stored in the uploads folder):
    if ($img_result != NULL) {
        $img_path = $img_result;
    } else {
        $img_path = "uploads/default.jpg";
    }
    // var_dump($img_path);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User image upload</title>
    </head>
    <body>
        <p><?php echo $pn; ?>, le chat serait plus sympa avec une petite photo de vous !</p>
<!-- Formulaire utilisateur pour uploader une image -->
<!-- Envoie vers img_test.php pour l'upload du fichier et la mise à jour de la db -->
        <form action='img_server_upload.php' method='POST' enctype="multipart/form-data">
            <input type='file' name='image' accept="image/png, image/jpg, image/jpeg">
            <button type='submit' name='submit'>Envoyer</button>
            <input type='button' value='Je ferai ça plus tard' formaction='user_home.php'>
        </form>
        <p>Votre photo actuelle  :</p>
        <img src="<?php echo $img_path; ?>">
    </body>
</html>
