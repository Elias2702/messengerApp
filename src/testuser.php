<?php
// This page checks if the password matches the login and sends the user either to the member area
// or back to the login page.


session_start(); 

// Calls connection params 
require_once 'db_param.php';
require_once './class php/user_class.php';

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
            /*$obj = new Object();

            $_SESSION['obj'] = serialize($obj);

            $obj = unserialize($_SESSION['obj']);*/

          // $_SESSION['mem'] = new user_cl;
            $passcheck = $row['pass'];
            $id = $row['id'];
            $prenom = $row['prenom'];
            $nom = $row['nom'];
            $sexe = $row['sexe'];
            $pseudo = $row['pseudo'];
            $pass = $row['pass']; 

            $mem = new user_cl($id,$prenom,$nom,$sexe,$pseudo,$email,$pass);    
            $_SESSION['mem'] =   serialize($mem);  
            //$mem = unserialize($_SESSION['mem']);   
        }
    }

    if($passcheck == null) {
        header('Refresh: 2; index.php');
        echo 'not a valid email';
    } elseif($pass == $passcheck) {
        header("Refresh: 2; url=chatt.php");
        echo 'Hello ' . $_SESSION['pseudo'];
        var_dump($_SESSION['mem']);
    } else {
        header("Refresh: 2; url=index.php");
        echo 'wrong password';
    }
    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}




//string(166) "O:7:"user_cl":7:{s:2:"id";s:1:"4";s:6:"prenom";s:1:"d";s:3:"nom";s:1:"d";s:4:"sexe";s:5:"femme";s:6:"pseudo";s:3:"ddd";s:5:"email";s:5:"d@d.d";s:4:"pass";s:4:"dddd";}" 
