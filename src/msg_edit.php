<?php

session_start();

require_once 'db_param.php';

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    $q_messages="SELECT * FROM messages WHERE conv_reg_id ='" . $_SESSION['conv_reg_id'] ."'";
    $res4 = $db->query($q_messages)->fetchAll(PDO::FETCH_ASSOC);

    foreach($res4 as $row) {


?>