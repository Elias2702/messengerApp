<?php

function get_mem_id($psd) {
    require_once "./func php/f_db_con.php";
    $db_cnct = dbase_con();
    try { 
        $q_user="SELECT `id` FROM `messenger`.`user` WHERE `pseudo` = '$psd' ;";
        $result = $db_cnct -> query("$q_user")->fetchAll();
        $other_mem_id = ($result[0][0]);
        } catch (Exception $ex) {                    
            echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
        }
    
    return $other_mem_id;
} //end function