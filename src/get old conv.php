<?php
session_start();
    require_once 'db_param.php';

    $conv_id = $_POST['conv_dsp']; 
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
    













    //this is an old comment ::: ignore NOW ::: START get the older messages of this conversation from table(message) filtered by conversation_reg_id
    //display the retrieved messages in select(msg_dsp)
    //**open iframe to contain all the code in this file + select(msg_dsp)+Send button and to
    //**target from the form in user_home page

    /*q_msg_dsp="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user;";
    $msg_list = $db_msg_dsp -> query("$q_msg_dsp")->fetchAll();*/

    
//END get the older messages of this conversation from table(message) filtered by conversation_reg_id