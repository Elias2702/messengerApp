<?php

session_start();

// Require connection params file
require_once 'db_param.php';

$active_user_id = $_SESSION['id'];
$active_user_pseudo = $_SESSION['pseudo'];

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Extracts id, email & pass
    $q_user="SELECT id, pseudo FROM user";    
    $result = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);

    $q_conv_reg="SELECT id, particip_id     
    FROM conv_reg
    WHERE particip_id = $active_user_id.' '.$row['id']
    OR particip_id = $row['id'].' '.$active_user_id";
    
    $result_2 = $db->query($q_conv_reg)->fetchAll(PDO::FETCH_ASSOC);                 
    
    foreach ($result as $row) {
        if($row['id'] !== $active_user_id) {
            echo($row['pseudo']. '</br>');
            echo result2['id'];
        }
        

    }

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>