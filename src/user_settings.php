<?php
    session_start();
    // This is the page where the user can see and update their user info.
    // The HTML form points to user_settings.php
    require_once 'db_param.php';
    //  Retrieve user ID to make a query later:
    $id = $_SESSION['id'];
    // Using 'prenom' to customize a little text displayed on the page (see HTML):
    $pn = $_SESSION['prenom'];
    // Connecting to database:
    $db_img = new PDO ($dsn, $user_db, $pass_db);
    $db_img -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<i>Current user ID:"." ".$id."</i>";
// FETCHING FROM DATABASE :

    // Surname
    // Fetched from $_Session, in HTML below

    // Family name
    //Fetched from $_Session, in HTML below

    // Gender
    //Fetched from $_Session, in HTML below

    // Email address
    //Fetched from $_Session, in HTML below

    // Password
    //Fetched from $_Session, in HTML below

    // Biography
    $sql = "SELECT bio FROM user WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$id]);
    $bio_result_array = $statement -> fetchAll(PDO::FETCH_ASSOC);
    $bio_result_object = $bio_result_array[0];
    $bio_result = $bio_result_object["bio"];

    // Picture
    $sql = "SELECT picture FROM user WHERE id = ?";
    $statement = $db_img -> prepare($sql);
    $statement -> execute([$id]);
    $img_result_array = $statement -> fetchAll(PDO::FETCH_ASSOC);
    $img_result_object = $img_result_array[0];
    $img_result = $img_result_object["picture"];
    $img_path ;
    if ($img_result != NULL) {
        $img_path = $img_result;
    } else {
        $img_path = "uploads/default.jpg";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User settings</title>
    </head>
    <body>
        <p><?php echo $pn; ?>, vous pouvez ici vérifier vos informations et les mettre à jour si nécessaire.</p>

<!-- MAIN FORM -->
            <div class="form-group row">
                <form action="user_settings_server.php" method="POST">
                    <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" id="prenom" <?php
                            if(isset($_SESSION['prenom'])) {
                                echo htmlspecialchars("value='" . $_SESSION['prenom'] . "'");
                            }
                        ?>/>
                        <button type="submit" id="submit" name="submit_surname" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-group row">
                <form action='user_settings_server.php' method='POST'>
                    <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" id="nom" <?php
                            if(isset($_SESSION['nom'])) {
                                echo htmlspecialchars("value='" . $_SESSION['nom'] . "'");
                            }
                        ?>/>
                        <button type="submit" id="submit" name="submit_name" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-group row">
                <form action='user_settings_server.php' method='POST'>
                    <label for="sexe" class="col-sm-2 col-form-label">Sexe :</label>
                    <div class="col-sm-10">
                        <select name="sexe" id="sexe" <?php
                            if(isset($_SESSION['sexe'])) {
                                echo htmlspecialchars("value='" . $_SESSION['sexe'] . "'");
                            }
                            ?>>
                            <option value="homme" <?php if ($_SESSION['sexe'] == 'homme') { echo "selected=\"selected\"";} ?>/>Homme</option>
                            <option value="femme" <?php if ($_SESSION['sexe'] == 'femme') { echo "selected=\"selected\"";} ?>/>Femme</option>
                            <option value="saispas" <?php if ($_SESSION['sexe'] == 'saispas') { echo "selected=\"selected\"";} ?>/>Aucun des deux / Je ne me prononce pas</option>
                        </select>
                        <button type="submit" id="submit" name="submit_sex" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-group row">
                <form action='user_settings_server.php' method='POST'>
                    <label for="pseudo" class="col-sm-2 col-form-label">Pseudo :</label>
                    <div class="col-sm-10">
                        <input type="text" name="pseudo" id="pseudo"
                            <?php
                            if(isset($_SESSION['pseudo'])) {
                                echo htmlspecialchars("value='" . $_SESSION['pseudo'] . "'");
                            }
                            ?> />
                            <?php
                            if(isset($_SESSION['pseudoerror'])) {
                                echo '<p class="errmsg">' . $_SESSION['pseudoerror'] . '</p>';
                                unset($_SESSION ['pseudoerror']);
                            }
                            ?>
                        <button type="submit" id="submit" name="submit_pseudo" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-group row">
                <form action='user_settings_server.php' method='POST'>
                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email"
                        <?php
                            if(isset($_SESSION['email'])) {
                                echo htmlspecialchars("value='" . $_SESSION['email'] . "'");
                            }
                        ?> />
                        <?php
                            if(isset($_SESSION['emailerror'])) {
                                echo '<p class="errmsg">' . $_SESSION['emailerror'] . '</p>';
                                unset($_SESSION ['emailerror']);
                            }
                        ?>
                    <button type="submit" id="submit" name="submit_email" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="form-group row">
                <form action='user_settings_server.php' method='POST'>
                <label for="pass" class="col-sm-2 col-form-label">Mot de passe :</label>
                <div class="col-sm-10">
                    <input type="password" name="pass" id="pass" placeholder="Choisissez un mot de passe" <?php
                        if(isset($_SESSION['pass'])) {
                            echo htmlspecialchars("value='" . $_SESSION['pass'] . "'");
                        }
                    ?>/>
                </form>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <form action='user_settings_server.php' method='POST'>
                    <label for="pass2" class="col-sm-2 col-form-label">Confirmez le mot de passe :</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass2" id="pass2" placeholder="Attention aux majuscules"/>
                        <button type="submit" id="submit_disable" name="submit_pass" class="btn btn-primary" disabled>Mettre à jour</button>
                    </div>
                </form>
            </div>
            <br>

            <script>
                var pass = document.getElementById("pass");
                var pass2 = document.getElementById("pass2");
                var submit = document.getElementById("submit_disable");

                pass.addEventListener("keyup", function() {
                    test();
                })
                pass2.addEventListener("keyup", function() {
                    test();
                })

                function test() {
                    var passOk = ((pass.value === pass2.value) && (pass.value !== ""));
                    if(passOk){
                        submit.disabled = false;

                    } else {
                        submit.disabled = true;
                    }
                }
            </script>
        </form>

<!-- USER PICTURE FORM -->
        <form action='user_settings_server.php' method='POST' enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" >
            <input type='file' name='image' accept="image/png, image/jpg, image/jpeg">
            <button type='submit' name='submit_img'>Mettre à jour</button>
        </form>
        <p>Votre photo actuelle :</p>
        <img src="<?php echo $img_path . '?=' . Date('U'); ?>">
        <br>

<!-- USER BIO FORM -->
        <form action='user_settings_server.php' method='POST'>
            <label for="bio">Description :</label>
            <input type="textarea" name="bio" placeholder="Entrez ici votre texte de maximum 500 caractères">
            <button type="submit" name="submit_bio">Mettre à jour</button>
        </form>
        <?php
            if ($bio_result != NULL) {
                $bio_result_secure = htmlspecialchars($bio_result);
                echo "<h2>Votre description actuelle :</h2>";
                echo "<p>$bio_result_secure</p>";
            }
        ?>
    </body>
</html>
