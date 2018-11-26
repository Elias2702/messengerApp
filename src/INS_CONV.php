<?php
 require_once 'db_param.php';

$num_particip = $_POST[''];
//$creation_date = date("Y/m/d");
$creation_time =  NOW(); //date("h:i:sa") ;//NEW DATE()
$cur_mem = 1; //$_POST['sessionowner'];
$other_mem = $_POST['member_sel'] ;
$particip_id = $other_mem." ".$cur_mem;
 
try {
    $db_conv = new PDO ($dsn, $user_db, $pass_db);
    $db_conv -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_conv= "INSERT INTO `conv_reg` (`num_particip`, `creation_time`, `particip_id`) VALUES ('2', '$creation_time', '$particip_id');";

    $db_conv -> exec($q_conv);
    print_r('cccxccc');
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 