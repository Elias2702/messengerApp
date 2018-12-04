<?php

require_once 'db_param.php';

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $q_user="SELECT id, pseudo, picture FROM user";    
    $result = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);

    echo "yoyo";

    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>