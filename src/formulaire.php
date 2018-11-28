<?php

session_start();

require_once 'db_param.php';

/*
try {
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_user="SELECT prenom, nom, pseudo, email FROM messenger.user" ;    
    $result = $db_user->query($q_user)->fetchAll();
    
    foreach ($result as $row) {
        echo $row['prenom'];
        echo $row['nom'];
        echo $row['pseudo'];
        echo $row['email']; 

    }

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Formulaire d'inscription</title>
    </head>
    <body>
        <div class="container grey">
            <h2>Registry form :</h2>
            <div>
                <p>Already a member ? &emsp;
                <button onclick="location.href='index.php'">Login</button>
                </p>
                
                <br>
            </div>
            <form action="isnew.php" method="POST">
                <div class="form-group row">  
                    <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" <?php
                            if(isset($_SESSION['prenom'])) {
                                echo "value='" . $_SESSION['prenom'] . "'";
                            }
                        ?>/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" <?php
                            if(isset($_SESSION['nom'])) {
                                echo "value='" . $_SESSION['nom'] . "'";
                            }
                        ?>/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="sexe" class="col-sm-2 col-form-label">Sexe :</label>
                    <div class="col-sm-10">
                        <select name="sexe" id="sexe" <?php
                            if(isset($_SESSION['sexe'])) {
                                echo "value='" . $_SESSION['sexe'] . "'";
                            }
                            ?>>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="saispas">Je ne sais pas</option>                
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="pseudo" class="col-sm-2 col-form-label">Pseudo :</label>
                    <div class="col-sm-10">
                        <input type="text" name="pseudo" id="pseudo" placeholder="Choisissez un pseudo" <?php
                            if(isset($_SESSION['pseudo'])) {
                                echo "value='" . $_SESSION['pseudo'] . "'";
                            }
                        ?>/> 
                    <?php 
                        if(isset($_SESSION['pseudoerror'])) {
                            echo '<p class="errmsg">' . $_SESSION['pseudoerror'] . '</p>';
                            unset($_SESSION ['pseudoerror']);
                        }
                    ?>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" placeholder="Entrez votre email" <?php
                            if(isset($_SESSION['email'])) {
                                echo "value='" . $_SESSION['email'] . "'";
                            }
                        ?>/>
                    <?php 
                        if(isset($_SESSION['emailerror'])) {
                            echo '<p class="errmsg">' . $_SESSION['emailerror'] . '</p>';
                            unset($_SESSION ['emailerror']); 
                        }
                    ?>
                    </div>                   
                </div>
                <br>
                <div class="form-group row">
                    <label for="pass" class="col-sm-2 col-form-label">Mot de passe :</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass" id="pass" placeholder="Choisissez un mot de passe" <?php
                            if(isset($_SESSION['pass'])) {
                                echo "value='" . $_SESSION['pass'] . "'";
                            }
                        ?>/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="pass2" class="col-sm-2 col-form-label">Confirmer le mot de passe :</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass2" id="pass2" placeholder="Répétez le mot de passe"/>
                    </div>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="condgen" id="cg" onclick="test()"/>
                    
                        <label class="custom-control-label" for="cg">J'accepte les conditions générales </label><br>
                    
                </div>
                <br>
                <button type="submit" id="submit" class="btn btn-primary" disabled>Valider</button>
                <br>

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
                </script>

            </form>
            </div>

    </body>
</html>