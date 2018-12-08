<?php

function dbase_con() {
        $dsn = 'mysql:host=mysql;dbname=messenger';
        $user_db = 'root';
        $pass_db = 'root';
        $db_cnct = new PDO ($dsn, $user_db, $pass_db);
        $db_cnct -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db_cnct;

} //end function
