<?php
// This is the page where the user can see and upload their biography using a form
// Starts with php, close php, then HTML
// The HTML form points to bio_server_upload.php
    session_start();
    require_once 'db_param.php';
    // //  Retrieve user ID to make a query later:
    // $id = $_SESSION['id'];
    // Using 'prenom' to customize a little text displayed on the page (see HTML):
    $pn = $_SESSION['prenom'];
    $id = $_SESSION['id'];
    // // Connecting to database:
    $db_img = new PDO ($dsn, $user_db, $pass_db);
    $db_img -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // If there is no path, the value is NULL:
    $sql = "SELECT bio FROM user WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$id]);
    $bio_result_array = $statement -> fetchAll(PDO::FETCH_ASSOC);
    $bio_result_object = $bio_result_array[0];
    $bio_result = $bio_result_object["bio"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User bio upload</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style_register.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    </head>
    <body>
      <div class="container">
<!-- Formulaire utilisateur pour uploader la bio -->
<!-- Envoie vers bio_server_upload.php pour l'upload du fichier et la mise à jour de la db -->
        <form action='bio_server_upload.php' method='POST' class="form-signin" id="bio_upload_frame">
            <h1>Biographie</h1>
            <h2>Étape 3/3</h2>
            <p><?php echo htmlspecialchars($pn); ?>, le chat serait plus sympa avec une petite description de vous !</p>
            <label for="bio">Description :</label>
            <input type="textarea" name="bio" placeholder="Entrez ici votre texte de maximum X caractères">
            <button type="submit" name="submit">Envoyer</button>
        </form>
        <button class="btn btn-primary" onclick="location.href='includer.php';" id="next_page_btn">Finaliser l'inscription</button>
        <div id="preview_bio">
        <?php
        if ($bio_result != NULL) {
            $bio_result_secure = htmlspecialchars($bio_result);
            echo "<h2>Votre description actuelle :</h2>";
            echo "<p>$bio_result</p>";
        }
        ?>
      </div>
      </div>
    </body>
</html>
