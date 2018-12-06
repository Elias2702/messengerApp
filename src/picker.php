<?php

require_once 'db_param.php';

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $q_user="SELECT id, pseudo, picture FROM user";    
    $result = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);
   


    
    foreach ($result as $row) {
        if($row['id'] !== $cur_mem_id) {

            if($row['id']<$cur_mem_id){
                $particip_id = $row['id']. " " . $cur_mem_id;                
            }else{
                $particip_id = $cur_mem_id . " " . $row['id'];                
            }
            $q_conv_reg="SELECT id, particip_id FROM conv_reg WHERE particip_id = '".$particip_id."'";
            $res2 = $db->query($q_conv_reg)->fetchAll();

            $res2 = $res2[0][0];
            $q_msg="SELECT id, conv_reg_id, content FROM messages WHERE conv_reg_id = '".$res2."' ORDER BY id DESC LIMIT 1";
            $res3 = $db->query($q_msg)->fetchAll();
            
            //si conversation existe
            if($res3[0][2]) { 


                //si l'autre utilisateur a une img de profil
                if($row['picture']){

                    print "<button class='row convbtn' type='submit' value='" . $res2 . "' name='conv_reg_id' ><img class='pro_pic' src='" . $row['picture'] . "'alt='profile picture'>";
                    print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br>" . $res3[0][2] . " </div></button><br>";

                //si pas de photo de profil
                } else {

                    print "<button class='row convbtn' type='submit' value='" . $res2 . "' name='conv_reg_id' ><img class='pro_pic' src='uploads/def_icon.png'alt='profile picture'>";
                    print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br>" . $res3[0][2] . " </div></button><br>";

                }

            // si conversation n'existe pas    
            } else {


                //si l'autre utilisateur a une img de profil
                if($row['picture']){

                    print "<button class='row convbtn' type='submit' value='" . $row['id'] . "' name='oth_mem_id' ><img class='pro_pic' src='" . $row['picture'] . "'alt='profile picture'>";
                    print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br> Start new conversation </div></button><br>";

                //si pas de photo de profil
                } else {

                    print "<button class='row convbtn' type='submit' value='" . $row['id'] . "' name='oth_mem_id' ><img class='pro_pic' src='uploads/def_icon.png'alt='profile picture'>";
                    print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br> Start new conversation </div></button><br>";

                }

            }












/*
            
            if($row['picture']){
                
                print "<button class='row convbtn' type='submit' value='" . $res2 . "' name='conv_reg_id' ><img class='pro_pic' src='" . $row['picture'] . "'alt='profile picture'>";
            
            }else{
            
                print "<button class='row convbtn' type='submit' value='" . $res2 . "' name='conv_reg_id' ><img class='pro_pic' src='uploads/def_icon.png'alt='profile picture'>";
            
            } 

            
            if($res3[0][2]) { 
            
                print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br>" . $res3[0][2] . " </div></button><br>";
            
            } else {
            
                print "<div class='col-auto lightgrey'><strong> ". $row['pseudo'] . "</strong><br> Start new conversation </div></button><br>";
            
            }
            */
        }
    }


    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>