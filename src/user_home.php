<?php

session_start();

?>

<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title>User Home</title>        
    </head>
    <body>
    
    <?php require_once 'db_param.php';

            //require_once 'ins_conv_msg.php';      
            $cur_mem = $_SESSION['id'];
            print_r($_SESSION['id']);

    ?>

       <?php           
            try {
                $db_user = new PDO ($dsn, $user_db, $pass_db);
                $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user;";
                $result = $db_user -> query("$q_user")->fetchAll();      
        ?>
                
                <form action="send_new.php" name="main_form" method="POST" id="send" target="message_display_iframe" >
                    
                    <div style="display:flex;">
                    <legend><p>List of Members</p>
                    <select size="10" name="mem_sel" style="width: 250px;">
                        <?php foreach ($result as $row) {
                            if($row['id'] !== $cur_mem) {
                                echo "<option value='" . $row['id'] . "' label='" .$row['pseudo']. "'> ". $row['pseudo'] ."</option>";     
                            }
                        }
                        ?>
                    </select>
                    </legend>
                    </div>
            
        <?php                
            } catch (Exception $ex) {
                echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
            }                       
        ?>
                    <p></p>
                                                
                        <div><input type='text' name='crt_msg' id='crt_msg'></div>
                        <br>
                        <div><button type="submit" value="SEND">SEND</button></div>
                        <br>        
                        <div><iframe name="message_display_iframe" style="height:250px;">
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
                <button onclick="location.href='inclpicker.php'">Inclpicker</button>
                <br>
    </body>
</html>
