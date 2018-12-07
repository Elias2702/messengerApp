<?php

session_start();

require_once 'db_param.php';

// retrieve msg_id from url 
$msg_id = $_GET['msg_id'];

try {

    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    // retrieve infos from selected message in the db
    $q_messages="SELECT * FROM messages WHERE id ='" . $msg_id ."'";
    $res4 = $db->query($q_messages)->fetchAll(PDO::FETCH_ASSOC);
    $res4 = $res4[0];

    // assign actual content of the message to $content    
    $content = $res4['content'];

    //then he can change the content
    echo "  <h1> Change the content of your message </h1>
    
            <form action='change_msg_content.php?msg_id=" . $msg_id . "' method='POST'>

                <textarea cols='70' rows='5' name='content'>" .  $content . "</textarea>

                <br><br>

                <button type='submit'>SEND</button>

            </form>";


    
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}

?>