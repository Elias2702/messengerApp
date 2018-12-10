<?php

session_start();

require_once 'db_param.php';


// Reinit session variables 
//-------------------------

// if $POST['oth_mem_id'] is sent from picker.php 
if (isset($_POST['oth_mem_id'])) {
    
    // then reinit $_SESSION['conv_reg_id']
    $_SESSION['conv_reg_id'] = null;

    // if active_user_id is smaller than other_member_id
    if ($_SESSION['id'] < $_POST['oth_mem_id']) {
        
        // then affect $_SESSION['particip_id'] as active_user_id + " " + oth_mem_id
        $_SESSION['particip_id'] = $_SESSION['id'] . " " . $_POST['oth_mem_id'];
    
    // else (if oth_mem_id is smaller than active_user_id)
    } else {

        // then affect $_SESSION['particip_id'] as  + " " oth_mem_id + active_user_id
        $_SESSION['particip_id'] = $_POST['oth_mem_id'] . " " . $_SESSION['id'];

    } 

// else if no new choice from picker panel 
// and $POST['conv_reg_id'] is sent from send_msg.php 
} elseif (isset($_POST['conv_reg_id'])) {    

    $_SESSION['conv_reg_id'] = $_POST['conv_reg_id'];  

} 


// Display the chat 
//-----------------

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    // Select all messages from the active conversation 
    $q_messages="SELECT * FROM messages WHERE conv_reg_id ='" . $_SESSION['conv_reg_id'] ."'";
    $res4 = $db->query($q_messages)->fetchAll(PDO::FETCH_ASSOC);


    // Loop through the messages in this conversation 
    foreach($res4 as $row) {

        $content = $row['content'];
        $date = $row['time'];

        // if the message was sent by the active user
        if($row['owner_id'] == $cur_mem_id) {
            
            // Display the active user pseudo + the content of the message
            echo    "<div class='row justify-content-center grey'>" .
                        $date . 
                    "</div>
                    <div>
                    <div class='row justify-content-between'>
                        <span class='col-auto ml'>
                            <strong> ". $cur_mem_psd . "</strong> said :
                        </span>";
                            
            // Then display the link to add emoji reaction 
            // (and set $_GET['msg_id'] = id of the current message)
            // the link opens a new small window (therefore the javascript code) 
            echo        "<span class='col-auto ml'>
                            <span class='toggle'>
                                <a href='emojis.php?msg_id=" . $row['id'] . "' onClick='showPopup(this.href);return(false);'>
                                    <img class='icons' src='uploads/smiley.png' alt='smiley'>
                                </a>
                            </span>";

            // Then display the link to edit the message 
            // (and set $_GET['msg_id'] = id of the current message)
            // the link opens a new small window (therefore the javascript code) 
                echo        "<span class='toggle'>
                                <a href='msg_edit.php?msg_id=" . $row['id'] . "' onClick='showPopup(this.href);return(false);'>
                                    <img class='icons' src='uploads/pencil.png' alt='pencil'>
                                </a>
                            </span>";

            // Then display the link to delete the message 
            // (and set $_GET['msg_id'] = id of the current message)
            // the link opens a new small window (therefore the javascript code) 
                echo        "<span class='toggle mr'>
                                <a href='msg_delete.php?msg_id=" . $row['id'] . "'>
                                    <img class='icons' src='uploads/bin.png' alt='bin'>
                                </a>
                            </span>
                        </span>
                    </div>";
        
            
            echo    "<div class='col-auto lightblue'>" . 
                        $row['content'] . 
                        "<br>" .                        
                    "</div>
                    <div class='row ml'>";
            
            // Check if there was an emoji reaction
            $q_emo = "SELECT * FROM emo_react WHERE msg_id ='" . $row['id'] . "'";
            $res5 = $db->query($q_emo)->fetchAll();
            
            // And loop through those emojis
            foreach($res5 as $emo){
                
                // Display the emoji (with title = name of the active user)
                echo "<img class='icons' src='" . $emo['emo_path'] . "' title='" . $emo['usr_pseudo'] . "' alt='emo' />";
            }

                echo "</div>
                     </div>
                     <br>";

        // else if the message was sent by the other user
        } else {

            // retrieve other member infos from db
            $q_user="SELECT id, pseudo, picture FROM user WHERE id ='". $row['owner_id']."'";    
            $res5 = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);
            
            // Display the other member pseudo + the content of the message
            echo    "<div class='row justify-content-center grey'>" . 
                        $date . 
                    "</div>
                    <div>
                    <div class='row justify-content-between'>
                        <span class='col-auto ml'>
                            <strong> ". $res5[0]['pseudo'] . "</strong> said :
                        </span>";
            
            // Then display the link to add emoji reaction 
            // (and set $_GET['msg_id'] = id of the current message)
            // the link opens a new small window (therefore the javascript code) 
            echo "      <span class='col-auto ml mr'>
                            <span class='toggle'>
                                <a href='emojis.php?msg_id=" . $row['id'] . "' onClick='showPopup(this.href);return(false);'>
                                    <img class='icons' src='uploads/smiley.png' alt='smiley'>
                                </a>
                            </span>
                        </span>
                    </div>";


            echo    "<div class='col-auto lightgrey'>" . 
                        $row['content'] . 
                        "<br>" .                        
                    "</div>
                    <div class='row ml'>";
                    
            // Check if there was an emoji reaction
            $q_emo = "SELECT * FROM emo_react WHERE msg_id ='" . $row['id'] . "'";
            $res5 = $db->query($q_emo)->fetchAll();
            
            // And loop through those emojis
            foreach($res5 as $emo){
                
                // Display the emoji (with title = name of the other member)
                echo "<img class='icons' src='" . $emo['emo_path'] . "' title='" . $emo['usr_pseudo'] . "' alt='emo' />";
            }

                echo "</div>
                     </div>
                     <br>";
        
        }
    }    
    
    echo "<a id='bottom'></a>";

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>