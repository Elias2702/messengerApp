<?php

session_start();

require_once 'db_param.php';

$cur_mem = $_SESSION['id'];
$other_mem = $_POST['mem_sel'];
$msg_crt_time = date("Y-m-d H:i:s");
$_SESSION['$msg_cnt'] = $_POST['crt_msg'];
$particip_id = $cur_mem . " " . $other_mem;

/*  1- connect to db,table { { conv_reg } }.
    2- verify if there is a conversation already between $cur_mem and $other_mem.*/

try {
    $db_conv_reg = new PDO ($dsn, $user_db, $pass_db);
    $db_conv_reg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_conv_reg_check ="SELECT `particip_id` FROM messenger.conv_reg WHERE `particip_id` = '$particip_id' ;";
    $conv_check = $db_conv_reg -> query("$q_conv_reg_check")->fetchAll(); // better : find first ocurence.
    var_dump($conv_check);
    if(isset(var_dump($conv_check))) {
        // get the conv_reg_id
        $_SESSION['conv_reg_id'] = $conv_check['id'];

        // add the new message to messages table WHERE `conv_reg`.`id` = 'conv_reg_id' 

    } else { 
        // there is no previous conversation : CREATE NEW conv_check
        // insert a new record in table conv_reg
        
            $cnv_crt_time = date("Y-m-d H:i:s");
            $q_conv_reg_ins = "INSERT INTO `conv_reg` ( `num_particip`, `creation_time`, `particip_id`) VALUES ( '2', '$cnv_crt_time', '$particip_id');";
        
        //set the conv_reg_id to be used to insert new message into message table
        $_SESSION['conv_reg_id'] = $db_conv->lastInsertId();
    }
print_r($_SESSION['conv_reg_id']);
        // after checking the conv_reg, now we insert the new message in mesage table
            /*try {   
                    $db_msg_ins = new PDO ($dsn, $user_db, $pass_db);
                    $db_msg_ins -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  //  $q_msg_ins ="INSERT INTO `messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('$_SESSION["id"]', '$_SESSION["conv_reg_id"]', '$msg_crt_time', '$_SESSION["$msg_cnt"]');";
                    $db_msg_ins -> exec($q_msg_ins);
                    
                } catch (Exception $ex) {                    
                    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
                } */
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 

// display the messages from this specific conversation
/*
try {
    $q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$_SESSION['conv_reg_id']' ;";
    $msg_list = $db_msg -> query("$q_msg_dsp")->fetchAll();
    echo '<select size = "10" style="width:250px;">';
        foreach ($msg_list as $row) {
            echo "<option>". $row["content"] ."<br> "."</option>";   
        }
        echo '</select>';
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } */