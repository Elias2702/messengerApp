<?php

session_start();
header('Refresh: 0; includer.php');
require_once 'db_param.php';
$new_mem_id = ($_POST['oth_mem_id']) ; 

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $q_conv_reg="SELECT id, particip_id FROM conv_reg WHERE id = '".$_SESSION['conv_reg_id']."'";    
    $result = $db->query($q_conv_reg)->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($result as $row) {
        if($new_mem_id !== $cur_mem_id) {
            //if the new member is already part of the conversation
            if (strpos($new_mem_id, $_SESSION['particip_id']) !== false) { 
                echo "member is alreay part of this conversation";
            } else { 
                // if newew member is NOT part of the conversation
                //perform insert into array,,then sort array

                //1-concatinate "space".new_mem_id to $_SESSION['particip_id']
              
                $temp_particip_id = $_SESSION['particip_id'] . " " . $new_mem_id;

                //2-split string by removing "space" DOES NOT WORK
                //ALTERNATIVE : i-explode
                $str_temp_particip_id = explode(" ",$temp_particip_id);
                $arr_len = (sizeof($str_temp_particip_id)-1);
                
                //4-arrange resulting array  ascending (from small to big)
                sort($str_temp_particip_id, 0 );
                               
                //5-change the num_of_particip to the value of (sizeof(array))
                    //update database table conve_reg field particip_id
                         $num_of_particip = sizeof($str_temp_particip_id);
                        $q_cnv_reg = "UPDATE `conv_reg` SET `num_particip`='" . $num_of_particip . "' WHERE `id`= '" . $_SESSION['conv_reg_id'] . "'";
                        $db -> exec($q_cnv_reg);  
                //6-create new string by inserting "space" between array elements
                    foreach($str_temp_particip_id as $new_particip_id) {
                        $new_particip .= " " .($new_particip_id);
                    }
                   
                //7-store the new string in the field of particip_id in conv_reg table
                        //update database table conve_reg field particip_id
                        $q_cnv_reg = "UPDATE `conv_reg` SET `particip_id`='" . $new_particip . "' WHERE `id`= '" . $_SESSION['conv_reg_id'] . "'";
                        $db -> exec($q_cnv_reg); 
                        $_SESSION['particip_id'] = $new_particip;
                //8-TO SEE THE RESULT,REFRESH PAGE

            }//end else
        }
        
        
    }
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}
