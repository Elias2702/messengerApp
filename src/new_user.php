<?php
// This page defines the new user object and writes it to the database
// The user is then sent to the testuser page


session_start();

// Require connection params file
require_once 'db_param.php';
// Require user class file
require 'user_class.php';

    // After execution the user is sent to the user_home page  -
    header("Refresh:2; url=img_user_upload.php");

    // Create variables with infos from SESSION (formulaire.php)
    $pn       = $_SESSION['prenom'] ;
    $n        = $_SESSION['nom'] ;
    $sx       = $_SESSION['sexe'] ;
    $psd      = $_SESSION['pseudo'] ;
    $eml      = $_SESSION['email'] ;
    $pass     = $_SESSION['pass'] ;

    $options = [
        'cost' => 11,
        'salt' => random_bytes(22),
    ];
    $hash_pass = password_hash($pass, PASSWORD_BCRYPT, $options);

    // Create new user_cl object
    $new_user = new user_cl($pn,$n, $sx, $psd, $eml, $hash_pass);

    try {
        // Set connection to the database
        $db_user = new PDO ($dsn, $user_db, $pass_db);
        $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert new user into the database
        $q_user="INSERT INTO user (prenom, nom , sexe, pseudo, email, pass) VALUES ('$pn','$n','$sx','$psd','$eml','$hash_pass');";
        $db_user -> exec($q_user);

        // Retrieves new user ID to stock in SESSION['id']
        // I guess it could be without the foreach with a WHERE in the query, but not working :-( ---------------------
        $q_user2="SELECT id, email FROM user";
        $result = $db_user->query($q_user2)->fetchAll();
            foreach ($result as $row) {
                if ($eml == $row['email']) {
                    $_SESSION['id'] = $row['id'];
                }
        }

        // Confirmation message
        echo 'Registration Successful.';

    // If error, error message
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    }


 ?>
