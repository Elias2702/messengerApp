<?php

session_start();

require_once 'db_param.php';

$cur_mem = $_SESSION['id'];
$other_mem_pseudo = $_POST['mem_sel']; //super important : ID of the other user !!!
$msg_crt_time = date("Y-m-d H:i:s");
$msg_cnt = $_POST['crt_msg'];


// extract user_id that corresponds to user pseudo
try {
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_user="SELECT `id` FROM `messenger`.`user` WHERE `pseudo` = '$other_mem_pseudo' ;";
    $result = $db_user -> query("$q_user")->fetchAll();
    $other_mem_id = ($result[0][0]);
} catch (Exception $ex) {                    
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 

$particip_id = strval($cur_mem . " " . $other_mem_id);


/*  1- connect to db,table { { conv_reg } }.
    2- verify if there is a conversation already between $cur_mem and $other_mem.*/

try {
    $db_conv_reg = new PDO ($dsn, $user_db, $pass_db);
    $db_conv_reg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_conv_reg_check ="SELECT `id` FROM messenger.conv_reg WHERE `particip_id` = '$particip_id'  ;";
    $conv_check = $db_conv_reg -> query("$q_conv_reg_check")->fetchAll(); // better : find first ocurence.   
    
            if(!(empty($conv_check))) {
                     $_SESSION['conv_reg_id'] = $conv_check[0][0];//from db ';)
                    
                           
                        // add the new message to messages table With `conv_reg`.`id` = 'conv_reg_id' 

                    } else { 
                        // there is no previous conversation : CREATE NEW conversation
                        // insert a new record in table conv_reg
                        
                            $cnv_crt_time = date("Y-m-d H:i:s");
                            $q_conv_reg_ins = "INSERT INTO `conv_reg` ( `num_particip`, `creation_time`, `particip_id`) VALUES ( '2', '$cnv_crt_time', '$particip_id');";
                            $db_conv_reg -> exec($q_conv_reg_ins);
                        //set the conv_reg_id to be used to insert new message into message table
                            $_SESSION['conv_reg_id'] = $db_conv_reg->lastInsertId();
                    }
        //end foreach
        $cnv_ident = intval($_SESSION['conv_reg_id']);

        // after checking the conv_reg, now we insert the new message in message table
            try {      //echo 'other mem id : ' . $cnv_ident . '<br><br>'; 
                    $db_msg_ins = new PDO ($dsn, $user_db, $pass_db);
                    $db_msg_ins -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $q_msg_ins = "INSERT INTO `messenger`.`messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('$cur_mem', '$cnv_ident', '$msg_crt_time', '$msg_cnt');";
                    $db_msg_ins -> exec($q_msg_ins);  
                    $msg_cnt = ""; // clear $msg_cnt for the next use                  
                } catch (Exception $ex) {                    
                    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
                } 
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 

// display the messages from this specific conversation

try {
    $q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$cnv_ident' ;";
    $msg_list = $db_msg_ins -> query("$q_msg_dsp")->fetchAll();
    echo '<select size = "10" style="width:250px;">';
        foreach ($msg_list as $row) {
            echo "<option>". $row["content"] ."<br> "."</option>";   
        }
        echo '</select>';
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 
