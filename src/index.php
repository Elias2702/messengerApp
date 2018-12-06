<?php
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>User LOGIN</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="container">
              <form action='testuser.php' method='POST' class="form-signin">
                  <h1>MESSAGERIE</h1>
                  <h2 id="yesmember">DÉJÀ MEMBRE ?</h1>
                  <label for="inputEmail" class="sr-only">Adresse email</label>
                  <input type="email" name='email' id="inputEmail" class="form-control" placeholder="Entrez votre email"
                      <?php
                      if(isset($_SESSION['email'])) {
                         echo "value='" . $_SESSION['email'] ."'";
                      }
                      ?> />
                  <label for="inputPassword" class="sr-only">Mot de passe</label>
                  <input type="password" name='pass' id="inputPassword" class="form-control" placeholder="Entrez votre mot-de-passe">
                  <button id="forgotten" type="button" class="btn btn-danger" onclick="location.href='retrieve_pass.php'">J'ai oublié mon mot de passe :-(</a>
                  <button id="button1" class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
                  <h2 id="notmember">PAS ENCORE MEMBRE ?</h1>
                  <button id="button2" class="btn btn-lg btn-primary btn-block" formaction="formulaire.php">Inscription</button>
                  <p id="footer">&copy; Becode Lie Hamilton 1.7 2018</p>
              </form>
        </div>
    </body>
</html>
