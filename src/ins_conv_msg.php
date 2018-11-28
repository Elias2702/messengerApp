?php
     function php_send() {
        //connect table conv_reg: create new row
        require_once 'db_param.php';
       
        //connect table message : store this message 
        //including user_id +conv_reg_id
        $_POST['member_sel']
        //document.getElementById("member_sel").selectedIndex
        try {
            $db_msg = new PDO ($dsn, $user_db, $pass_db);
            $db_msg -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $q_msg="INSERT INTO `messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('2', '2', '2018-11-25 00:00:01', 'blaaaa');";
            $db_msg -> exec($q_msg);
            print_r('carb');
        } catch (Exception $ex) {
            echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
        } 
    }          
       