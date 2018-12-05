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
    </head>
    <body>
        <p><?php echo htmlspecialchars($pn); ?>, le chat serait plus sympa avec une petite description de vous !</p>
<!-- Formulaire utilisateur pour uploader la bio -->
<!-- Envoie vers bio_server_upload.php pour l'upload du fichier et la mise à jour de la db -->
        <form action='bio_server_upload.php' method='POST'>
            <label for="bio">Description :</label>
            <input type="textarea" name="bio" placeholder="Entrez ici votre texte de maximum X caractères">
            <button type="submit" name="submit">Envoyer</button>
        </form>
        <br>
        <form action='user_home.php'>
            <input type='submit' value="Finaliser l'inscription" />
        </form>
        <?php
        if ($bio_result != NULL) {
            $bio_result_secure = htmlspecialchars($bio_result);
            echo "<h2>Votre description actuelle :</h2>";
            echo "<p>$bio_result</p>";
        }
        ?>
    </body>
</html>
