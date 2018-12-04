<?php
session_start();

require_once 'db_param.php';

$content = $_POST['content'];
$cur_mem_id = $_SESSION['id'];
$conv_reg_id = $_SESSION['conv_reg_id'];
$create_time =  date("Y-m-d H:i:s");
$particip_id = $_SESSION['particip_id'];



header('Location: includer.php');

try {
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($conv_reg_id) {

        // insérer message dans cette conv
        $q_msg="INSERT INTO messages (owner_id, conv_reg_id, time, content) VALUES ('$cur_mem_id', '$conv_reg_id', '$create_time', '$content')";
        $db->exec($q_msg);

    } else {

        // créer nouvelle conversation
        $q_conv_reg_id="INSERT INTO conv_reg (num_particip, creation_time, particip_id) VALUES (2, '$create_time', '$particip_id')";
        $db->exec($q_conv_reg_id);

        // Attribuer son conv_reg_id à la variable $conv_reg_id
        $q_conv_reg_id_2 = "SELECT id FROM conv_reg WHERE particip_id ='" . $particip_id .  "'";
        $res = $db->query($q_conv_reg_id_2)->fetchAll();
        $conv_reg_id = $res[0][0];

        // insérer message dans cette conv
        $q_msg_2="INSERT INTO messages (owner_id, conv_reg_id, time, content) VALUES ('$cur_mem_id', '$conv_reg_id', '$create_time', '$content')";
        $db->exec($q_msg_2);

        //création 
        $_SESSION['temp_conv_reg_id'] = $conv_reg_id;

    }

}catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 

?>