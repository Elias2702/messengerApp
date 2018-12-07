<?php

// -----> Page does not work but code is OK, issue with mailcatcher
// -----> To be checked by Leny..

session_start();

// Require connection params file
require_once 'db_param.php';

// $smtp = 'mailcatcher';
// $port = 25;

header('Refresh: 3; index.php');

$msg = 'Dear user, please click the following link to reset your password : 
        localhost:8000';
$email = $_POST['email'];

try {
    // Set connection to the database
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Extracts email & pass
    $q_user="SELECT email, pass FROM user" ;    
    $result = $db_user->query($q_user)->fetchAll();
    
    foreach ($result as $row) {
        if($row['email'] == $email){
            $pass = $row['pass'];
            $msg = $msg . $pass . '.';
        }
    }

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}
    
// send email
mail($email,"Password",$msg);

echo "We've sent an email to ". $email;

echo $msg;
?>