<?php
// This page checks if the password matches the login and sends the user either to the member area
// or back to the login page.


session_start();

// Calls connection params
require_once 'db_param.php';

// Retrieves CONST
$email = $_POST['email'];
$_SESSION['email'] = $email;

// Hashes password
$pass = $_POST['pass'];



$mailexists = false;

try {
    // Set connection to the database
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Extracts id, email & pass
    $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM user" ;
    $result = $db_user->query($q_user)->fetchAll();

    foreach ($result as $row) {
        if ($row['email'] == $email) {
            $mailexists = true;
            $pass_check = password_verify($pass, $row['pass']);
            $_SESSION['id'] = $row['id'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['sexe'] = $row['sexe'];
            $_SESSION['pseudo'] = $row['pseudo'];
            $_SESSION['pass'] = $hash_pass;
        }
    }

    if(!$mailexists) {
        header('Refresh: 2; index.php');
    } elseif($pass_check) {
        header("Refresh: 2; url=includer.php");
    } else {
        header("Refresh: 2; url=index.php");
    }


} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}

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
        <link rel="stylesheet" type="text/css" href="css/style_login.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="container" id="checkmark_container">
              <?php
              if (!$mailexists) {
                  echo "<img src='css/errormark.jpg' alt='Email Error' id='checkmark'>";
                  echo "<p class=\"error_message\">Mauvais email<p>";
              } elseif ($pass_check) {
                  echo "<img src='css/checkmark.png' alt='Correct' id='checkmark'>";
                  echo "<p class=\"success_message\">Connexion réussie<p>";
              } else {
                  echo "<img src='css/errormark.jpg' alt='Password Error' id='checkmark'>";
                  echo "<p class=\"error_message\">Mauvais mot de passe</p>";
              }
              ?>
        </div>
    </body>
</html>
