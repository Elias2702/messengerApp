<?php
    session_start();
    require_once 'db_param.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style_register.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
        <title>Formulaire d'inscription</title>
    </head>
    <body class="text-center">
        <div class="container">
            <div class="row">
                <div id="alreadymember">
                    <p>Déjà membre ?
                    <button class="btn btn-warning" onclick="location.href='index.php';" id="alreadymemberBt">Cliquez-ici</button>
                    </p>
                </div>
            </div>
            <div class="row">
            <form action="isnew.php" method="POST" class="form-signin">
                <h1>Formulaire d'inscription</h1>
                <h2>Etape 1 / 3</h2>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de famille" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group" id="pseudo_input">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="Pseudo_at">@</span>
                            </div>
                            <input type="text" class="form-control" name="pseudo"
                            <?php
                            if (isset($_SESSION['pseudoerror'])) {
                                echo "id=\"pseudo_error\" placeholder=\"Existe déjà\"";
                            } else {
                                echo "id=\"pseudo\" placeholder=\"Pseudo\"";
                            }
                            ?>
                            aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select class="custom-select" name="sexe" id="sexe">
                        <option value="homme">Je suis un homme</option>
                        <option value="femme">Je suis une femme</option>
                        <option value="saispas">Aucun des deux / Je ne me prononce pas</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Votre adresse email" required>
                    <small class="form-text text-muted"
                    <?php
                    if (isset($_SESSION['emailerror'])) {
                        echo "id=\"email_bottomtext_error\"><p>Cette adresse existe déjà !</p></small>";
                    } else {
                        echo "id=\"email_bottomtext\">Votre adresse ne peut être liée à plusieurs comptes</small>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Choisissez un mot-de-passe" required>
                </div>
                <div class="form-group">
                    <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Répétez votre mot-de-passe" required>
                    <input type="checkbox" class="custom-control-input" name="condgen" id="cg" onclick="test()"/>
                </div>
                <div class="form-group" id="customcheckbox">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="customCheck1" required>
                      <label class="custom-control-label" for="customCheck1" id="customchecktext">
                        Je m'engage à ne pas faire de blagues pourries sur le chat
                      </label>
                    </div>
                </div>
                <button class="btn btn-primary" id="submit" type="submit">Valider</button>
            </form>
            </div>
        </div>
    </body>
</html>

<!-- OLD FORM -->

<!--
<div class="row">
    <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
    <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom"
                <?php
                if(isset($_SESSION['prenom'])) {
                    echo htmlspecialchars("value='" . $_SESSION['prenom'] . "'");
                }
                ?> />
</div>
<div class="row">
    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
    <input type="text" name="nom" id="nom" placeholder="Entrez votre nom"
                <?php
                if(isset($_SESSION['nom'])) {
                    echo htmlspecialchars("value='" . $_SESSION['nom'] . "'");
                }
                ?> />
</div>
<div class="row">
    <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
        <select name="sexe" id="sexe"
            <?php
            if(isset($_SESSION['sexe'])) {
                echo htmlspecialchars("value='" . $_SESSION['sexe'] . "'");
            }
            ?>>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="saispas">Aucun des deux / Je ne me prononce pas</option>
        </select>
</div>
<div class="row">
    <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" placeholder="Choisissez un pseudo"
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
</div>
<div class="row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <input type="email" name="email" id="email" placeholder="Entrez votre email"
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
</div>
<div class="row">
    <label for="pass" class="col-sm-2 col-form-label">Mot de passe</label>
</div>
<div class="row">
    <input type="password" name="pass" id="pass" placeholder="Choisissez un mot de passe"
            <?php
            if(isset($_SESSION['pass'])) {
                echo htmlspecialchars("value='" . $_SESSION['pass'] . "'");
            }
            ?> />
</div>
<div class="row">
    <label for="pass2" class="col-sm-2 col-form-label">Confirmer le mot de passe</label>
</div>
<div class="row">
    <input type="password" name="pass2" id="pass2" placeholder="Répétez le mot de passe"/>
    <input type="checkbox" class="custom-control-input" name="condgen" id="cg" onclick="test()"/>
</div>
<div class="row">
    <label class="custom-control-label" for="cg">Je m'engage à ne pas faire de blagues pourries sur le chat.</label>
</div>
<div class="row">
    <button type="submit" id="submit" class="btn btn-primary" disabled>Valider</button>

    <script>
        var prenom = document.getElementById("prenom");
        var nom = document.getElementById("nom");
        var sexe = document.getElementById("sexe");
        var pseudo = document.getElementById("pseudo");
        var email = document.getElementById("email");
        var pass = document.getElementById("pass");
        var pass2 = document.getElementById("pass2");
        var checkBox = document.getElementById("cg");
        var submit = document.getElementById("submit");

        prenom.addEventListener("keyup", function() {
            test();
        })
        nom.addEventListener("keyup", function() {
            test();
        })
        sexe.addEventListener("click", function() {
            test();
        })
        pseudo.addEventListener("keyup", function() {
            test();
        })
        email.addEventListener("keyup", function() {
            test();
        })
        pass.addEventListener("keyup", function() {
            test();
        })
        pass2.addEventListener("keyup", function() {
            test();
        })

        function test() {

            var passOk = ((pass.value === pass2.value) && (pass.value !== ""));
            var filled = (prenom.value !=="" && nom.value !=="" && sexe.value !=="" && pseudo.value !=="" && email.value !=="")

            if(checkBox.checked && passOk && filled){
                submit.disabled = false;

            } else {
                submit.disabled = true;
            }
        }
    </script> -->
