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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style_register.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="container">
    <!-- Formulaire utilisateur pour uploader une image -->
    <!-- Envoie vers img_server_upload.php pour l'upload du fichier et la mise à jour de la db -->
            <div class="row">
                <form action='img_server_upload.php' method='POST' class="form-signin" enctype="multipart/form-data" id="image_upload_frame">
                  <h1>Image perso</h1>
                  <h2>Etape 2 / 3</h2>
                <div class="form-row">
                    <div id="file_form_container">
                        <div class="custom-file">
                            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" >
                            <input type='file' class="custom-file-input" id="customFile" name='image' accept="image/png, image/jpg, image/jpeg">
                            <label class="custom-file-label" for="customFile">Choisissez votre image</label>
                            <button class="btn btn-primary" id="submit_img" type='submit' name='submit'>Envoyer</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="row">
                <div class="row" id="msg_request_to_user_container">
                    <div id="msg_request_to_user">
                        <p><strong><?php echo $pn; ?>, le chat serait plus sympa avec une petite photo de vous !</strong> <br>
                        Vous pouvez laisser l'image par défaut pour l'instant et passer à l'étape suivante. Vous pourrez changer votre image à n'importe quel moment dans le menu paramètres de votre compte.<br>
                        Le fichier ne peut pas dépasser 5 MB.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" id="img_container">
                <div class="row">
                    <div id="img_preview_txt"><p>Votre photo actuelle</p></div>
                </div>
                <div class="row">
                    <img src="<?php echo $img_path . '?=' . Date('U'); ?>" id="img_preview">
                </div>
                <div class="row">
                    <button class="btn btn-primary" onclick="location.href='bio_user_upload.php';" id="next_page_btn">Etape suivante</button>
                </div>
            </div>
        </div>
    </body>
</html>
