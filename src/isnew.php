<?php
// This page checks if the supplied credentials are not already used

session_start();

// Require connection params file
require_once 'db_param.php';

// After execution the user is sent to the new_user page  -      
// - ?? bugging when written at the end, I guess it runs all other code before going further ??
// - ?? what happens when error connection the db ??
header("Refresh:2; url=new_user.php");

//Reinit session const
$_SESSION = array();

// Create session const with infos from POST (formulaire.php)
$_SESSION['prenom'] = $_POST['prenom'] ;
$_SESSION['nom'] = $_POST['nom'] ;
$_SESSION['sexe'] = $_POST['sexe'] ;
$_SESSION['pseudo'] = $_POST['pseudo'] ;
$_SESSION['email'] = $_POST['email'] ;

$eml = $_SESSION['email'];
$psd = $_SESSION['pseudo'];

$_SESSION['pass'] = $_POST['pass'];

try {
    // Set connection to the database
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Extracts pseudo and email
    $q_user="SELECT id, pseudo, email FROM user";        
    $result = $db_user->query($q_user)->fetchAll();

    // Loops in the result of the query 
    foreach ($result as $row) {        

        // If pseudo already used
        if ($row['pseudo'] == $psd) {

            // Create 'error' SESSION const to retrieve error on formulaire.php
            $_SESSION['pseudoerror'] = 'This pseudo is used already, <br>please chose another pseudo';

            // back to formulaire.php            
            header('Location: formulaire.php');


        // Else if email already used    
        } elseif ($row['email'] == $eml) {

            // Create 'error' SESSION const to retrieve error on formulaire.php
            $_SESSION['emailerror'] = 'This email is already registered, <br>please go to the Login page';

            // back to formulaire.php
            header('Location: formulaire.php');
      
        // if both are new, retrieve value of ID for const $_SESSION 
        // and go to new_user.php (line 12)
        } else {
            $_SESSION['id'] = $row['id'];
        }
    }

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}

?>