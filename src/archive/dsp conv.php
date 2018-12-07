<?php
    session_start();
    require_once 'db_param.php';



try {
    $db_conv = new PDO ($dsn, $user_db, $pass_db);
    $db_conv -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_conv = "SELECT id, owner_id, num_particip, creation_time, particip_id FROM messenger.conv_reg;";
    $result = $db_conv -> query("$q_conv")->fetchAll();

            foreach ($result as $row) {
                echo "<option>". $row["id"]."<br> "."</option>";   //"<br> id: "." - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] .
            } 
    
    ///print_r($cur_mem);
    ///print_r('cccxccc');
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 