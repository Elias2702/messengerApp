<?php

session_start();


require_once './func php/f_db_con.php';
$db_cnct = dbase_con();
require_once './func php/f_get_contacts.php';
require_once './func php/f_get_convers_reg.php';
require_once './func php/f_dsp_element.php';

?>

<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>User Home</title>        
    </head>
    <body>
    
    <?php //require_once 'db_param.php';

            //require_once 'ins_conv_msg.php';      
            $cur_mem = $_SESSION['id'];
            print_r($_SESSION['id']);

    ?>

       <?php           
<<<<<<< HEAD
                $result = get_contacts();
                                
=======
            try {
                $db_user = new PDO ($dsn, $user_db, $pass_db);
                $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user;";
                $result = $db_user -> query("$q_user")->fetchAll();      
>>>>>>> devantoine
        ?>
                
                <form action="send_new.php" name="main_form" method="POST" id="send" target="message_display_iframe" >
                    
                    <div style="display:flex;">
                    <legend><p>List of Members</p>
                    <select size="10" name="mem_sel" style="width: 250px;">
                        <?php foreach ($result as $row) {
<<<<<<< HEAD
                            dsp_element('option' , $row["pseudo"]);
                                //echo "<option>". $row["pseudo"]. "<br> "."</option>";   //"<br> id: "." - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] .
                        } ;?>
                    </select>
                    </legend>
        <?php           
                //$result2 = get_convers_reg();
                                
        ?>
                    <legend><p>list of conversations</p>
                    <select size='10' name='conv_dsp' style='width: 250px;' onClick="">
                    <option><table><tr><th><td>id </td><td>| prenom |</td><td>nom </td></th></tr></table></option>
                        <?php foreach ($result2 as $row) {
                            dsp_element('option' , $row['id']);                                      
                                   // echo '<option>'.'<br>'.  $row['id'] .'<br>'.'</option>'; //'<br>'. 'id: '. $row['id']. ' - number of participants: '. $row['num_particip']. '   '. ' - creation time: '. $row['creation_time'] . ' - id of participants: '. $row['particip_id'] .
                                    } ?>
=======
                            if($row['id'] !== $cur_mem) {
                                echo "<option value='" . $row['id'] . "' label='" .$row['pseudo']. "'> ". $row['pseudo'] ."</option>";     
                            }
                        }
                        ?>
>>>>>>> devantoine
                    </select>
                    </legend>
                    </div>
            
        <?php                
                                  
        ?>
<<<<<<< HEAD
                    <p><?php //echo $_POST['member_sel'] ;?></p>
=======
                    <p></p>
>>>>>>> devantoine
                                                
                        <div><input type='text' name='crt_msg' id='crt_msg'></div>
                        <br>
                        <div><button type="submit" value="SEND">SEND</button></div>
                        <br>        
                        <div><iframe name="message_display_iframe" style="height:250px;">
<<<<<<< HEAD
                            
                        </iframe>
                        </div>
                        
                        <div><button type='button' name='display conversation' id='dsp_cnv' value='' action="display_conv.php" style="visibility:hidden">display conversation</button></div-->
                        <br>
                        <button> <a href="logout.php">Logout</a></button>
                        <p><?php /* echo $_POST['member_sel'];// select the entire row,and then filter the name and id, and store them in variables*/?></p>

<!--INSERT INTO `conv_reg` (`id`, `num_particip`, `creation_time`, `particip_id`) VALUES ('4', '3', '2018-11-07 00:00:00', '5');  -->                          
                </form>

           <script src="./script_taj.js"></script>    
=======
                            <!-- <span>
                                <select size='10' id='msg_dsp' style="width: 250px;">
                   
                                </select>
                            </span> -->
                        </iframe>
                        </div>
                </form>
                <br>
                <button onclick="location.href='logout.php'">Logout</button>
                <br>
                <br>
                <button onclick="location.href='includer.php'">Inclpicker</button>
                <br>
>>>>>>> devantoine
    </body>
</html>
