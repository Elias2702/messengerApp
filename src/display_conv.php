<?php
// display chat with this member
session_start();

require_once 'db_param.php';

$other_mem_pseudo = $_POST['mem_sel'];

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
        $q_conv_reg_check ="SELECT `id` FROM messenger.conv_reg WHERE `particip_id` = '$particip_id'  ;"; //we can replace '=' with LIKE (WILD CARDS)
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