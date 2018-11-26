<?php
    require_once 'db_param.php';

// START insert the new message into mesage table (NOT covn reg!!!)
$owner = 1; //$_POST['sessionowner'];
$conv_id = $_POST['conv_dsp']; // if the conversation already exists (i.e. registered)
//$new_conv_id = $db_conv->lastInsertId();//if new conversation
$msg_crt_time =  date("Y-m-d H:i:s");
$msg_cnt = $_POST['crt_msg'];
//print_r($conv_id);
//print_r($new_conv_id);
try {
    $db_msg = new PDO ($dsn, $user_db, $pass_db);
    $db_msg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_msg="INSERT INTO `messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('$owner', '$conv_id', '$msg_crt_time', '$msg_cnt');";
    $db_msg -> exec($q_msg);

            
    //print_r('cccxccc');
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 
// END insert the new message into mesage table (NOT covn reg!!!)

require_once 'get old conv.php';