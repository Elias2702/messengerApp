<?php

// When the user has clicked on the send button (on create_msg.php), he is redirected here
// this page adds the message to the db then redirects directly to includer.php

session_start();

// redirects to includer.php
header('Location: includer.php');

require_once 'db_param.php';


// the content of the message is assigned to $content
$content = $_POST['content'];

// the active_user_id is assigned to $cur_mem_id
$cur_mem_id = $_SESSION['id'];

// the conversation_register_id is assigned to $conv_reg_id
$conv_reg_id = $_SESSION['conv_reg_id'];

// the time the message is sent at is assigned to $create_time
$create_time =  date("Y-m-d H:i:s");

// the participants_id is assigned to $particip_id
$particip_id = $_SESSION['particip_id'];



try {
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if there is already a conversation between the users 
    if($conv_reg_id) {

        // then insert the new message into this conversation
        $q_msg="INSERT INTO messages (owner_id, conv_reg_id, time, content) VALUES ('$cur_mem_id', '$conv_reg_id', '$create_time', '$content')";
        $db->exec($q_msg);

    // else start new conversation    
    } else {

        // insert new in conv_reg table
        $q_conv_reg_id="INSERT INTO conv_reg (num_particip, creation_time, particip_id) VALUES (2, '$create_time', '$particip_id')";
        $db->exec($q_conv_reg_id);

        // retreive the new conv_reg id from db 
        $q_conv_reg_id_2 = "SELECT id FROM conv_reg WHERE particip_id ='" . $particip_id .  "'";
        $res = $db->query($q_conv_reg_id_2)->fetchAll();
        
        // and assign its value to $conv_reg_id
        $conv_reg_id = $res[0][0];

        // then insert new message in the new conversation
        $q_msg_2="INSERT INTO messages (owner_id, conv_reg_id, time, content) VALUES ('$cur_mem_id', '$conv_reg_id', '$create_time', '$content')";
        $db->exec($q_msg_2);

        // and reaffect the new conv_reg_id to the session variable
        $_SESSION['conv_reg_id'] = $conv_reg_id;

    }

}catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 

?>