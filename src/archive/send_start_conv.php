<?php


session_start();
//session_register('$se_conv_id');
 require_once 'db_param.php';
 //require_once 'get old conv.php';


// START create new conversation in conversation register
$num_particip = 2 ;//$_POST[''];
//$creation_date = date("Y/m/d");
$cnv_crt_time =  date("Y-m-d H:i:s"); //date("h:i:sa") ;//NEW DATE()
$cur_mem = $_SESSION['login_user'];//must be changed to id of session-user via a query/*/better @ login verification
$other_mem = $_POST['member_sel'] ;//must be changed to id of other-member via a query/*/better @ login verification
$particip_id = $other_mem." ".$cur_mem;
echo $_SESSION['login_user'];
try {
    $db_conv = new PDO ($dsn, $user_db, $pass_db);
    $db_conv -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_conv = "SELECT  `particip_id` FROM `messenger`.`conv_reg` AS particip_id WHERE `particip_id` = '$particip_id' ;";
    $result_cnv_reg = $db_conv -> query("$q_conv")->fetchAll();
    print_r($result_cnv_reg['particip_id']);
        if($result_cnv_reg['particip_id']) { // if conv already exists, send msg and get old conv
            //require './start_conv.php';
            //require './get old conv.php';
        } else { //if no previous conv exists, create new conv
            foreach ($result_cnv_reg as $row_cnv_reg) {                                      
                echo  $row_cnv_reg; //'<br>'. 'id: '. $row['id']. ' - number of participants: '. $row['num_particip']. '   '. ' - creation time: '. $row['creation_time'] . ' - id of participants: '. $row['particip_id'] .
        }
            echo ($result_cnv_reg);
            // START insert the new message into mesage table (NOT covn reg!!!)
           /* $owner = $_SESSION['login_user']; //$_POST['sessionowner'];
            $conv_id = $result_cnv_reg ; // if the conversation already exists (i.e. registered)
            //$new_conv_id = $db_conv->lastInsertId();//if new conversation
            $msg_crt_time =  date("Y-m-d H:i:s");
            $msg_cnt = $_POST['crt_msg'];
            //print_r($conv_id);
            //print_r($new_conv_id);
            try {
                $db_msg = new PDO ($dsn, $user_db, $pass_db);
                $db_msg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $q_msg="INSERT INTO `messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('$owner', '$conv_id', '$msg_crt_time', '$msg_cnt');";
                $db_msg -> exec($q_msg);

                        
                //print_r('cccxccc');
            } catch (Exception $ex) {
                echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
            } */
            // END insert the new message into mesage table (NOT covn reg!!!)

                    }
                } catch (Exception $ex) {
                    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
                } 