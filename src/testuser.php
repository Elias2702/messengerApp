<?php
// This page checks if the password matches the login and sends the user either to the member area
// or back to the login page.


session_start(); 

// Calls connection params 
require_once 'db_param.php';

// Retrieves CONST
$pass = $_POST['pass'];
$email = $_POST['email'];
$_SESSION['email'] = $email;

try {
    // Set connection to the database
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Extracts id, email & pass
    $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM user" ;    
    $result = $db_user->query($q_user)->fetchAll();
    
    foreach ($result as $row) {
        if ($row['email'] == $email) {
            $passcheck = $row['pass'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['sexe'] = $row['sexe'];
            $_SESSION['pseudo'] = $row['pseudo'];
            $_SESSION['pass'] = $row['pass'];            
        }
    }

    if($passcheck == null) {
        header('Refresh: 2; index.php');
        echo 'not a valid email';
    } elseif($pass == $passcheck) {
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

