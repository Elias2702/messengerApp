<?php 

session_start();

require_once 'db_param.php';

$emo_path = $_POST['emo'];
$msg_id = $_SESSION['msg_id'];
$usr_id = $_SESSION['id'];
$usr_pseudo = $_SESSION['pseudo'];

try {

    $db = new PDO ($dsn, $user_db, $pass_db);
    $db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // créer nouvelle conversation
    $q_emo="INSERT INTO emo_react (usr_id, usr_pseudo, msg_id, emo_path) VALUES ('$usr_id', '$usr_pseudo', '$msg_id', '$emo_path')";
    $db->exec($q_emo);



} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


echo "<script>window.close();</script>";

?>