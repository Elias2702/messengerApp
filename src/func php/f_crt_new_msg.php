<?php

function crt_new_msg($cur_mem, $cnv_ident, $msg_cnt) {

//require_once 'db_param.php';
$db_cnct = dbase_con();
if($msg_cnt != '') {  
       try {      //echo 'other mem id : ' . $cnv_ident . '<br><br>'; 
                $msg_crt_time = date("Y-m-d H:i:s");           
                $q_msg_ins = "INSERT INTO `messenger`.`messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('$cur_mem', '$cnv_ident', '$msg_crt_time', '$msg_cnt');";
                $db_cnct -> exec($q_msg_ins); //this could be a function too, so the connection could be closed in it                     
            } catch (Exception $ex) {                    
                    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
            }
    }
} //end function
