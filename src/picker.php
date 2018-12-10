<?php

require_once 'db_param.php';

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query id, pseudo and picture from user table
    $q_user="SELECT id, pseudo, picture FROM user";    
    $result = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);
   
    // Loop through the result  
    foreach ($result as $row) {

        // Select all members other than the active user
        // ( $cur_mem_id is created in includer.php and set equal to $_SESSION['id] )
        if($row['id'] !== $cur_mem_id) {

            // If other_member_id is smaller than active_user_id
            if($row['id']<$cur_mem_id){

                // then set $particip_id as other_member_id + " " + active_user_id
                $particip_id = $row['id']. " " . $cur_mem_id;                
            
            // else (if active_user_id is smaller than other_member_id)   
            }else{
            
                // then set $particip_id as active_user_id + " " + other_member_id
                $particip_id = $cur_mem_id . " " . $row['id'];                
            
            }

            // Check in conv_register table if conversation already exists
            $q_conv_reg="SELECT id, particip_id FROM conv_reg WHERE particip_id = '".$particip_id."'";
            $res2 = $db->query($q_conv_reg)->fetchAll();

            $res2 = $res2[0][0]; //this is conv_reg_id !!!~!!!
            $q_msg="SELECT id, conv_reg_id, content FROM messages WHERE conv_reg_id = '".$res2."' ORDER BY id DESC LIMIT 1";
            
            // and assign them to $res3
            $res3 = $db->query($q_msg)->fetchAll();
            
            // if conversation existe
            if($res3[0][2]) { 

//$_SESSION['conv_reg_id'] = $res3[0][1];
                //si l'autre utilisateur a une img de profil
                if($row['picture']){

                    // display link (reload whole includer.php)
                    // ( = transparent submit button with $_POST['conv_reg_id']
                    // in picker panel to select conversation, with other member picture
                    print "<button class='row convbtn' type='submit' value='" . $res2 . "' name='conv_reg_id' ><img class='pro_pic' src='" . $row['picture'] . "'alt='profile picture'>";

                    // and with other member pseudo and last message in that conversation

                    print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br>" . $res3[0][2] . " </div></button><br>";


                //else if other member has no profile picture
                } else {

                    // display link (reload whole includer.php)
                    // ( = transparent submit button with $_POST['conv_reg_id']
                    // in picker panel to select conversation, with default member picture
                    echo "<button class='row convbtn' type='submit' value='" . $res2 . "' name='conv_reg_id' ><img class='pro_pic' src='uploads/def_icon.png'alt='profile picture'>";

                    // and with other member pseudo and last message in that conversation

                    echo "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br>" . $res3[0][2] . " </div></button><br>";

                }

            // if conversation does not exist 
            } else {


                // and other member has a profile picture 
                if($row['picture']){

                    // display link (reload whole includer.php)
                    // ( = transparent submit button with $_POST['conv_reg_id']
                    // in picker panel to create new conversation, with other member picture
                    echo "<button class='row convbtn' type='submit' value='" . $row['id'] . "' name='oth_mem_id' ><img class='pro_pic' src='" . $row['picture'] . "'alt='profile picture'>";

                    // and with other member pseudo and default message "start new conversation"
                    echo "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br> Start new conversation </div></button><br>";


        

                //else if other member has no profile picture
                } else {
                    
                    // display link (reload whole includer.php)
                    // ( = transparent submit button with $_POST['conv_reg_id']
                    // in picker panel to create new conversation, with default member picture
                    echo "<button class='row convbtn' type='submit' value='" . $row['id'] . "' name='oth_mem_id' ><img class='pro_pic' src='uploads/def_icon.png'alt='profile picture'>";

                    // and with other member pseudo and default message "start new conversation"

                    echo "<div class='col-auto lightgrey'>
                            <strong> ". $row['pseudo'] . "</strong><br> 
                            Start new conversation 
                         </div></button><br>";


                }

            }

        }
    }
 

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


