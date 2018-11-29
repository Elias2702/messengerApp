<?php

session_start();

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
        <script>
                    /*function crt_nw_cnv() {
                        document.forms['main_form'].action = 'send msg.php';
                        //document.forms['main_form'].submit();
                            //document.getElementById('send').action = 'send msg.php';
                            //document.getElementById('send').submit();
                            document.Write("po po");
                    }

                    function  get_old_cnv() {
                        document.forms['main_form'].action = 'get old conv.php';
                    }*/
                </script>
        
    </head>
    <body>
    
    <?php require_once 'db_param.php';

            //require_once 'ins_conv_msg.php';      
            $cur_mem = $_SESSION['id'];
            print_r($_SESSION['id']);
            
            //echo "Hello " . $_SESSION['pseudo'] . '<br><br>';//
           // echo 'Your ID is : ' . $_SESSION['id'] . "<br>";
           /*echo 'First Name : ' . $_SESSION['prenom'] . '<br>';
            echo 'Last Name : ' . $_SESSION['nom'] . '<br>';
            echo 'Sex : ' . $_SESSION['sexe'] . '<br>';
            echo 'seudo : ' . $_SESSION['pseudo'] . '<br>';
            echo 'email : ' . $_SESSION['email'] . '<br>';
            echo 'pass : ' . $_SESSION['pass'] . '<br><br>';*/
    ?>


       <?php           
            try {
                $db_user = new PDO ($dsn, $user_db, $pass_db);
                $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user;";
                $result = $db_user -> query("$q_user")->fetchAll();
                //print_r($result);                
        ?>
                
                <form action="send_new.php" name="main_form" method="POST" id="send" target="message_display_iframe" >
                    
                    <div style="display:flex;">
                    <legend><p>List of Members</p>
                    <select size="10" name="mem_sel" style="width: 250px;" onClick="">
                    <option><table><tr><th><td>id </td><td>| prenom |</td><td>nom </td></th></tr></table></option>
                        <?php foreach ($result as $row) {
                                echo "<option>". $row["pseudo"]. "<br> "."</option>";   //"<br> id: "." - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] .
                        } ;?>
                    </select>
                    </legend>

                    <legend><p>list of conversations</p>
                    <select size='10' name='conv_dsp' style='width: 250px;' onClick="">
                    <option><table><tr><th><td>id </td><td>| prenom |</td><td>nom </td></th></tr></table></option>
                        <?php foreach ($result as $row) {                                      
                                    echo '<option>'.'<br>'.  $row['id'] .'<br>'.'</option>'; //'<br>'. 'id: '. $row['id']. ' - number of participants: '. $row['num_particip']. '   '. ' - creation time: '. $row['creation_time'] . ' - id of participants: '. $row['particip_id'] .
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
                                                
                        <div><input type='text' name='crt_msg' id='crt_msg'></div>
                        <br>
                        <div><input type="submit" value="SEND"></div>
                        <br>        
                        <div><iframe name="message_display_iframe" style="height:250px;">
                            <span>
                                <select size='10' id='msg_dsp' style="width: 250px;">
                                    
                                </select>
                            </span>
                        </iframe>
                        </div>
<<<<<<< HEAD
                        <br>
                        <div><input type='text' name='crt_msg' id='crt_msg'></div>
                        <br>
                        <div><button type='submit' name='send' value='' formaction='send msg.php'>Send</button></div>
                        
                        <a href="inclpicker.php">gotopicker</a>
                        
=======
                        
                        <!--div><button type='submit' name='send' id='' value='' formaction="send_new.php">Send</button></div-->
>>>>>>> 143cb0b42012c761248239e38dca3de78845feab
                        <br>
                        <button> <a href="logout.php">Logout</a></button>
                        <p><?php /* echo $_POST['member_sel'];// select the entire row,and then filter the name and id, and store them in variables*/?></p>

<!--INSERT INTO `conv_reg` (`id`, `num_particip`, `creation_time`, `particip_id`) VALUES ('4', '3', '2018-11-07 00:00:00', '5');  -->                          
                </form>

                
    </body>
</html>
