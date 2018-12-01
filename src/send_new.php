<?php

session_start();

require_once './func php/f_db_con.php';
$db_cnct = dbase_con();
require_once './func php/f_get_convers_msg.php';
require_once './func php/f_get_mem_id.php';
require_once './func php/f_get_convers_reg.php';
require_once './func php/f_crt_new_msg.php';

$cur_mem = $_SESSION['id'];
$other_mem_pseudo = $_POST['mem_sel']; //super important : ID of the other user !!!
$msg_crt_time = date("Y-m-d H:i:s");
$msg_cnt = $_POST['crt_msg'];


// extract user_id that corresponds to user pseudo


$other_mem_id = get_mem_id($other_mem_pseudo);
$particip_id = strval($cur_mem . " " . $other_mem_id);


/*  1- connect to db,table { { conv_reg } }.
    2- verify if there is a conversation already between $cur_mem and $other_mem.*/



        $_SESSION['conv_reg_id'] = get_convers_reg($particip_id);
        $cnv_ident = intval($_SESSION['conv_reg_id']);

if($msg_cnt != '') {  
crt_new_msg($cur_mem, $cnv_ident, $msg_cnt);
}
$msg_list2 = get_convers_msg($cnv_ident);
    echo '<select size = "10" style="width:250px;">';
        foreach ($msg_list2 as $row) {
            echo "<option>". $row["content"] ."<br> "."</option>";   
        }
        echo '</select>';
   
