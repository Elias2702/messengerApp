<?php
session_start();
    require_once 'db_param.php';

    $new_conv_id = $db_conv->lastInsertId();//if new conversation 
// GET MESSAGES that belong ONLY to the current conversation
try {
    $db_msg = new PDO ($dsn, $user_db, $pass_db);
    $db_msg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$conv_id' ;";
    $msg_list = $db_msg -> query("$q_msg_dsp")->fetchAll();
    echo '<select size = "10" style="width:250px;">';
        foreach ($msg_list as $row) {
            echo "<option>". $row["content"] ."<br> "."</option>";   //"<br> id: "." - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] .
        }
        echo '</select>';
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 