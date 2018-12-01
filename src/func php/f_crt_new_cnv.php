<?php

function crt_new_cnv($particip_id) {

//require_once 'db_param.php';
$db_cnct = dbase_con();

    try {        
            $cnv_crt_time = date("Y-m-d H:i:s");
            $q_conv_reg_ins = "INSERT INTO `conv_reg` ( `num_particip`, `creation_time`, `particip_id`) VALUES ( '2', '$cnv_crt_time', '$particip_id');";
            $db_cnct -> exec($q_conv_reg_ins);
            $nw_cnv_reg_id = $db_cnct->lastInsertId();

            return $nw_cnv_reg_id;
        } catch (Exception $ex) {                    
                echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
        }
} //end function
