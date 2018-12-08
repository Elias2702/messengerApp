<?php

function get_contacts() { //use as base for function get_friends()

//require_once 'db_param.php';
$db_cnct = dbase_con();

    try {
    $q_user="SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user;"; //== select *
    $result = $db_cnct -> query("$q_user")->fetchAll();

    return $result;
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 

} //end function