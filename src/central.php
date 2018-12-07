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


try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    $q_messages="SELECT * FROM messages WHERE conv_reg_id ='" . $_SESSION['conv_reg_id'] ."'";
    $res4 = $db->query($q_messages)->fetchAll(PDO::FETCH_ASSOC);

    foreach($res4 as $row) {

        if($row['owner_id'] == $cur_mem_id) {
            
            echo "<div class='col-auto'><strong> ". $cur_mem_psd . 
            "</strong></div><div class='col-auto lightblue'>" . $row['content'] . "<br>" ;
            
            $q_emo = "SELECT * FROM emo_react WHERE msg_id ='" . $row['id'] . "'";
            $res5 = $db->query($q_emo)->fetchAll();
            foreach($res5 as $emo){
                echo "<img class='icons' src='" . $emo['emo_path'] . "' title='" . $emo['usr_pseudo'] . "' alt='emo' />";
            }

            echo "</div><div class='row'><div class='toggle'><a href='emojis.php?msg_id=" . $row['id'] . 
            "' onClick='showPopup(this.href);return(false);'><img class='icons' src='uploads/smiley.png' alt='smiley'></a></div>";

            echo "<div class='toggle'><a href='msg_edit.php?msg_id=" . $row['id'] .
            "' onClick='showPopup(this.href);return(false);'><img class='icons' src='uploads/pencil.png' alt='smiley'></a></div></div>";


        } else {

            $q_user="SELECT id, pseudo, picture FROM user WHERE id ='". $row['owner_id']."'";    
            $res5 = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<div class='col-auto'><strong> ". $res5[0]['pseudo'] . 
            "</strong></div><div class='col-auto lightgrey'>" . $row['content'] . "<br>" ;
            

            $q_emo = "SELECT * FROM emo_react WHERE msg_id ='" . $row['id'] . "'";
            $res5 = $db->query($q_emo)->fetchAll();
            foreach($res5 as $emo){
                echo "<img class='icons' src='" . $emo['emo_path'] . "' title='" . $emo['usr_pseudo'] . "' alt='emo' />";
            }

           
            echo "</div><div class='row'><div class='toggle'><a href='emojis.php?msg_id=" . $row['id'] . 
            "' onClick='showPopup(this.href);return(false);'><img class='icons' src='uploads/smiley.png' alt='smiley'></a></div>";

            echo "<div class='toggle'><a href='msg_edit.php?msg_id=" . $row['id'] .
            "' onClick='showPopup(this.href);return(false);'><img class='icons' src='uploads/pencil.png' alt='smiley'></a></div></div>";

        }
    }    
    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>