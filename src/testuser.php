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
        echo 'not a valid email';
    } elseif($pass_check) {
        header("Refresh: 2; url=user_home.php");
        echo 'Hello ' . $_SESSION['pseudo'];
    } else {
        header("Refresh: 2; url=index.php");
        echo 'wrong password';
    }
    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}



?>

