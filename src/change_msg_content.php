<?php

session_start();

require_once 'db_param.php';

// retrieve new content from message
$new_content = $_POST['content'];
$msg_id = $_GET['msg_id'];

try {

    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    $q_msg = "UPDATE messages SET CONTENT ='" . $new_content . "' WHERE id ='" . $msg_id .  "'";
    $db->query($q_msg);


} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}

echo "<script>window.close();</script>";

?>