<?php
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Retrieve Password</title>
    </head>
    <body>
    <br>
        
        <form action='retrieve_pass_exec.php' method='POST'>

            <input type='email' name='email' placeholder='Enter you email' <?php
            if(isset($_SESSION['email'])) {
               echo "value='" . $_SESSION['email'] ."'";
            }
            ?>>
            <br><br>

            <input type='submit' value='Send me an email'>
            <br>
            <a href="index.php">Back to Login</a>
            <br>        

        </form>        

    </body>
</html>
