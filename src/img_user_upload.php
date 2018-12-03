<?php
    session_start();
    // This is the page where the user can see and upload their picture using a form
    // Starts with php, close php, then HTML
    // The HTML form points to img_server_upload.php
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
    $sql = "SELECT picture FROM user WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$id]);
    $img_result_array = $statement -> fetchAll(PDO::FETCH_ASSOC);
    $img_result_object = $img_result_array[0];
    $img_result = $img_result_object["picture"];
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
        <p><?php echo $pn; ?>, le chat serait plus sympa avec une petite photo de vous ! <br>
        Vous pouvez laisser l'image par défaut maintenant et passer à l'étape suivante. Vous pouvez changer votre image à n'importe quel moment dans le menu paramètres de votre compte.<br>
        Le fichier ne peut pas dépasser 5 MB.</p>
<!-- Formulaire utilisateur pour uploader une image -->
<!-- Envoie vers img_server_upload.php pour l'upload du fichier et la mise à jour de la db -->
        <form action='img_server_upload.php' method='POST' enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" >
            <input type='file' name='image' accept="image/png, image/jpg, image/jpeg">
            <button type='submit' name='submit'>Envoyer</button>
            <!-- <input type='button' value='Etape suivante' formaction='/bio_user_upload.php'> -->
        </form>
        <br>
        <form action='bio_user_upload.php'>
            <input type='submit' value='Etape suivante' />
        </form>
        <p>Votre photo actuelle :</p>
        <img src="<?php echo $img_path . '?=' . Date('U'); ?>">
    </body>
</html>
