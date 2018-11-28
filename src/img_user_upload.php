<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User image upload</title>
    </head>
    <body>
        <br>
<!-- Formulaire utilisateur pour uploader une image -->
<!-- Envoie vers img_test.php pour l'upload du fichier et la mise à jour de la db -->
            <form action='img_user_upload.php' method='POST' enctype="multipart/form-data">
                <input type='file' name='image' accept="image/png, image/jpg, image/jpeg">
                <button type='submit' name='submit'>Envoyer</button>
            </form>
    </body>
</html>
