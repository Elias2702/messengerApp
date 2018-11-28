<?php
// This page checks if the supplied credentials are not already used

session_start();

// Require connection params file
require_once 'db_param.php';

// After execution the user is sent to the new_user page  -      
// - ?? bugging when written at the end, I guess it runs all other code before going further ??
// - ?? what happens when error connection the db ??
header("Refresh:2; url=new_user.php");

// Create session variables with infos from POST (formulaire.php)
$_SESSION['prenom'] = $_POST['prenom'] ;
$_SESSION['nom'] = $_POST['nom'] ;
$_SESSION['sexe'] = $_POST['sexe'] ;
$_SESSION['pseudo'] = $_POST['pseudo'] ;
$_SESSION['email'] = $_POST['email'] ;
$_SESSION['pass'] = $_POST['pass'] ;
$eml = $_SESSION['email'];
$psd = $_SESSION['pseudo'];

try {
    // Set connection to the database
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Extracts pseudo and email
    $q_user="SELECT id, pseudo, email FROM user";        
    $result = $db_user->query($q_user)->fetchAll();

    // Loops in the result of the query 
    foreach ($result as $row) {        
        // compare with the new credentials supplied
        if (($row['pseudo'] == $psd) || ($row['email'] == $eml))  {
            // if used already, back to formulaire.php
            // NOTE would be better to have the form still fulfilled ----------------------------------------
            header('Location: formulaire.php');
        // if okay, retrieve value of ID for const $_SESSION 
        } else {
            $_SESSION['id'] = $row['id'];
        }
    }

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}

?>