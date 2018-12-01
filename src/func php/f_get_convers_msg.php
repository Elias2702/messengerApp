<?php

function get_convers_msg($cnv_ident) {
    require_once './func php/f_db_con.php';
    $db_cnct = dbase_con();
try {
    $q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$cnv_ident' ;";
    //$q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$conv_reg_id' ;"; // select * || `content`
    $msg_list = $db_cnct -> query("$q_msg_dsp")->fetchAll();
    //$msg_list_f = $db_cnct -> query("$q_msg_dsp")->fetchAll();
    return $msg_list;
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 


} //end function