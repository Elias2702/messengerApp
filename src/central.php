<?php

session_start();


/*
echo "post - conv reg id = " . $_POST['conv_reg_id'] . "<br>";
echo "session - conv reg id = " . $_SESSION['conv_reg_id'] . "<br>";
echo "session - temp conv reg id = " . $_SESSION['temp_conv_reg_id'] . "<br>";
echo "post - oth_mem_id = " . $_POST['oth_mem_id'] . "<br>";
*/

require_once 'db_param.php';

if (isset($_POST['oth_mem_id'])) {
    
    $_SESSION['conv_reg_id'] = null;

    if ($_SESSION['id'] < $_POST['oth_mem_id']) {
        
        $_SESSION['particip_id'] = $_SESSION['id'] . " " . $_POST['oth_mem_id'];
        
    } else {

        $_SESSION['particip_id'] = $_POST['oth_mem_id'] . " " . $_SESSION['id'];

    } 

} elseif (isset($_POST['conv_reg_id'])) {    

    $_SESSION['conv_reg_id'] = $_POST['conv_reg_id'];  
    

} elseif (isset($_SESSION['temp_conv_reg_id'])) { 

    $_SESSION['conv_reg_id'] = $_SESSION['temp_conv_reg_id'];
   
} 


try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    $q_messages="SELECT * FROM messages WHERE conv_reg_id ='" . $_SESSION['conv_reg_id'] ."'";
    $res4 = $db->query($q_messages)->fetchAll(PDO::FETCH_ASSOC);

    foreach($res4 as $row) {
        if($row['owner_id'] == $cur_mem_id) {
            echo "<div class='col-auto lightgrey'><strong> ". $cur_mem_psd . "</strong><br>" . $row['content'] . " </div><br>";
        } else {
            $q_user="SELECT id, pseudo, picture FROM user WHERE id ='". $row['owner_id']."'";    
            $res5 = $db->query($q_user)->fetchAll(PDO::FETCH_ASSOC);
            echo "<div class='col-auto lightgrey'><strong> ". $res5[0]['pseudo'] . "</strong><br>" . $row['content'] . " </div><br>";
        }
    }    
    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>