<?php

header('location: includer.php');

require_once 'db_param.php';

// Retrieve msg id from url
$msg_id = $_GET['msg_id'];

try {

    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    $q_msg = "DELETE FROM messages WHERE id ='" . $msg_id .  "'";
    $db->query($q_msg);

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}

?>