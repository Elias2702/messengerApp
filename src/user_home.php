<?php
session_start();
// Store Session Data
$_SESSION['login_user']= $_POST['user_name'];
print_r($_SESSION['login_user']);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Home</title>
    </head>
    <body>
    
    <?php require_once 'db_param.php';

            //require_once 'ins_conv_msg.php';      
            $cur_mem = $_POST['user_name'];
            print_r ("current user is : ".$_SESSION['login_user']);
            ?>
        <script>
          /*  function js_send() {
                    var dsp = document.getElementById('msg_dsp');
                    var new_opt = document.createElement("OPTION");
                    new_opt.innerHTML = document.getElementById('crt_msg').value;
                    dsp.appendChild(new_opt);
                    document.getElementById('crt_msg').value ="";*/
            }
        </script>
        
       <?php
           
            try {
                $db_user = new PDO ($dsn, $user_db, $pass_db);
                $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user;";
                $result = $db_user -> query("$q_user")->fetchAll();
                //print_r($result);
                
                ?>
                <form action="start_conv.php" method="POST" target="message_display_iframe" >
                        
                        <div style="display:flex;">
                        <legend><p>List of Members</p>
                        <select size="10" name="member_sel" style="width: 250px;">
                        <option><table><tr><th><td>id </td><td>| prenom |</td><td>nom </td></th></tr></table></option>
                            <?php foreach ($result as $row) {
                                    echo "<option>". $row["id"].  "<br> "."</option>";   //"<br> id: "." - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] .
                            } ;?>
                        </select>
                        </legend>
                                            
                    
                        <?php                
                        } catch (Exception $ex) {
                            echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
                        }                       
                    ?>
                    <?php
                        try {
                            $db_conv = new PDO ($dsn, $user_db, $pass_db);
                            $db_conv -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $q_conv = "SELECT id, num_particip, creation_time, particip_id FROM messenger.conv_reg;";
                            $result_cnv_reg = $db_conv -> query("$q_conv")->fetchAll();
                            ?>

                            <legend><p>list of conversations</p>
                            <select size='10' name='conv_dsp' style='width: 250px;'>
                                <option><table><tr><th><td>id </td><td>| prenom |</td><td>nom </td></th></tr></table></option>
                                        <?php foreach ($result_cnv_reg as $row_cnv_reg) {                                      
                                                echo '<option>'.'<br>'. $row_cnv_reg['id'].'<br>'.'</option>'; //'<br>'. 'id: '. $row['id']. ' - number of participants: '. $row['num_particip']. '   '. ' - creation time: '. $row['creation_time'] . ' - id of participants: '. $row['particip_id'] .
                                        // the id from database is stored inside the (option.innerhtml) AND NOT the (selectedIndex) property of <selec>
                                        } ?>
                            </select>
                            </legend>
                            </div>
                            <?php                
                        } catch (Exception $ex) {
                            echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
                        }                       
                    ?>
                    
                    <p><?php echo $_POST['member_sel'] ;?></p>
                        <br>
                        <div><input type="submit" value="Start Conversation"></div>
                           
                        
                        <br>
                        <div><button type='submit' name='send' value='' formaction='get old conv.php'>Show conv</button></div>
                        <br>
                        
                        <div><iframe name="message_display_iframe" style="height:250px;">
                            <span>
                                <select size='10' id='msg_dsp' style="width: 250px;">
                                    
                                </select>
                            </span>
                        </iframe>
                        </div>
                        <br>
                        <div><input type='text' name='crt_msg' id='crt_msg'></div>
                        <br>
                        <div><button type='submit' name='send' value='' formaction='send msg.php'>Send</button></div>
                        <br>
                        
                        <p><?php /* echo $_POST['member_sel'];// select the entire row,and then filter the name and id, and store them in variables*/?></p>

<!--INSERT INTO `conv_reg` (`id`, `num_particip`, `creation_time`, `particip_id`) VALUES ('4', '3', '2018-11-07 00:00:00', '5');  -->                          
                </form>
    </body>
</html>
