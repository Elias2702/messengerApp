<?php


session_start();
//session_register('$se_conv_id');
 require_once 'db_param.php';
 //require_once 'get old conv.php';


// START create new conversation in conversation register
$num_particip = 2 ;//$_POST[''];
//$creation_date = date("Y/m/d");
$cnv_crt_time =  date("Y-m-d H:i:s"); //date("h:i:sa") ;//NEW DATE()
$cur_mem = $_SESSION['login_user'];//must be changed to id of session-user via a query/*/better @ login verification
$other_mem = $_POST['member_sel'] ;//must be changed to id of other-member via a query/*/better @ login verification
$particip_id = $other_mem." ".$cur_mem;

try {
    $db_conv = new PDO ($dsn, $user_db, $pass_db);
    $db_conv -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_conv = "SELECT  particip_id FROM messenger.conv_reg WHERE particip_id = $particip_id ;";
    $result_cnv_reg = $db_conv -> query("$q_conv")->fetchAll();
    
        if($result_cnv_reg) { // if conv already exists, send msg and get old conv
            require_once 'start_conv.php';
            require_once 'get old conv.php';
        } else { //if no previous conv exists, create new conv
            require_once 'send_msg.php';
        }
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 