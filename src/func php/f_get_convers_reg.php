<?php

/*function get_convers_reg() {

//require_once 'db_param.php';
$db_cnct = dbase_con();

    try {        
        $q_conv_reg="SELECT id, num_particip, creation_time, particip_id FROM messenger.conv_reg;";
        $result = $db_cnct -> query("$q_conv_reg")->fetchAll();
    
        return $result;
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 

} //end function
  */

function get_convers_reg($particip_id) {

    //require_once 'db_param.php';
    $db_cnct = dbase_con();
    require_once 'f_crt_new_cnv.php';
    
        try {        
            $q_conv_reg="SELECT `id` FROM messenger.conv_reg WHERE `particip_id` = '$particip_id';";
            $result = $db_cnct -> query("$q_conv_reg")->fetchAll();
            if(!(empty($result))) {
                $conv_reg_id = $result[0][0];//$_SESSION['conv_reg_id']
            } else { 
                //create new conversation
                $conv_reg_id = crt_new_cnv($particip_id);
            }
        
            return intval($conv_reg_id);
        } catch (Exception $ex) {
            echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
        } 
    
    } //end function