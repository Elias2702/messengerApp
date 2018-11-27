<?php



require_once 'db_param.php';


$email = $_POST['user_email'];
echo $email;

try {
    $db_user = new PDO ($dsn, $user_db, $pass_db);
    $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q_user="SELECT id, email, pass FROM messenger.user" ;    
    $result = $db_user->query($q_user)->fetchAll();
    
    foreach ($result as $row) {
        if ($row['email'] == $email) {
            $passcheck = $row['pass'];
            $id = $row['id'];
        }
    }

    if($pass == $passcheck) {
        session_start();
        $_SESSION['id']= $id;
        header("Refresh: 2; url=user_home.php");
        echo 'pass ok';
 
    } else {
        header("Refresh: 2; url=index.php");
        echo 'wrong password';


    }
    

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}



?>

