
<?php

            $dsn = 'mysql:host=mysql;dbname=messenger';
            $user_db = 'root';
            $pass_db = 'root';


            try {
                $db_user = new PDO ($dsn, $user_db, $pass_db);
                $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //$q_user="INSERT INTO `messenger`.`conv_reg` (`particip_id`) VALUES ('');";

                $q_user="SELECT id FROM messenger.user WHERE id = $_POST['member_sel'];";
                
                $db_user -> exec($q_user);

                $q_conv_reg = "SELECT particip_id FROM messenger.conv_reg CONCAT_WS(' ', $_POST['member_sel']);";
                
                $db_conv_reg -> exec($q_conv_reg);

                //$q_user="INSERT INTO `messenger`.`conv_reg` (``) VALUES ('');";
            } catch (Exception $ex) {
                echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    }
