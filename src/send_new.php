<?php

session_start();

require_once './func php/f_db_con.php';
$db_cnct = dbase_con();
require_once './func php/f_get_convers_msg.php';
require_once './func php/f_get_mem_id.php';
require_once './func php/f_get_convers_reg.php';
require_once './func php/f_crt_new_msg.php';

$cur_mem = $_SESSION['id'];
$other_mem_id = $_POST['mem_sel']; 
$msg_crt_time = date("Y-m-d H:i:s");
$msg_cnt = $_POST['crt_msg'];

if ($cur_mem < $other_mem_id) {
    $particip_id = strval($cur_mem . " " . $other_mem_id);
} else {
    $particip_id = strval($other_mem_id . " " . $cur_mem);
}

/*  1- connect to db,table { { conv_reg } }.
    2- verify if there is a conversation already between $cur_mem and $other_mem.*/



        $_SESSION['conv_reg_id'] = get_convers_reg($particip_id);
        $cnv_ident = intval($_SESSION['conv_reg_id']);

if($msg_cnt != '') {  
crt_new_msg($cur_mem, $cnv_ident, $msg_cnt);
}

try {
    $q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$cnv_ident' ;";
    $msg_list = $db_msg_ins -> query("$q_msg_dsp")->fetchAll();
    
        foreach ($msg_list as $row) {
            echo "<option>". $row["content"] ."<br> "."</option>";   
        }
        echo '</select>';
    }catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 
