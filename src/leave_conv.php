<?php

session_start();
header('Refresh: 0; includer.php');
require_once 'db_param.php';


$_SESSION['particip_id'] = str_replace($_SESSION['id'],"",$_SESSION['particip_id']);

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $q_cnv_reg = "UPDATE `conv_reg` SET `particip_id`='" . $_SESSION['particip_id'] . "' WHERE `id`= '" . $_SESSION['conv_reg_id'] . "'";
        $db -> exec($q_cnv_reg); 

        $num_of_particip = strlen($_SESSION['particip_id']);
        $q_cnv_reg = "UPDATE `conv_reg` SET `num_particip`='" . ($num_of_particip-1) . "' WHERE `id`= '" . $_SESSION['conv_reg_id'] . "'";
        $db -> exec($q_cnv_reg);
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    }